<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LocationModel;
use App\Models\DepartmentModel;
use App\Models\DocumentsModel;
use App\Models\FormsModel;
use App\Models\SubDocumentTitleModel;
use App\Models\UserDocumentPermissionModel;
use Illuminate\Support\Facades\Auth;

class CAPAController extends Controller
{
    public function index(Request $request, $action) //action->permissions
    {
        if (($action == 'create') || ($action == 'update') || ($action == 'roll_back')) {
            $documentAccessListIds = UserDocumentPermissionModel::where('user_id', Auth::user()->id)->where('permission_type', 'CREATE_UPDATE_ROLLBACK_DOC')->get();
        }
        if (($action == 'deactivate') || ($action == 'reactivate')) {
            $documentAccessListIds = UserDocumentPermissionModel::where('user_id', Auth::user()->id)->where('permission_type', 'DEACTIVE_REACTIVE_DOC')->get();
        }
        

        $sorted_sub_document_ids = array();
        foreach ($documentAccessListIds as $key => $value) {
            $sorted_sub_document_ids[] = $value->sub_document_id;
        }
        if (($action == 'update') || ($action == 'roll_back') || ($action == 'deactivate') || ($action == 'reactivate')) {
            $documentAccessListIds = DocumentsModel::whereIn('sub_document_id', $sorted_sub_document_ids)->where('status', 'ACTIVE')->get();
        }
        // elseif($action == 'create') {
        //     $documentAccessListIds = DocumentsModel::whereNotIn('sub_document_id', $sorted_sub_document_ids)->get();
        //     foreach ($documentAccessListIds as $key => $value) {
        //         $ids = array_search($value, $documentAccessListIds);
        //         unset($documentAccessListIds[$ids]);
        //     }         
        //     return $documentAccessListIds;
        // }

        $locationModel = LocationModel::all();
        $departmentModel = DepartmentModel::all();
        $formModel = FormsModel::all();
        return view('capa.index', [
            'action' => $action,
            'locationModel' => $locationModel,
            'departmentModel' => $departmentModel,
            'formModel' => $formModel,
            'documentAccessListIds' => $documentAccessListIds,
            'status' => 'FRESH'
        ]);
    }

