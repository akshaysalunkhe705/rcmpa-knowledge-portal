<?php
namespace App\Http\Controllers\GeneralMaster;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\RoleModel;

class RoleController extends Controller
{
    public function index()
    {
        $roles = RoleModel::all();
        return view('general_master.role.index', [
            'roles' => $roles
        ]);
    }

    public function add(Request $request)
    {
        $model = new RoleModel();
        $model->add($request);
        return redirect()->back()->with('alert', 'Role Inserted Successfuly!');
    }

    public function edit(Request $request, $id)
    {
        $model = new RoleModel();
        $model->edit($request, $id);
    }

    public function remove($ids)
    {
        $model = new RoleModel();
        $model->remove($ids);
    }
}
