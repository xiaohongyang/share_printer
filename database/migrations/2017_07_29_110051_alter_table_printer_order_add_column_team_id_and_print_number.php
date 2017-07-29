<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePrinterOrderAddColumnTeamIdAndPrintNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('printer_order', function (Blueprint $table){
            $table->integer('team_id', false, true)->nullable(false)->default(0)->comment('document_team表id')->after('id');
            $table->dropColumn('document_id');
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
        Schema::table('printer_order', function(Blueprint $table) {
           $table->dropColumn('team_id');
           $table->integer('document_id', false, true)->nullable(false)->default(0)->comment('document表id')->after('id');
        });
    }
}
