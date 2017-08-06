<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterOrderPayTableAddPayMethodColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('order_pay', function (Blueprint $blueprint){
            $blueprint->tinyInteger('pay_method')->nullable(false)
                ->after('status')
                ->comment('支付方式  10:货到付款 ， 20:微信支付, 30:支付宝支付 ');
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
        Schema::table('order_pay', function (Blueprint $blueprint){
            $blueprint->dropColumn('pay_method');
        });
    }
}
