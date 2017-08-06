<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class OrderPayModel extends BaseModel
{
    //

    //支付方式  10:货到付款 ， 20:微信支付, 30:支付宝支付
    public static $payMethodValues = [10, 20, 30];

    //支付状态 10:支付成功 -1:支付异常 0:支付失败
    public static $statusValues = [-1, 0, 10];
    public static $statusSuccess = 10;

    protected $table = 'order_pay';

    protected $fillable = ['order_id','status','pay_method','comment'];

    public function createParams($orderID, $status, $payMethod, $comment) {

        $data = [
            'order_id' => $orderID,
            'status' => $status,
            'pay_method' => $payMethod,
            'comment' => $comment
        ];

        $validator = \Validator::make($data, [
            'order_id' => ['required',],
            'pay_method' => [
                'required',
                Rule::in(self::$payMethodValues)
            ],
            'status' => [
                'required',
                Rule::in(self::$statusValues)
            ]
        ]);
        $this->setCreateValidator($validator);
        $result = $this->create($data);
        return $result;
    }
}
