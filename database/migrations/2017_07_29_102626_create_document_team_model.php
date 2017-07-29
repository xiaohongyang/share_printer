<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTeamModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('document_team', function (Blueprint $blueprint){

            $blueprint->increments('id');
            $blueprint->string('name')->nullable(false)->default('')->comment('打印队列名称');
            $blueprint->integer('user_id')->nullable(false)->default(0);
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
        Schema::drop('document_team');
    }
}
