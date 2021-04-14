<?php

namespace App\Http\Controllers;

use App\Models\UserDocumentPermissionModel;
use Illuminate\Http\Request;

class UserDocumentPermissionController extends Controller
{
    public function set_document_action(Request $request)
    {
        return UserDocumentPermissionModel::create([
            'user_id' => $request->user_id,
            'permission_type' => $request->permission_type,
            'department_id' => $request->department_id,
            'form_id' => $request->form_id,
            'main_document_id' => $request->main_document_id,
            'sub_document_id' => $request->sub_document_id,
            'status' => 'SAVED'
        ]);
    }

    public function unset_document_action(Request $request)
    {
        return UserDocumentPermissionModel::where('user_id', $request->user_id)->
        where('permission_type', $request->permission_type)->
        where('department_id', $request->department_id)->
        where('form_id', $request->form_id)->
        where('main_document_id', $request->main_document_id)->
        where('sub_document_id', $request->sub_document_id)->
        delete();
    }

    public function set_all_action(Request $request)
    {
        UserDocumentPermissionModel::create([
            'user_id' => $request->user_id,
            'permission_type' => 'CREATE_UPDATE_ROLLBACK_DOC',
            'department_id' => $request->department_id,
            'form_id' => $request->form_id,
            'main_document_id' => $request->main_document_id,
            'sub_document_id' => $request->sub_document_id,
            'status' => 'SAVED'
        ]);
        
        UserDocumentPermissionModel::create([
            'user_id' => $request->user_id,
            'permission_type' => 'DEACTIVE_REACTIVE_DOC',
            'department_id' => $request->department_id,
            'form_id' => $request->form_id,
            'main_document_id' => $request->main_document_id,
            'sub_document_id' => $request->sub_document_id,
            'status' => 'SAVED'
        ]);

        
        UserDocumentPermissionModel::create([
            'user_id' => $request->user_id,
            'permission_type' => 'VIEW_ACTIVE_DOC',
            'department_id' => $request->department_id,
            'form_id' => $request->form_id,
            'main_document_id' => $request->main_document_id,
            'sub_document_id' => $request->sub_document_id,
            'status' => 'SAVED'
        ]);

        
        UserDocumentPermissionModel::create([
            'user_id' => $request->user_id,
            'permission_type' => 'VIEW_PENDING_DOC',
            'department_id' => $request->department_id,
            'form_id' => $request->form_id,
            'main_document_id' => $request->main_document_id,
            'sub_document_id' => $request->sub_document_id,
            'status' => 'SAVED'
        ]);

        
        UserDocumentPermissionModel::create([
            'user_id' => $request->user_id,
            'permission_type' => 'VIEW_REJECTED_DOC',
            'department_id' => $request->department_id,
            'form_id' => $request->form_id,
            'main_document_id' => $request->main_document_id,
            'sub_document_id' => $request->sub_document_id,
            'status' => 'SAVED'
        ]);

        
        UserDocumentPermissionModel::create([
            'user_id' => $request->user_id,
            'permission_type' => 'VIEW_ARCHIVE_DOC',
            'department_id' => $request->department_id,
            'form_id' => $request->form_id,
            'main_document_id' => $request->main_document_id,
            'sub_document_id' => $request->sub_document_id,
            'status' => 'SAVED'
        ]);

        
        UserDocumentPermissionModel::create([
            'user_id' => $request->user_id,
            'permission_type' => 'CAPA_STATUS',
            'department_id' => $request->department_id,
            'form_id' => $request->form_id,
            'main_document_id' => $request->main_document_id,
            'sub_document_id' => $request->sub_document_id,
            'status' => 'SAVED'
        ]);
    }
}
