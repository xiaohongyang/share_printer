<?php
/**
 * Created by PhpStorm.
 * User: xiaohongyang
 * Date: 2017/6/8
 * Time: 9:00
 */

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class ImageController extends BaseApiController
{

    public function upload(Request $request){

        $fileType = $request->get('type', 'image');
        $result = "";
        switch ( $fileType ) {
            case 'image' :
                $result = $this->_doUploadImage($request);
                break;
            case 'document' :
                $result = $this->_doUploadDocument($request);
                break;
        }

        return $result;
    }

    private function _doUploadImage(Request $request){

        $file = Input::file('thumb');

        $saveDirectory = $request->get('directory');
        $data = $request->all();
        $result = $this->_uploadImage($file, $data, $saveDirectory);
        return $result;
    }


    private function _uploadImage($file, $data, $saveDirectory) {
        //获取上传文件和文件信息

        $directoryHeadPic = env('HEAD_PIC_FILE_PATH');
        $articleThumbFilePath = env('ARTICLE_THUMB_FILE_PATH');
        //图片保存路径
        $directoryArray = [$directoryHeadPic, $articleThumbFilePath];
        $directory = implode(',', $directoryArray);

        $rules = ['thumb' => 'required|max:101','directory' => 'required|in:' . $directory];

        $result = $this->_upload($file, $data, $saveDirectory, $rules);
        return $result;
    }

    private function _doUploadDocument(Request $request){

        $file = Input::file('document');

        $saveDirectory = $request->get('directory');
        $data = $request->all();
        $result = $this->_uploadDocument($file, $data, $saveDirectory);
        return $result;
    }

    private function _uploadDocument($file, $data, $saveDirectory) {
        //获取上传文件和文件信息

        $printerDocumentPath = env('PRINTER_DOCUMENT_FILE_PATH');
        //图片保存路径
        $directoryArray = [$printerDocumentPath];
        $directory = implode(',', $directoryArray);

        $rules = ['document' => 'required|max:101','directory' => 'required|in:' . $directory];

        $result = $this->_upload($file, $data, $saveDirectory, $rules);
        return $result;
    }

    private function _upload($file, $data, $saveDirectory, $rules){

        //图片保存路径
        $validate = \Validator::make($data, $rules);
        $result = ['result' => false, 'errors' => []];
        //验证文件信息
        if (!is_null($file) && !$validate->fails()) {

            //保存文件
            $extension = $file->getClientOriginalExtension();
            $filePath = public_path() . DIRECTORY_SEPARATOR . $saveDirectory . DIRECTORY_SEPARATOR;
            $fileName = date('YmdHis',time());
            $fileName .= '.' . $extension;
            $file->move($filePath, $fileName);
            $result['result'] = true;
            $result['file'] = $saveDirectory . DIRECTORY_SEPARATOR . $fileName;
        } else {

            $result['errors'] = $validate->errors();
        }
        return $result;
    }

}