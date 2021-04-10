<?php

namespace App\Http\Controllers\GeneralMaster;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

//MODELS
use App\Models\DepartmentModel;
use App\Models\FormsModel;
use App\Models\MainDocumentTitleModel;

class MainDocumenTitleController extends Controller
{
    public function index()
    {
        $departments = DepartmentModel::all();
        $form = FormsModel::all();
        $mainDocumentTitleModel = MainDocumentTitleModel::all();
        return view('general_master.main_document_name.index', [
            'mainDocumentTitleModel' => $mainDocumentTitleModel,
            'departments' => $departments,
            'form' => $form
        ]);
    }

    public function detail($id)
    {
        $formMaster = MainDocumentTitleModel::find($id);
        return view('main_document_name.detail', [
            'formMaster' => $formMaster
        ]);
    }

    public function add(Request $request)
    {
        $model = new MainDocumentTitleModel();
        $model->add($request);
        return redirect()->back()->with('alert', 'Main Document Title Inserted Successfuly!');;
    }

    public function edit(Request $request, $id)
    {
        $model = new MainDocumentTitleModel();
        $model->edit($request, $id);
    }

    public function remove($ids)
    {
        $model = new MainDocumentTitleModel();
        $model->remove($ids);
    }
}
