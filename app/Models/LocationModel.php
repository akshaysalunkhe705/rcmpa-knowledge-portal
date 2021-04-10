<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModelInterface;

use App\Models\DepartmentModel;

class LocationModel extends Model implements BaseModelInterface
{
    use HasFactory, SoftDeletes;
    protected $table = "location";
    protected $fillable = ['location_name'];

    public function department()
    {
        $this->hasMany('DepartmentModel');
    }

    public function add($request)
    {
        $model = $this->create([
            'location_name' => $request->get('location_name'),
        ]);
        return $model->save();
    }
    public function edit($request, $id)
    {
        $model = LocationModel::find($id);
        $model->location_name = $request->get('location_name');
        return $model->save();
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
