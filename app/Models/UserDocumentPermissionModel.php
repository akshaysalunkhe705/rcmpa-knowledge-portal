<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModelInterface;


class UserDocumentPermissionModel extends Model implements BaseModelInterface
{
    use HasFactory, SoftDeletes;
    protected $table = "user_document_permissions";
    protected $fillable = ['user_id', 'department_id', 'form_id', 'main_document_id', 'sub_document_id', 'permission_type'];


    public function add($request)
    {
        $model = $this->create([
            'user_id' => $request->get('user_id'),
            'department_id' => $request->get('department_id'),
            'form_id' => $request->get('form_id'),
            'main_document_id' => $request->get('main_document_id'),
            'sub_document_id' => $request->get('sub_document_id'),
            'permission_type' => $request->get('permission_type')
        ]);
        return $model->save();
    }
    public function edit($request, $id)
    {
        $model1 = UserDocumentPermissionModel::find($id);
        $model1->user_id = $request->get('user_id');
        $model1->department_id = $request->get('department_id');
        $model1->form_id = $request->get('form_id');
        $model1->main_document_id = $request->get('main_document_id');
        $model1->sub_document_id = $request->get('sub_document_id');
        $model1->permission_type = $request->get('permission_type');
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
}
