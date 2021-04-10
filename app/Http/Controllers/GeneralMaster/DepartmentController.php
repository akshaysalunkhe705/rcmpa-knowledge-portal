<?php

namespace App\Http\Controllers\GeneralMaster;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

//MODELS
use App\Models\DepartmentModel;
use App\Models\LocationModel;

class DepartmentController extends Controller
{
    public function index()
    {
        $locations = LocationModel::all();
        $departments = DepartmentModel::all();
        return view('general_master.department.index', [
            'locations' => $locations,
            'departments' => $departments,
        ]);
    }

    public function add(Request $request)
    {
        $model = new DepartmentModel();
        $model->add($request);
        return redirect()->back()->with('alert', 'Department Inserted Successfuly!');;
    }

    public function edit(Request $request, $id)
    {
        $model = new DepartmentModel();
        return $model->edit($request, $id);
    }

    public function remove($ids)
    {
        $model = new DepartmentModel();
        $model->remove($ids);
    }
}
