<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDocumentPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_document_permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('department_id');
            $table->integer('form_id');
            $table->integer('main_document_id');
            $table->integer('sub_document_id');
            $table->enum('permission_type',['CREATE_UPDATE_ROLLBACK_DOC','DEACTIVE_REACTIVE_DOC','VIEW_ACTIVE_DOC','VIEW_PENDING_DOC','VIEW_REJECTED_DOC','VIEW_ARCHIVE_DOC','CAPA_STATUS']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_document_permissions');
    }
}
