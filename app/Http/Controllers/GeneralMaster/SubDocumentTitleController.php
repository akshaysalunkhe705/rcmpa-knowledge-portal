<?php

namespace App\Http\Controllers\GeneralMaster;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\DepartmentModel;
use App\Models\FormsModel;
use App\Models\MainDocumentTitleModel;
use App\Models\SubDocumentTitleModel;

class SubDocumentTitleController extends Controller
{
    public function index()
    {
        $departments = DepartmentModel::all();
        $form = FormsModel::all();
        $mainDocumentTitleModel = MainDocumentTitleModel::all();
        $subDocumentTitleModel = SubDocumentTitleModel::all();
        // $formMasters = SubDocumentNameModel::all();
        return view('general_master.sub_document_name.index', [
            'departments' => $departments,
            'form' => $form,
            'mainDocumentTitleModel' => $mainDocumentTitleModel,
            'subDocumentTitleModel' => $subDocumentTitleModel
        ]);
    }

    public function add(Request $request)
    {
        $model = new SubDocumentTitleModel();
        $model->add($request);
        return redirect()->back()->with('alert', 'Sub Document Title Inserted Successfuly!');;
    }

    public function edit(Request $request, $id)
    {
        $model = new SubDocumentTitleModel();
        $model->edit($request, $id);
    }

    public function remove($ids)
    {
        $model = new SubDocumentTitleModel();
        $model->remove($ids);
    }
}
