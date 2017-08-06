<?php
namespace App\Http\Service;
use App\Models\DocumentModel;
use App\Models\DocumentTeamModel;
use App\Models\PrintOrderItemModel;
use App\Models\PrinterOrderModel;

/**
 * Created by PhpStorm.
 * User: admin_
 * Date: 2017/8/1
 * Time: 21:23
 */
class PrinterOrderItemService extends BaseService
{

    private $printItemModel;

    public function __construct()
    {
        $this->printItemModel = new PrintOrderItemModel();
    }

    public function create(PrinterOrderModel $orderModel , $documentModelList ) {

        $result = false;
        if(is_array($documentModelList) && count($documentModelList)) {

            foreach ($documentModelList as $documentModel) {

                if($documentModel instanceof DocumentModel) {

                    $result = $this->printItemModel->createParam($orderModel->id,
                        $documentModel->id, $documentModel->getAmount());

                    if(!$result){
                        break;
                    }
                }
            }
        }
        return $result;
    }

}