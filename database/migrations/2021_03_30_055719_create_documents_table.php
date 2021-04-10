<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('capa_number');
            $table->string('document_number');
            $table->integer('location_id');
            $table->integer('department_id');
            $table->integer('form_id');
            $table->integer('main_document_title_id');
            $table->integer('sub_document_title_id');
            $table->string('prepared_by');
            $table->string('approved_by')->nullable();
            $table->float('version_number',2,2);
            $table->date('created_date');
            $table->date('revision_date')->nullable();
            $table->json('document_details')->nullable();
            $table->enum('status',['ACTIVE','DEACTIVE','REJECT','REMOVE','FRESH','SAVED','SUBMIT'])->nullable();
            $table->enum('status_by_admin',['APPROVE', 'REJECT', 'REMOVE'])->nullable();
            $table->enum('status_by_superadmin',['APPROVE', 'REJECT', 'REMOVE'])->nullable();
            $table->text('reject_note')->nullable();
            $table->text('remove_note')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
