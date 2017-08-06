<?php
namespace App\Http\Service;
use App\Models\DocumentModel;
use App\Models\DocumentTeamModel;
use App\Models\PrinterOrderLogModel;
use App\Models\PrinterOrderModel;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;
use Illuminate\Support\Facades\DB;
use Monolog\Logger;

/**
 * Created by PhpStorm.
 * User: admin_
 * Date: 2017/8/1
 * Time: 21:23
 */
class PrinterOrderService extends BaseService
{

    private $printModel;

    public function __construct()
    {
        $this->printModel = new PrinterOrderModel();
    }

    public function create( DocumentTeamModel $teamModel, $documentModelList ) {
        $result = false;
        \DB::beginTransaction();
        try{

            $this->printModel->createParam($teamModel->id, $teamModel->user_id);
            $itemService = new PrinterOrderItemService();
            $rs = $itemService->create($this->printModel, $documentModelList);
            $printOrderLogService = new PrinterOrderLogService();
            $rsLog = $printOrderLogService->create($this->printModel, PrinterOrderLogModel::STATUS_0, $teamModel->user_id);
            if($rs && $rsLog){
                \DB::commit();
                $result = true;
            } else {
                \DB::rollBack();
            }
        } catch (Exception $e) {
            \DB::rollBack();
            \Log::info($e->getMessage());
        }
        return $result;
    }

}