    public function storeCapa(Request $request, $action)
    {
        $documentModel = new DocumentsModel();
        $formBasicData = [
            'user_id' => Auth::user()->id,
            'capa_number' => $request->capa_number,
            'location_id' => $request->location,
            'department_id' => $request->department,
            'prepared_by' => Auth::user()->name,
            'status' => 'SAVED'
        ];

        if ($action == 'create') {
            $formBasicData['version_number'] = 1.00;
            $formBasicData['created_date'] = date('Y-m-d');
            $formBasicData['capa_action'] = "CREATE";

            if (($request->process_main_document != null) && ($request->process_sub_document != null)) {
                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/PROC/1.0';
                $formBasicData['form_id'] = 1;
                $formBasicData['main_document_id'] = $request->process_main_document;
                $formBasicData['sub_document_id'] = $request->process_sub_document;
                $documentModel->add($formBasicData);
            }
            if (($request->sop_production_main_document != null) && ($request->sop_production_sub_document != null)) {
                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/SOP/1.0';
                $formBasicData['form_id'] = 2;
                $formBasicData['main_document_id'] = $request->sop_production_main_document;
                $formBasicData['sub_document_id'] = $request->sop_production_sub_document;
                $documentModel->add($formBasicData);
            }
            if (($request->sop_qc_main_document != null) && ($request->sop_qc_sub_document != null)) {
                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/SOP/1.0';
                $formBasicData['form_id'] = 3;
                $formBasicData['main_document_id'] = $request->sop_qc_main_document;
                $formBasicData['sub_document_id'] = $request->sop_qc_sub_document;
                $documentModel->add($formBasicData);
            }
            if (($request->sop_maintenance_main_document != null) && ($request->sop_maintenance_sub_document != null)) {
                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/SOP/1.0';
                $formBasicData['form_id'] = 4;
                $formBasicData['main_document_id'] = $request->sop_maintenance_main_document;
                $formBasicData['sub_document_id'] = $request->sop_maintenance_sub_document;
                $documentModel->add($formBasicData);
            }
            if (($request->msds_main_document != null) && ($request->msds_sub_document != null)) {
                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/MSDS/1.0';
                $formBasicData['form_id'] = 5;
                $formBasicData['main_document_id'] = $request->msds_main_document;
                $formBasicData['sub_document_id'] = $request->msds_sub_document;
                $documentModel->add($formBasicData);
            }
            if (($request->sss_main_document != null) && ($request->sss_sub_document != null)) {
                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/SSS/1.0';
                $formBasicData['form_id'] = 6;
                $formBasicData['main_document_id'] = $request->sss_main_document;
                $formBasicData['sub_document_id'] = $request->sss_sub_document;
                $documentModel->add($formBasicData);
            }
        }

        if ($action == 'update') {
            $formBasicData['revision_date'] = date('Y-m-d');
            $formBasicData['capa_action'] = "UPDATE";

            if (($request->process_main_document != null) && ($request->process_sub_document != null)) {
                $documentModel->archivedPreviousVersion($request->process_sub_document);
                $previousActiveVersionModel = DocumentsModel::where('main_document_id',$request->process_main_document)->where('sub_document_id', $request->process_sub_document)->where('status','ACTIVE')->first();
                $formBasicData['document_details'] = $previousActiveVersionModel->document_details;
                $formBasicData['created_date'] = date("Y-m-d", strtotime($previousActiveVersionModel->created_date));

                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/PROC/' . $documentModel->getLatestVersion($request->process_sub_document);
                $formBasicData['form_id'] = 1;
                $formBasicData['main_document_id'] = $request->process_main_document;
                $formBasicData['sub_document_id'] = $request->process_sub_document;
                $formBasicData['version_number'] = $documentModel->getLatestVersion($request->process_sub_document);
                $documentModel->add($formBasicData);
            }
            if (($request->sop_production_main_document != null) && ($request->sop_production_sub_document != null)) {
                $documentModel->archivedPreviousVersion($request->sop_production_sub_document);
                $previousActiveVersionModel = DocumentsModel::where('main_document_id',$request->sop_production_main_document)->where('sub_document_id', $request->sop_production_sub_document)->where('status','ACTIVE')->first();
                $formBasicData['document_details'] = $previousActiveVersionModel->document_details;
                $formBasicData['created_date'] = date("Y-m-d", strtotime($previousActiveVersionModel->created_date));
                
                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/SOP/' . $documentModel->getLatestVersion($request->process_sub_document);
                $formBasicData['form_id'] = 2;
                $formBasicData['main_document_id'] = $request->sop_production_main_document;
                $formBasicData['sub_document_id'] = $request->sop_production_sub_document;
                $formBasicData['version_number'] = $this->getLatestVersion($request->sop_production_sub_document);
                $documentModel->add($formBasicData);
            }
            if (($request->sop_qc_main_document != null) && ($request->sop_qc_sub_document != null)) {
                $documentModel->archivedPreviousVersion($request->sop_qc_sub_document);
                $previousActiveVersionModel = DocumentsModel::where('main_document_id',$request->sop_qc_main_document)->where('sub_document_id', $request->sop_qc_sub_document)->where('status','ACTIVE')->first();
                $formBasicData['document_details'] = $previousActiveVersionModel->document_details;
                $formBasicData['created_date'] = date("Y-m-d", strtotime($previousActiveVersionModel->created_date));
                
                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/SOP/' . $documentModel->getLatestVersion($request->process_sub_document);
                $formBasicData['form_id'] = 3;
                $formBasicData['main_document_id'] = $request->sop_qc_main_document;
                $formBasicData['sub_document_id'] = $request->sop_qc_sub_document;
                $formBasicData['version_number'] = $this->getLatestVersion($request->sop_qc_sub_document);
                $documentModel->add($formBasicData);
            }
            if (($request->sop_maintenance_main_document != null) && ($request->sop_maintenance_sub_document != null)) {
                $documentModel->archivedPreviousVersion($request->sop_maintenance_sub_document);
                $previousActiveVersionModel = DocumentsModel::where('main_document_id',$request->sop_maintenance_main_document)->where('sub_document_id', $request->sop_maintenance_sub_document)->where('status','ACTIVE')->first();
                $formBasicData['document_details'] = $previousActiveVersionModel->document_details;
                $formBasicData['created_date'] = date("Y-m-d", strtotime($previousActiveVersionModel->created_date));
                
                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/SOP/' . $documentModel->getLatestVersion($request->process_sub_document);
                $formBasicData['form_id'] = 4;
                $formBasicData['main_document_id'] = $request->sop_maintenance_main_document;
                $formBasicData['sub_document_id'] = $request->sop_maintenance_sub_document;
                $formBasicData['version_number'] = $this->getLatestVersion($request->sop_maintenance_sub_document);
                $documentModel->add($formBasicData);
            }
            if (($request->msds_main_document != null) && ($request->msds_sub_document != null)) {
                $documentModel->archivedPreviousVersion($request->msds_sub_document);
                $previousActiveVersionModel = DocumentsModel::where('main_document_id',$request->msds_main_document)->where('sub_document_id', $request->msds_sub_document)->where('status','ACTIVE')->first();
                $formBasicData['document_details'] = $previousActiveVersionModel->document_details;
                $formBasicData['created_date'] = date("Y-m-d", strtotime($previousActiveVersionModel->created_date));
                
                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/MSDS/' . $documentModel->getLatestVersion($request->process_sub_document);
                $formBasicData['form_id'] = 5;
                $formBasicData['main_document_id'] = $request->msds_main_document;
                $formBasicData['sub_document_id'] = $request->msds_sub_document;
                $formBasicData['version_number'] = $this->getLatestVersion($request->msds_sub_document);
                $documentModel->add($formBasicData);
            }
            if (($request->sss_main_document != null) && ($request->sss_sub_document != null)) {
                $documentModel->archivedPreviousVersion($request->sss_sub_document);
                $previousActiveVersionModel = DocumentsModel::where('main_document_id',$request->sss_main_document)->where('sub_document_id', $request->sss_sub_document)->where('status','ACTIVE')->first();
                $formBasicData['document_details'] = $previousActiveVersionModel->document_details;
                $formBasicData['created_date'] = date("Y-m-d", strtotime($previousActiveVersionModel->created_date));
                
                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/SSS/' . $documentModel->getLatestVersion($request->process_sub_document);
                $formBasicData['form_id'] = 6;
                $formBasicData['main_document_id'] = $request->sss_main_document;
                $formBasicData['sub_document_id'] = $request->sss_sub_document;
                $formBasicData['version_number'] = $this->getLatestVersion($request->sss_sub_document);
                $documentModel->add($formBasicData);
            }
        }

        if ($action == 'roll_back') {
            $formBasicData['revision_date'] = date('Y-m-d');
            $formBasicData['capa_action'] = "ROLL_BACK";
            
            if (($request->process_main_document != null) && ($request->process_sub_document != null)) {
                $previousActiveVersionModel = DocumentsModel::where('main_document_id',$request->process_main_document)->where('sub_document_id', $request->process_sub_document)->where('status','ACTIVE')->first();
                $formBasicData['document_details'] = $previousActiveVersionModel->document_details;
                $formBasicData['created_date'] = date("Y-m-d", strtotime($previousActiveVersionModel->created_date));

                // $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/PROC/' . $documentModel->getLatestVersion($request->process_sub_document);
                $formBasicData['form_id'] = 1;
                $formBasicData['main_document_id'] = $request->process_main_document;
                $formBasicData['sub_document_id'] = $request->process_sub_document;
                $documentModel->add($formBasicData);
            }
            if (($request->sop_production_main_document != null) && ($request->sop_production_sub_document != null)) {
                $previousActiveVersionModel = DocumentsModel::where('main_document_id',$request->sop_production_main_document)->where('sub_document_id', $request->sop_production_sub_document)->where('status','ACTIVE')->first();
                $formBasicData['document_details'] = $previousActiveVersionModel->document_details;
                $formBasicData['created_date'] = date("Y-m-d", strtotime($previousActiveVersionModel->created_date));
                
                // $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/SOP/' . $documentModel->getLatestVersion($request->process_sub_document);
                $formBasicData['form_id'] = 2;
                $formBasicData['main_document_id'] = $request->sop_production_main_document;
                $formBasicData['sub_document_id'] = $request->sop_production_sub_document;
                $documentModel->add($formBasicData);
            }
            if (($request->sop_qc_main_document != null) && ($request->sop_qc_sub_document != null)) {
                $previousActiveVersionModel = DocumentsModel::where('main_document_id',$request->sop_qc_main_document)->where('sub_document_id', $request->sop_qc_sub_document)->where('status','ACTIVE')->first();
                $formBasicData['document_details'] = $previousActiveVersionModel->document_details;
                $formBasicData['created_date'] = date("Y-m-d", strtotime($previousActiveVersionModel->created_date));
                
                // $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/SOP/' . $documentModel->getLatestVersion($request->process_sub_document);
                $formBasicData['form_id'] = 3;
                $formBasicData['main_document_id'] = $request->sop_qc_main_document;
                $formBasicData['sub_document_id'] = $request->sop_qc_sub_document;
                $documentModel->add($formBasicData);
            }
            if (($request->sop_maintenance_main_document != null) && ($request->sop_maintenance_sub_document != null)) {
                $previousActiveVersionModel = DocumentsModel::where('main_document_id',$request->sop_maintenance_main_document)->where('sub_document_id', $request->sop_maintenance_sub_document)->where('status','ACTIVE')->first();
                $formBasicData['document_details'] = $previousActiveVersionModel->document_details;
                $formBasicData['created_date'] = date("Y-m-d", strtotime($previousActiveVersionModel->created_date));
                
                // $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/SOP/' . $documentModel->getLatestVersion($request->process_sub_document);
                $formBasicData['form_id'] = 4;
                $formBasicData['main_document_id'] = $request->sop_maintenance_main_document;
                $formBasicData['sub_document_id'] = $request->sop_maintenance_sub_document;
                $documentModel->add($formBasicData);
            }
            if (($request->msds_main_document != null) && ($request->msds_sub_document != null)) {
                $previousActiveVersionModel = DocumentsModel::where('main_document_id',$request->msds_main_document)->where('sub_document_id', $request->msds_sub_document)->where('status','ACTIVE')->first();
                $formBasicData['document_details'] = $previousActiveVersionModel->document_details;
                $formBasicData['created_date'] = date("Y-m-d", strtotime($previousActiveVersionModel->created_date));
                
                // $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/MSDS/' . $documentModel->getLatestVersion($request->process_sub_document);
                $formBasicData['form_id'] = 5;
                $formBasicData['main_document_id'] = $request->msds_main_document;
                $formBasicData['sub_document_id'] = $request->msds_sub_document;
                $documentModel->add($formBasicData);
            }
            if (($request->sss_main_document != null) && ($request->sss_sub_document != null)) {
                $previousActiveVersionModel = DocumentsModel::where('main_document_id',$request->sss_main_document)->where('sub_document_id', $request->sss_sub_document)->where('status','ACTIVE')->first();
                $formBasicData['document_details'] = $previousActiveVersionModel->document_details;
                $formBasicData['created_date'] = date("Y-m-d", strtotime($previousActiveVersionModel->created_date));
                
                // $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/SSS/' . $documentModel->getLatestVersion($request->process_sub_document);
                $formBasicData['form_id'] = 6;
                $formBasicData['main_document_id'] = $request->sss_main_document;
                $formBasicData['sub_document_id'] = $request->sss_sub_document;
                $documentModel->add($formBasicData);
            }
        }
        if ($action == 'deactivate') {
            $formBasicData['capa_action'] = "DEACTIVATE";
            if (($request->process_main_document != null) && ($request->process_sub_document != null)) {
                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/PROC/1.0';
                $formBasicData['form_id'] = 1;
                $formBasicData['main_document_id'] = $request->process_main_document;
                $formBasicData['sub_document_id'] = $request->process_sub_document;
                $documentModel->add($formBasicData);
            }
            if (($request->sop_production_main_document != null) && ($request->sop_production_sub_document != null)) {
                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/SOP/1.0';
                $formBasicData['form_id'] = 2;
                $formBasicData['main_document_id'] = $request->sop_production_main_document;
                $formBasicData['sub_document_id'] = $request->sop_production_sub_document;
                $documentModel->add($formBasicData);
            }
            if (($request->sop_qc_main_document != null) && ($request->sop_qc_sub_document != null)) {
                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/SOP/1.0';
                $formBasicData['form_id'] = 3;
                $formBasicData['main_document_id'] = $request->sop_qc_main_document;
                $formBasicData['sub_document_id'] = $request->sop_qc_sub_document;
                $documentModel->add($formBasicData);
            }
            if (($request->sop_maintenance_main_document != null) && ($request->sop_maintenance_sub_document != null)) {
                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/SOP/1.0';
                $formBasicData['form_id'] = 4;
                $formBasicData['main_document_id'] = $request->sop_maintenance_main_document;
                $formBasicData['sub_document_id'] = $request->sop_maintenance_sub_document;
                $documentModel->add($formBasicData);
            }
            if (($request->msds_main_document != null) && ($request->msds_sub_document != null)) {
                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/MSDS/1.0';
                $formBasicData['form_id'] = 5;
                $formBasicData['main_document_id'] = $request->msds_main_document;
                $formBasicData['sub_document_id'] = $request->msds_sub_document;
                $documentModel->add($formBasicData);
            }
            if (($request->sss_main_document != null) && ($request->sss_sub_document != null)) {
                $formBasicData['document_number'] = mb_substr($documentModel->fetchLocation($request->location), 0, 3) . '/' . mb_substr($documentModel->fetchDepartment($request->department), 0, 3) . '/SSS/1.0';
                $formBasicData['form_id'] = 6;
                $formBasicData['main_document_id'] = $request->sss_main_document;
                $formBasicData['sub_document_id'] = $request->sss_sub_document;
                $documentModel->add($formBasicData);
            }
        }
        if ($action == 'reactivate') {
            $formBasicData['revision_date'] = date('Y-m-d');
            $formBasicData['capa_action'] = "REACTIVATE";
        }
        return $request;
    }




