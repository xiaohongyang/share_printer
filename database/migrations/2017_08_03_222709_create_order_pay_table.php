<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('order_pay', function(Blueprint $blueprint) {
           $blueprint->increments('id');
           $blueprint->integer('order_id', false, true)
               ->nullable(false)->default(0)->comment('订单id');
           $blueprint->tinyInteger('status')
               ->nullable(false)->default(0)->comment('支付状态 20:支付成功 -1:支付异常 0:支付失败 ');
           $blueprint->string('comment')
               ->nullable(false)->default('')->comment('备注');
           $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('order_pay');
    }
}
