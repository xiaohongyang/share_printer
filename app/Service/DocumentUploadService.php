<?php
/**
 * Created by PhpStorm.
 * User: admin_
 * Date: 2017/7/25
 * Time: 22:15
 */

namespace App\Http\Service;

use App\Http\Helpers\FileHelper;
use App\Models\DocumentModel;
use Illuminate\Http\FileHelpers;

class DocumentUploadService extends BaseService {

    protected $documentModel;

    public function getMessage(){
        return $this->documentModel->message;
    }

    public function __construct(){

        $this->documentModel = new DocumentModel();
    }

    /*
    'name' => ['required'],
    'file_name' => ['required'],
    'file_ext' => ['required'],
    'file_size' => ['required'],
    'user_id' => ['required'],
    */
    public function create($documentName, $fileFullName, $fileSize=null, $userId=null){

        

        $fileName = FileHelper::getFileName($fileFullName);
        $fileExt = FileHelper::getFileExt($fileFullName);

        $data = [
            'name' => $documentName,
            'file_name' => $fileName,
            'file_ext' => $fileExt,
            'file_size' => $fileSize,
            'user_id' => $userId,
        ];
        $result = $this->documentModel->create($data);
        return $result;
    }

}