<?php

namespace App\Http\Controllers\GeneralMaster;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

//MODELS
use App\Models\FormsModel;

class FormController extends Controller
{
    public function index()
    {
        $formMasters = FormsModel::all();
        return view('general_master.form.index', [
            'formMasters' => $formMasters
        ]);
    }

    public function add(Request $request)
    {
        $model = new FormsModel();
        $model->add($request);
        return redirect()->back()->with('alert', 'Form Inserted Successfuly!');;
    }

    public function edit(Request $request, $id)
    {
        $model = new FormsModel();
        return $model->edit($request, $id);
    }

    public function remove($ids)
    {
        $model = new FormsModel();
        $model->remove($ids);
    }
}
