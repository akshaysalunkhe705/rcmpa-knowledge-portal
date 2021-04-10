<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModelInterface;
use App\Models\FormsModel;


class DepartmentModel extends Model implements BaseModelInterface
{
    use HasFactory, SoftDeletes;
    protected $table = "department";
    protected $fillable = ['location_id', 'department_name'];

    public function forms()
    {
        $this->hasMany('FormsModel');
    }

    public function add($request)
    {
        $model = $this->create([
            'location_id' => $request->get('location_id'),
            'department_name' => $request->get('department_name'),
        ]);
        return $model->save();
    }
    public function edit($request, $id)
    {
        $model1 = DepartmentModel::find($id);
        $model1->location_id = $request->get('location_id');
        $model1->department_name = $request->get('department_name');
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
