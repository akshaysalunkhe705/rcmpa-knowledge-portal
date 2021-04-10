<?php

namespace App\Http\Controllers\GeneralMaster;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

//MODEL
use App\Models\UnitsModel;


class UnitController extends Controller
{
    public function index()
    {
        $units = UnitsModel::all();
        return view('general_master.unit.index', [
            'units' => $units
        ]);
    }

    public function add(Request $request)
    {
        $model = new UnitsModel();
        $model->add($request);
        return redirect()->back()->with('alert', 'Unit Inserted Successfuly!');
    }

    public function edit(Request $request, $id)
    {
        $model = new UnitsModel();
        $model->edit($request, $id);
    }

    public function remove($ids)
    {
        $model = new UnitsModel();
        $model->remove($ids);
    }
}
