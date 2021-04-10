<?php

namespace App\Http\Controllers\GeneralMaster;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\LocationModel;
use App\Models\DepartmentModel;
use App\Models\MainDocumentTitleModel;
use App\Models\SubDocumentTitleModel;
use App\Models\FormsModel;

class GeneralMasterController extends Controller
{
    public function index()
    {
        $locationModel = LocationModel::all();
        $departmentModel = DepartmentModel::all();
        $mainDocumentTitleModel = MainDocumentTitleModel::all();
        $subDocumentTitleModel = SubDocumentTitleModel::all();
        $formsModel = FormsModel::all();

        return view('general_master/index', [
            'locationModel' => $locationModel,
            'departmentModel' => $departmentModel,
            'mainDocumentTitleModel' => $mainDocumentTitleModel,
            'subDocumentTitleModel' => $subDocumentTitleModel,
            'formsModel' => $formsModel
        ]);
    }

    public function fetchMainDocumentTitle(Request $request)
    {
        $subDocumentTitleModel = MainDocumentTitleModel::where('department_id', $request->department_id)->get();
        $options='<option value="">Select Main Document Title</option>';
        foreach ($subDocumentTitleModel as $key => $value) {
            $options .= "<option value='".$value->id."'>".$value->main_document_title."</option>";
        }
        return $options;
    }

    public function fetchSubDocumentTitle(Request $request)
    {
        $subDocumentTitleModel = SubDocumentTitleModel::where('main_document_id', $request->main_document_id)->get();
        $options='<option value="">Select Sub Document Title</option>';
        foreach ($subDocumentTitleModel as $key => $value) {
            $options .= "<option value='".$value->id."'>".$value->sub_document_title."</option>";
        }
        return $options;
    }

    public function fetchDepartmentFromLocation(Request $request)
    {
        $locationModel = DepartmentModel::where('location_id', $request->location_id)->get();
        $options='<option value="">Select Department</option>';
        foreach ($locationModel as $key => $value) {
            $options .= "<option value='".$value->id."'>".$value->department_name."</option>";
        }
        return $options;
    }
}
