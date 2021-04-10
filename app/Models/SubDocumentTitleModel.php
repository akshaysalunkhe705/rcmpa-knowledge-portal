<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModelInterface;


class SubDocumentTitleModel extends Model implements BaseModelInterface

{
    use HasFactory, SoftDeletes;
    protected $table = "sub_document_title";
    protected $fillable = ['department_id', 'form_id', 'main_document_id', 'sub_document_title'];


    public function add($request)
    {
        $model = $this->create([
            'department_id' => $request->get('department_id'),
            'form_id' => $request->get('form_id'),
            'main_document_id' => $request->get('main_document_id'),
            'sub_document_title' => $request->get('sub_document_title'),
        ]);
        return $model->save();
    }
    public function edit($request, $id)
    {
        $model1 = SubDocumentTitleModel::find($id);
        $model1->department_id = $request->get('department_id');
        $model1->form_id = $request->get('form_id');
        $model1->main_document_id = $request->get('main_document_id');
        $model1->sub_document_title = $request->get('sub_document_title');
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
