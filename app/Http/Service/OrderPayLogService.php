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

class OrderPayLogService extends BaseService
{

    protected $orderPayLogModel = null;

    public function __construct()
    {
        $this->orderPayLogModel = new OrderPayLogModel();
    }

    public function create($payID, $status, $comment = ''){

        $result = false;
        try {
            $result = $this->orderPayLogModel->createParams( $payID, $status, $comment);
            if (!$result)
                $this->message = $this->orderPayLogModel->message;
        } catch (Exception $e) {
            \Log::info($e->getMessage());
        }
        return $result;
    }


}