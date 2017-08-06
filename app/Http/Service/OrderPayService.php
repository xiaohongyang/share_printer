<?php
/**
 * Created by PhpStorm.
 * User: admin_
 * Date: 2017/8/4
 * Time: 6:37
 */

namespace App\Http\Service;


use App\Models\OrderPayLogModel;
use App\Models\OrderPayModel;

class OrderPayService extends BaseService
{

    protected $orderPayModel = null;
    protected $orderPayLogService = null;

    public function __construct()
    {
        $this->orderPayModel = new OrderPayModel();
        $this->orderPayLogService = new OrderPayLogService();
    }

    public function create($orderID, $status, $payMethod, $comment = ''){

        \DB::beginTransaction();
        $result = false;
        try {
            $result = $this->orderPayModel->createParams($orderID, $status, $payMethod, $comment);
            if (!$result)
                $this->message = $this->orderPayModel->message;
            else{
                $result = $this->orderPayLogService->create($this->orderPayModel->id, $status);
            }
        } catch (Exception $e) {
        } finally{
            if($result) {
                \DB::commit();
            } else
                \DB::rollBack();
        }
        return $result;
    }


}