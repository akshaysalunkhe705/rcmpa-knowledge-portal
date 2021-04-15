<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModelInterface;

use App\Models\LocationModel;


class DocumentsModel extends Model implements BaseModelInterface
{
    use HasFactory, SoftDeletes;
    protected $table = "documents";
    protected $fillable = [
        'user_id',
        'capa_number',
        'document_number',
        'location_id',
        'department_id',
        'form_id',
        'main_document_id',
        'sub_document_id',
        'prepared_by',
        'approved_by',
        'version_number',
        'created_date',
        'revision_date',
        'document_details',
        'capa_action',
        'status',
        'status_by_admin',
        'status_by_superadmin',
        'reject_note',
        'remove_note'
    ];

    protected $casts = [
        'document_details' => 'array',
    ];

    public function getCreatedDateAttribute($value)
    {
        if ($value == null) {
            return "";
        }
        return date("d-M-Y", strtotime($value));
    }
    public function getRevisionDateAttribute($value)
    {
        if ($value == null) {
            return "";
        }
        return date("d-M-Y", strtotime($value));
    }


    public function add($request)
    {
        $model = $this->create([
            'user_id' => isset($request['user_id']) ? $request['user_id'] : null,
            'capa_number' => isset($request['capa_number']) ? $request['capa_number'] : null,
            'document_number' => isset($request['document_number']) ? $request['document_number'] : null,
            'location_id' => isset($request['location_id']) ? $request['location_id'] : null,
            'department_id' => isset($request['department_id']) ? $request['department_id'] : null,
            'form_id' => isset($request['form_id']) ? $request['form_id'] : null,
            'main_document_id' => isset($request['main_document_id']) ? $request['main_document_id'] : null,
            'sub_document_id' => isset($request['sub_document_id']) ? $request['sub_document_id'] : null,
            'prepared_by' => isset($request['prepared_by']) ? $request['prepared_by'] : null,
            'approved_by' => isset($request['approved_by']) ? $request['approved_by'] : null,
            'version_number' => isset($request['version_number']) ? $request['version_number'] : null,
            'created_date' => isset($request['created_date']) ? $request['created_date'] : null,
            'revision_date' => isset($request['revision_date']) ? $request['revision_date'] : null,
            'document_details' => isset($request['document_details']) ? $request['document_details'] : null,
            'capa_action' => isset($request['capa_action']) ? $request['capa_action'] : null,
            'status' => isset($request['status']) ? $request['status'] : null,
            'status_by_admin' => isset($request['status_by_admin']) ? $request['status_by_admin'] : null,
            'status_by_superadmin' => isset($request['status_by_superadmin']) ? $request['status_by_superadmin'] : null,
            'reject_note' => isset($request['reject_note']) ? $request['reject_note'] : null,
            'remove_note' => isset($request['remove_note']) ? $request['remove_note'] : null,
        ]);
        return $model->save();
    }

    public function edit($request, $id)
    {
        $model1 = DocumentsModel::find($id);
        $model1->user_id = $request['user_id'];
        $model1->capa_number = $request['capa_number'];
        $model1->document_number = $request['document_number'];
        $model1->location_id = $request['location_id'];
        $model1->department_id = $request['department_id'];
        $model1->form_id = $request['form_id'];
        $model1->main_document_id = $request['main_document_id'];
        $model1->sub_document_id = $request['sub_document_id'];
        $model1->prepared_by = $request['prepared_by'];
        $model1->approved_by = $request['approved_by'];
        $model1->version_number = $request['version_number'];
        $model1->created_date = $request['created_date'];
        $model1->revision_date = $request['revision_date'];
        $model1->document_details = $request['document_details'];
        $model1->capa_action = $request['capa_action'];
        $model1->status = $request['status'];
        $model1->status_by_admin = $request['status_by_admin'];
        $model1->status_by_superadmin = $request['status_by_superadmin'];
        $model1->reject_note = $request['reject_note'];
        $model1->remove_note = $request['remove_note'];
        return $model1->save();
    }

    public function fetch_single($id)
    {
    }
    public function fetch_all()
    {
    }
    public function remove($id)
    {
    }



    //FETECH NAMES
    public function fetchLocation($id)
    {
        $model = LocationModel::find($id);
        if ($model != null) {
            return $model->location_name;
        }
        return "No Name";
    }
    public function fetchDepartment($id)
    {
        $model = DepartmentModel::find($id);
        if ($model != null) {
            return $model->department_name;
        }
        return "No Name";
    }
    public function fetchForm($id)
    {
        $model = FormsModel::find($id);
        if ($model != null) {
            return $model->form_name;
        }
        return "No Name";
    }
    public function fetchMainDocumentTitle($id)
    {
        $model = MainDocumentTitleModel::find($id);
        if ($model != null) {
            return $model->main_document_title;
        }
        return "No Name";
    }
    public function fetctSubDocumentTitle($id)
    {
        $model = SubDocumentTitleModel::find($id);
        if ($model != null) {
            return $model->sub_document_title;
        }
        return "No Name";
    }



    ///
    public function getLatestVersion($sub_document_id)
    {
        $documentVersionNumber = DocumentsModel::select('version_number')->where('sub_document_id', $sub_document_id)->max('version_number');
        return floatval($documentVersionNumber) + floatval(0.1);
    }
    public function archivedPreviousVersion($sub_document_id)
    {
        $documentModel = DocumentsModel::where('sub_document_id', $sub_document_id)->where('status', 'ACTIVE')->first();
        $documentModel->status = "ARCHIVED";
        $documentModel->save();
    }
    public function deactivateAllVersions($sub_document_id)
    {
        DocumentsModel::where('sub_document_id', $sub_document_id)->update(['status' => "DEACTIVE"]);
        // $documentModel->status = "ARCHIVED";
        // $documentModel->save();
    }
    public function reactivateVersion($document_id)
    {
        $documentModel = DocumentsModel::where('id', $document_id)->first();
        $documentModel->status = "ACTIVE";
        $documentModel->save();
    }
}
