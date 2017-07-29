<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePrinterOrderItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('printer_order_item', function(Blueprint $table){

            $table->increments('id');
            $table->integer('order_id', false, true)->nullable(false)->default(0)->comment('订单id');
            $table->integer('document_id', false, true)->nullable(false)->default(0)->comment('文档id');
            $table->smallInteger('amount', false, true)->nullable(false)->default(0)->comment('打印份数');
            $table->timestamps();
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
        Schema::drop('printer_order_item');
    }
}
