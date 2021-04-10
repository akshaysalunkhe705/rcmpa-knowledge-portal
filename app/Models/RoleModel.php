<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModelInterface;

class RoleModel extends Model implements BaseModelInterface
{
    use HasFactory, SoftDeletes;
    protected $table = "role";
    protected $fillable = ['role_name'];


    public function add($request)
    {
        $model = $this->create([
            'role_name' => $request->get('role_name'),
        ]);
        return $model->save();
    }
    public function edit($request, $id)
    {
        $model1 = RoleModel::find($id);
        $model1->role_name = $request->get('role_name');
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
