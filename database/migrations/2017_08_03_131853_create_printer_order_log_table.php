<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrinterOrderLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('printer_order_log', function (Blueprint $blueprint){

            $blueprint->increments('id');
            $blueprint->integer('order_id')->nullable(false)->default(0)->coment('订单表id');
            $blueprint->tinyInteger('order_status',false, true)
                ->nullable(false)->defaullt(0)->comment('订单状态 10:已支付(打印中), 20:打印完成(送货中), 30:已接收 -1:已取消');
            $blueprint->integer('user_id')->nullable(false)->default(0)->comment('操作用户id');

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
        Schema::drop('printer_order_log');
    }
}
