<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModelInterface;


class UnitsModel extends Model implements BaseModelInterface
{
    use HasFactory, SoftDeletes;
    protected $table = "units";
    protected $fillable = ['unit_name'];


    public function add($request)
    {
        $model = $this->create([
            'unit_name' => $request->get('unit_name')
        ]);
        return $model->save();
    }
    public function edit($request, $id)
    {
        $model1 = UnitsModel::find($id);
        $model1->unit_name = $request->get('unit_name');
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