    public function create($capa_number)
    {
        // $documentAccessListIds = UserDocumentPermissionModel::where('user_id', Auth::user()->id)->where('permission_type', 'CREATE_UPDATE_ROLLBACK_DOC')->get();
        $process = DocumentsModel::whereIn('status', ['CREATE','SAVED','REJECT'])->where('capa_action', 'CREATE')->where('form_id', 1)->where('capa_number', $capa_number)->get(); //->whereIn('sub_document_id', array_column(json_decode($documentAccessListIds, true), 'sub_document_id'))
        $sop_production = DocumentsModel::whereIn('status', ['CREATE','SAVED','REJECT'])->where('capa_action', 'CREATE')->where('form_id', 2)->where('capa_number', $capa_number)->get();
        $sop_quality_control = DocumentsModel::whereIn('status', ['CREATE','SAVED','REJECT'])->where('capa_action', 'CREATE')->where('form_id', 3)->where('capa_number', $capa_number)->get();
        $sop_maintenance = DocumentsModel::whereIn('status', ['CREATE','SAVED','REJECT'])->where('capa_action', 'CREATE')->where('form_id', 4)->where('capa_number', $capa_number)->get();
        $msds = DocumentsModel::whereIn('status', ['CREATE','SAVED','REJECT'])->where('capa_action', 'CREATE')->where('form_id', 5)->where('capa_number', $capa_number)->get();
        $sss = DocumentsModel::whereIn('status', ['CREATE','SAVED','REJECT'])->where('capa_action', 'CREATE')->where('form_id', 6)->where('capa_number', $capa_number)->get();

        return view('capa/create', [
            'capa_number' => $capa_number,
            'process' => $process,
            'sop_production' => $sop_production,
            'sop_quality_control' => $sop_quality_control,
            'sop_maintenance' => $sop_maintenance,
            'msds' => $msds,
            'sss' => $sss,
        ]);
    }
    public function update($capa_number)
    {
        // $documentAccessListIds = UserDocumentPermissionModel::where('user_id', Auth::user()->id)->where('permission_type', 'CREATE_UPDATE_ROLLBACK_DOC')->get();
        $process = DocumentsModel::whereIn('status', ['CREATE','SAVED','REJECT'])->where('capa_action', 'UPDATE')->where('form_id', 1)->where('capa_number', $capa_number)->get(); //->whereIn('sub_document_id', array_column(json_decode($documentAccessListIds, true), 'sub_document_id'))
        $sop_production = DocumentsModel::whereIn('status', ['CREATE','SAVED','REJECT'])->where('capa_action', 'UPDATE')->where('form_id', 2)->where('capa_number', $capa_number)->get();
        $sop_quality_control = DocumentsModel::whereIn('status', ['CREATE','SAVED','REJECT'])->where('capa_action', 'UPDATE')->where('form_id', 3)->where('capa_number', $capa_number)->get();
        $sop_maintenance = DocumentsModel::whereIn('status', ['CREATE','SAVED','REJECT'])->where('capa_action', 'UPDATE')->where('form_id', 4)->where('capa_number', $capa_number)->get();
        $msds = DocumentsModel::whereIn('status', ['CREATE','SAVED','REJECT'])->where('capa_action', 'UPDATE')->where('form_id', 5)->where('capa_number', $capa_number)->get();
        $sss = DocumentsModel::whereIn('status', ['CREATE','SAVED','REJECT'])->where('capa_action', 'UPDATE')->where('form_id', 6)->where('capa_number', $capa_number)->get();

        return view('capa/update', [
            'capa_number' => $capa_number,
            'process' => $process,
            'sop_production' => $sop_production,
            'sop_quality_control' => $sop_quality_control,
            'sop_maintenance' => $sop_maintenance,
            'msds' => $msds,
            'sss' => $sss,
        ]);
    }
    public function rollback($capa_number, $process_sub_document, $sop_maintenance_sub_document, $sop_production_sub_document, $sop_qc_sub_document, $msds_sub_document, $sss_sub_document)
    {
        // $documentAccessListIds = UserDocumentPermissionModel::where('user_id', Auth::user()->id)->where('permission_type', 'CREATE_UPDATE_ROLLBACK_DOC')->get();
        $process = DocumentsModel::where('form_id', 1)->where('version_number','!=', null)->where('status', 'ARCHIVED')->where('sub_document_id',$process_sub_document)->get(); //->whereIn('sub_document_id', array_column(json_decode($documentAccessListIds, true), 'sub_document_id'))
        $sop_production = DocumentsModel::where('form_id', 2)->where('version_number','!=', null)->where('status', 'ARCHIVED')->where('sub_document_id',$sop_production_sub_document)->get();
        $sop_quality_control = DocumentsModel::where('form_id', 3)->where('version_number','!=', null)->where('status', 'ARCHIVED')->where('sub_document_id',$sop_qc_sub_document)->get();
        $sop_maintenance = DocumentsModel::where('form_id', 4)->where('version_number','!=', null)->where('status', 'ARCHIVED')->where('sub_document_id',$sop_maintenance_sub_document)->get();
        $msds = DocumentsModel::where('form_id', 5)->where('version_number','!=', null)->where('status', 'ARCHIVED')->where('sub_document_id',$msds_sub_document)->get();
        $sss = DocumentsModel::where('form_id', 6)->where('version_number','!=', null)->where('status', 'ARCHIVED')->where('sub_document_id',$sss_sub_document)->get();

        return view('capa/roll_back', [
            'capa_number' => $capa_number,
            'process' => $process,
            'sop_production' => $sop_production,
            'sop_quality_control' => $sop_quality_control,
            'sop_maintenance' => $sop_maintenance,
            'msds' => $msds,
            'sss' => $sss,
        ]);
    }
    public function deactivate($capa_number, $process_sub_document, $sop_maintenance_sub_document, $sop_production_sub_document, $sop_qc_sub_document, $msds_sub_document, $sss_sub_document)
    {
        // $documentAccessListIds = UserDocumentPermissionModel::where('user_id', Auth::user()->id)->where('permission_type', 'CREATE_UPDATE_ROLLBACK_DOC')->get();
        $process = DocumentsModel::where('form_id', 1)->where('version_number','!=', null)->where('status','!=', 'ACTIVE')->where('sub_document_id',$process_sub_document)->get(); //->whereIn('sub_document_id', array_column(json_decode($documentAccessListIds, true), 'sub_document_id'))
        $sop_production = DocumentsModel::where('form_id', 2)->where('version_number','!=', null)->where('status','!=', 'ACTIVE')->where('sub_document_id',$sop_production_sub_document)->get();
        $sop_quality_control = DocumentsModel::where('form_id', 3)->where('version_number','!=', null)->where('status','!=', 'ACTIVE')->where('sub_document_id',$sop_qc_sub_document)->get();
        $sop_maintenance = DocumentsModel::where('form_id', 4)->where('version_number','!=', null)->where('status','!=', 'ACTIVE')->where('sub_document_id',$sop_maintenance_sub_document)->get();
        $msds = DocumentsModel::where('form_id', 5)->where('version_number','!=', null)->where('status','!=', 'ACTIVE')->where('sub_document_id',$msds_sub_document)->get();
        $sss = DocumentsModel::where('form_id', 6)->where('version_number','!=', null)->where('status','!=', 'ACTIVE')->where('sub_document_id',$sss_sub_document)->get();

        return view('capa/deactivate', [
            'capa_number' => $capa_number,
            'process' => $process,
            'sop_production' => $sop_production,
            'sop_quality_control' => $sop_quality_control,
            'sop_maintenance' => $sop_maintenance,
            'msds' => $msds,
            'sss' => $sss,
        ]);
    }
    public function reactivate($capa_number, $process_sub_document, $sop_maintenance_sub_document, $sop_production_sub_document, $sop_qc_sub_document, $msds_sub_document, $sss_sub_document)
    {
        // $documentAccessListIds = UserDocumentPermissionModel::where('user_id', Auth::user()->id)->where('permission_type', 'CREATE_UPDATE_ROLLBACK_DOC')->get();
        $process = DocumentsModel::where('form_id', 1)->where('version_number','!=', null)->where('status','!=', 'ACTIVE')->where('sub_document_id',$process_sub_document)->get(); //->whereIn('sub_document_id', array_column(json_decode($documentAccessListIds, true), 'sub_document_id'))
        $sop_production = DocumentsModel::where('form_id', 2)->where('version_number','!=', null)->where('status','!=', 'ACTIVE')->where('sub_document_id',$sop_production_sub_document)->get();
        $sop_quality_control = DocumentsModel::where('form_id', 3)->where('version_number','!=', null)->where('status','!=', 'ACTIVE')->where('sub_document_id',$sop_qc_sub_document)->get();
        $sop_maintenance = DocumentsModel::where('form_id', 4)->where('version_number','!=', null)->where('status','!=', 'ACTIVE')->where('sub_document_id',$sop_maintenance_sub_document)->get();
        $msds = DocumentsModel::where('form_id', 5)->where('version_number','!=', null)->where('status','!=', 'ACTIVE')->where('sub_document_id',$msds_sub_document)->get();
        $sss = DocumentsModel::where('form_id', 6)->where('version_number','!=', null)->where('status','!=', 'ACTIVE')->where('sub_document_id',$sss_sub_document)->get();

        return view('capa/reactive', [
            'capa_number' => $capa_number,
            'process' => $process,
            'sop_production' => $sop_production,
            'sop_quality_control' => $sop_quality_control,
            'sop_maintenance' => $sop_maintenance,
            'msds' => $msds,
            'sss' => $sss,
        ]);
    }
}
