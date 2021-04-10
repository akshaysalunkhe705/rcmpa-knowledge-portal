<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainDocumentTitleTable extends Migration
{
    public function up()
    {
        Schema::create('main_document_title', function (Blueprint $table) {
            $table->id();
            $table->integer('department_id');
            $table->integer('form_id');
            $table->string('main_document_title');
            $table->softDeletes();
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
        Schema::dropIfExists('main_document_title');
    }
}
