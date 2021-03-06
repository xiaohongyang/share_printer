<?php
/**
 * Created by PhpStorm.
 * User: xiaohongyang
 * Date: 2017/6/8
 * Time: 9:01
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;

class BaseApiController extends Controller
{

    protected $jsonResult = [
            'status' => 0,
            'message' => [],
            'id' => 0
    ];


    public function setJsonResult($status=null, $message = null, $id = null){
        if(!is_null($status)){
            $this->jsonResult['status'] = $status;
        }
        if(!is_null($message)){
            $this->jsonResult['message'] = $message;
        }
        if(!is_null($id)){
            $this->jsonResult['id'] = $id;
        }
    }
    public function getJsonResult(){
        return $this->jsonResult;
    }

}