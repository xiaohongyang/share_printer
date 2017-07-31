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
use App\Models\DocumentTeamModel;
use Illuminate\Http\FileHelpers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DocumentTeamService extends BaseService {


    protected $documentTeamModel;

    public function getMessage(){
        return $this->documentTeamModel->message;
    }

    public function __construct(){

        $this->documentTeamModel = new DocumentTeamModel();
    }

    /*
    'name' => ['required'],
    'user_id' => ['required'],
    */
    public function create($name, $fileInfo, $userID){

        $m =   DocumentTeamModel::where(['id'=>21])->first()->documents;
        var_dump($m);

        $result = false;
        if(is_array($fileInfo) && count($fileInfo)){

            DB::beginTransaction();
            try{
                $data = [
                    'name' => $name,
                    'user_id' => $userID
                ];
                $result = $this->documentTeamModel->create($data);
                if($result) {
                    //保存到文档表
                    $teamId = $this->documentTeamModel->id;
                    foreach($fileInfo as $file) {
                        $document = new DocumentService();
                        $rs = $document->create($teamId, $file['file_name'], $file['file_size'], $userID);

                        if(!$rs){

                            throw new \Exception("保存document失败");
                            $result = false;
                            break;
                        }
                    }
                }
                if($result)
                    DB::commit();
            } catch (\Exception $e){
                DB::rollBack();
                Log::info($e->getMessage());
                var_dump( $e->getMessage() );

            }

        }

        return $result;
    }

}