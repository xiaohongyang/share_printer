<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrinterOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('printer_order', function (Blueprint $blueprint){

            $blueprint->integer('id', true, false);
            $blueprint->integer('document_id', false, false)->nullable(false)->default(0)->comment('文档id');
            $blueprint->integer('user_id', false, false)->nullable(false)->default(0)->comment('用户id');
            $blueprint->tinyInteger('status', false, false)->nullable(false)->default(0)
                ->comment('状态 0:未打印 1:打印中 2:打印完成  3:等待收货  4:接收完成 10:取消打印');
            $blueprint->tinyInteger('pay_status', false, false)->nullable(false)->default(0)
                ->comment('是否已支付  0:否  1:是 ');
            $blueprint->integer('pay_at', false, false)->nullable(false)->default(0)
                ->comment('支付时间');
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
        Schema::dropIfExists();
    }
}
