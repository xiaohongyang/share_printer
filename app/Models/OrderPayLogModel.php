<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class OrderPayLogModel extends BaseModel
{
    //

    //支付状态 10:支付成功 -1:支付异常 0:支付失败
    public static $statusValues = [-1, 0, 10];
    public static $statusSuccess = 10;

    protected $table = 'order_pay_log';
    protected $fillable = ['pay_id', 'status', 'comment'];


    public function createParams($payId, $status, $comment) {
        $data = [
            'pay_id' => $payId,
            'status' => $status,
            'comment' => $comment
        ];

        $validator = \Validator::make($data, [
            'pay_id' => ['required'],
            'status' => [
                'required',
                Rule::in(self::$statusValues)
            ]
        ]);
        $this->setCreateValidator($validator);
        return parent::create($data);
    }

}
