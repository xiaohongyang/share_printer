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
use App\Models\PrinterOrderLogModel;
use App\Models\PrinterOrderModel;
use Illuminate\Http\FileHelpers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PrinterOrderLogService extends BaseService {



    protected $printOrderLogModel;

    public function getMessage(){
        return $this->printOrderLogModel->message;
    }

    public function __construct(){

        $this->printOrderLogModel = new PrinterOrderLogModel();
    }

    /*
    'name' => ['required'],
    'user_id' => ['required'],
    */
    public function create(PrinterOrderModel $orderModel, $orderStatus, $userID){

        $result = $this->printOrderLogModel->createParam($orderModel->id, $orderStatus, $userID);
        return $result;
    }

}