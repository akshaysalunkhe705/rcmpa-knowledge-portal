<?php

namespace App\Http\Controllers;

use App\Models\DocumentsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentStatusController extends Controller
{
    //----------------------------------------------FOR HOD
    public function createdButNotSubmitted()
    {
        $document_dataset = DocumentsModel::where('status', 'SAVED')->where('user_id', Auth::user()->id)->get();
        return view('document_status.created_but_not_submitted', [
            'document_dataset' => $document_dataset
        ]);
    }
    public function submittedButNotApproved()
    {
        $document_dataset = DocumentsModel::where('status', 'SUBMIT')->where('user_id', Auth::user()->id)->get();
        return view('document_status.submitted_but_not_approved', [
            'document_dataset' => $document_dataset
        ]);
    }
    public function rejectedForResubmission()
    {
        $document_dataset = DocumentsModel::where('status', 'REJECT')->where('user_id', Auth::user()->id)->get();
        return view('document_status.rejected_for_resubmission', [
            'document_dataset' => $document_dataset
        ]);
    }
    public function rejectedForRemoveFromCapa()
    {
        $document_dataset = DocumentsModel::where('status', 'REMOVE')->where('user_id', Auth::user()->id)->get();
        return view('document_status.rejected_for_remove_from_capa', [
            'document_dataset' => $document_dataset
        ]);
    }


    //----------------------------------------------FOR ADMIN AND SUPERADMIN 
    public function pendingForAction()
    {
        $document_dataset = DocumentsModel::where('status', 'SUBMIT')->get();
        return view('document_action.document_pending_for_action', [
            'document_dataset' => $document_dataset
        ]);
    }
    
    public function approveDocument($document_id)
    {
        $model = DocumentsModel::find($document_id);
        if(Auth::user()->role == "SUPER ADMIN"){
            $model->status_by_superadmin = "APPROVE";
            $model->status = "ACTIVE";
            $model->status_by_admin = "APPROVE";
        }
        if(Auth::user()->role == "ADMIN"){
            $model->status_by_admin = "APPROVE";
        }
        $model->save();
        return redirect()->back()->with('success_message',"Approved Successfully");
    }
    public function rejectDocument($document_id)
    {
        $model = DocumentsModel::find($document_id);
        $model->status = "REJECT";
        if(Auth::user()->role == "SUPER ADMIN"){
            $model->status_by_superadmin = "REJECT";
            $model->status_by_admin = "REJECT";
        }
        if(Auth::user()->role == "ADMIN"){
            $model->status_by_admin = "REJECT";
        }
        return $model->save();
        return redirect()->back()->with('success_message',"Reject Successfully");
    }
    public function removeDocument($document_id)
    {
        $model = DocumentsModel::find($document_id);
        $model->status = "REMOVE";
        if(Auth::user()->role == "SUPER ADMIN"){
            $model->status_by_superadmin = "REMOVE";
            $model->status_by_admin = "REMOVE";
        }
        if(Auth::user()->role == "ADMIN"){
            $model->status_by_admin = "REMOVE";
        }
        return $model->save();
        return redirect()->back()->with('success_message',"Remove Successfully");
    }
}
