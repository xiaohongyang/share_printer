<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrinterOrderModel extends BaseModel
{
    //
    const PAY_STATUS_NOT = 0;
    const PAY_STATUS_YES = 1;
    const ORDER_STATUS_0 = 0;
    const ORDER_STATUS_1 = 1;
    const ORDER_STATUS_2 = 2;
    const ORDER_STATUS_3 = 3;
    const ORDER_STATUS_4 = 4;
    const ORDER_STATUS_10 = 10;

    protected $table = 'printer_order';

    protected $fillable = ['team_id','user_id','status','pay_status','pay_at'];

    public function createParam($teamID, $userID)
    {

        $data = ['team_id' => $teamID, 'user_id' => $userID];
        $validator = \Validator::make($data, [
            'team_id' => ['required'],
            'user_id' => ['required'],
        ]);
        $this->setCreateValidator($validator);

        $data['pay_status'] = self::PAY_STATUS_NOT;
        $data['status'] = self::ORDER_STATUS_0;

        return parent::create($data); // TODO: Change the autogenerated stub
    }

}