<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create("document", function(Blueprint $blueprint){

            $blueprint->integer('id', true, false)->comment("主键");
            $blueprint->string('name', 50)->nullable(false)->default('')->comment('文档名称');
            $blueprint->string('file_name', 50)->nullable(false)->default('')->comment('上传文档名');
            $blueprint->string('file_ext', 10)->nullable(false)->default('')->comment('上传文档扩展名');
            $blueprint->integer('file_size', false,false)->nullable(false)->default(0)->comment('上传文档字节大小');
            $blueprint->integer('user_id', false,false)->nullable(false)->default(0)->comment('上传者用户id');
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

        Schema::dropIfExists('document');
    }
}
