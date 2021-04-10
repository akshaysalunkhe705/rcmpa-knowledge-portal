<?php

namespace App\Http\Controllers;

use App\Models\DocumentsModel;
use App\Models\UserDocumentPermissionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentViewController extends Controller
{
    //----------------------------------------------FOR HOD
    public function activeDocument()
    {
        $documentAccessListIds = UserDocumentPermissionModel::where('user_id', Auth::user()->id)->where('permission_type', 'VIEW_ACTIVE_DOC')->get();
        $document_dataset = DocumentsModel::where('status', 'ACTIVE')->whereIn('sub_document_id', array_column(json_decode($documentAccessListIds, true), 'sub_document_id'))->get();
        return view('document_views.hod.active_document',[
            'document_dataset'=>$document_dataset
        ]);
    }

    public function deactiveDocument()
    {
        $documentAccessListIds = UserDocumentPermissionModel::where('user_id', Auth::user()->id)->where('permission_type', 'DEACTIVE_REACTIVE_DOC')->get();
        $document_dataset = DocumentsModel::where('status', 'DEACTIVE')->whereIn('sub_document_id', array_column(json_decode($documentAccessListIds, true), 'sub_document_id'))->get();
        return view('document_views.hod.deactive_document',[
            'document_dataset'=>$document_dataset
        ]);
    }

    public function archivedDocument()
    {
        $documentAccessListIds = UserDocumentPermissionModel::where('user_id', Auth::user()->id)->where('permission_type', 'VIEW_ARCHIVE_DOC')->get();
        $document_dataset = DocumentsModel::where('status', 'ARCHIVED')->whereIn('sub_document_id', array_column(json_decode($documentAccessListIds, true), 'sub_document_id'))->get();
        return view('document_views.hod.archived_document',[
            'document_dataset'=>$document_dataset
        ]);
    }

    
    //----------------------------------------------FOR ADMIN AND SUPERADMIN
    public function activeAdminDocument()
    {
        $document_dataset = DocumentsModel::where('status', 'ACTIVE')->get();
        return view('document_views.admin.archived_document',[
            'document_dataset'=>$document_dataset
        ]);
    }

    public function deactiveAdminDocument()
    {
        $document_dataset = DocumentsModel::where('status', 'DEACTIVE')->get();
        return view('document_views.admin.deactive_document',[
            'document_dataset'=>$document_dataset
        ]);
    }

    public function archivedAdminDocument()
    {
        $document_dataset = DocumentsModel::where('status', 'ARCHIVED')->get();
        return view('document_views.admin.archived_document',[
            'document_dataset'=>$document_dataset
        ]);
    }

    
    //----------------------------------------------FOR USER
}
