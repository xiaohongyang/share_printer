<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableDocumentAddColumnTeamIdAndPageNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('document', function (Blueprint $blueprint){

            $blueprint->integer('team_id',false,true)->nullable(false)->default(0)->comment('组id')->after('id');
            $blueprint->smallInteger('page_number', false, true)->nullable(false)->default(0)->comment('文档页数')->after('file_size');
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
        Schema::table('document', function (Blueprint $blueprint){
           $blueprint->dropColumn('team_id');
           $blueprint->dropColumn('page_number');
        });
    }
}
