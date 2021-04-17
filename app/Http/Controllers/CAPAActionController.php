<?php

namespace App\Http\Controllers;

use App\Models\DepartmentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//MODELS
use App\Models\DocumentsModel;
use App\Models\FormsModel;
use App\Models\LocationModel;
use App\Models\UserDocumentPermissionModel;
use App\Services\file_uploading\FileUploading;

class CAPAActionController extends Controller
{
    //---------------------FORM SAVE ACTIONS AAT MADHLA CONTENT ITHE SAVE HONAR
    //---------------------CREATE AND UPDATE
    public function process_and_flow_control(Request $request)
    {
        $imagePath = array();
        $fileUploading = new FileUploading();
        foreach ($request->process_reference_document_urls as $file) {
            //File Uplading Service
            $fileUploading->request = $request;
            $fileUploading->file = $file;
            $fileUploading->id = $request->document_id;
            $fileUploading->path = 'reference_documents/' . $request->capa_number . '/' . $request->document_id;
            $fileUploading->validations = '';
            $imagePath[] = $fileUploading->uploadFile();
        }

        $documentData = [
            'objective' => $request->objective,
            'department_and_third_party_involvement' => $request->department_and_third_party_involvement,
            'list_of_document_involved' => $request->list_of_document_involved,
            'process_description' => [
                'description' => $request->process_description,
                'unit' => $request->units,
                'designation_responsibility' => $request->desgination_responsible,
                'document_in_use' => $request->document_in_use,
                'spacial_remarks' => $request->special_remarks
            ],
            'name_of_reference_document' => $request->name_of_reference_document,
            'reference_document_urls' => $imagePath
        ];

        // $documentData = json_encode($documentData, true);
        $model = DocumentsModel::find($request->document_id);
        $model->document_details = $documentData;
        if (isset($request->SAVE)) {
            $model->status = "SAVED";
        }

        if (isset($request->SUBMIT)) {
            $model->status = "SUBMIT";
        }
        $model->save();
        return redirect()->back()->with('message', 'Successful');
    }

    public function sop_production(Request $request)
    {
        $fileUploading = new FileUploading();
        foreach ($request->sop_production_reference_document_urls as $file) {
            //File Uplading Service
            $fileUploading->request = $request;
            $fileUploading->file = $file;
            $fileUploading->id = $request->document_id;
            $fileUploading->path = 'reference_documents/' . $request->capa_number . '/' . $request->document_id;
            $fileUploading->validations = '';
            $imagePath[] = $fileUploading->uploadFile();
        }

        $documentData = [
            'objective' => $request->objective,
            'chemical_required' => [
                'checmical_name' => $request->chemical_name,
                'chemical_make' => $request->chemical_make,
                'chemical_grade_purity' => $request->chemical_grade_purity,
                'chemical_quantity' => $request->chemical_quantity,
                'chemical_unit' => $request->chemical_unit
            ],
            'equipement_required' => [
                'equipement_name' => $request->equipement_name,
                'equipement_location_mark_and_number' => $request->equipement_location_mark_and_number,
                'equipement_capacity' => $request->equipement_capacity,
                'equipement_unit' => $request->equipement_unit,
            ],
            'pre_production_process' => $request->pre_production_process,
            'production_process' => $request->production_process,
            'post_production_process' => $request->post_production_process,
            'name_of_reference_document' => $request->name_of_reference_document,
            'reference_document_urls' => $request->sop_production_reference_document_urls
        ];
        $model = DocumentsModel::find($request->document_id);
        $model->document_details = $documentData;
        if (isset($request->SAVE)) {
            $model->status = "SAVED";
        }

        if (isset($request->SUBMIT)) {
            $model->status = "SUBMIT";
        }
        $model->save();
        return redirect()->back()->with('message', 'Successful');
    }

    public function sop_quality_control(Request $request)
    {
        $documentData = [
            'objective' => $request->objective,
            'chemical_required' => [
                'checmical_name' => $request->chemical_name,
                'chemical_make' => $request->chemical_make,
                'chemical_grade_purity' => $request->chemical_grade_purity,
                'chemical_quantity' => $request->chemical_quantity,
                'chemical_unit' => $request->chemical_unit
            ],
            'apparatus_required' => [
                'apparatus_name' => $request->apparatus_name,
                'apparatus_make' => $request->apparatus_make,
                'apparatus_model' => $request->apparatus_model
            ],
            'pre_testing' => $request->pre_testing,
            'testing' => $request->testing,
            'name_of_reference_document' => $request->name_of_reference_document,
        ];
        $model = DocumentsModel::find($request->document_id);
        $model->document_details = $documentData;
        if (isset($request->SAVE)) {
            $model->status = "SAVED";
        }

        if (isset($request->SUBMIT)) {
            $model->status = "SUBMIT";
        }
        $model->save();
        return redirect()->back()->with('message', 'Successful');
    }

    public function sop_maintenance(Request $request)
    {
        $documentData = [
            'purpose' => $request->purpose,
            'scope' => $request->scope,
            'responsibility' => $request->responsibility,
            'accountability' => $request->accountability,
            'defination' => $request->defination,
            'procedures' => $request->procedures,
            'precautions' => $request->precautions,
            'applicable_formats_reference' => $request->applicable_formats_reference,
            'abbrevations' => $request->abbrevations,
            'document_history' => $request->document_history,
            'name_of_reference_document' => $request->name_of_reference_document,
        ];
        $model = DocumentsModel::find($request->document_id);
        $model->document_details = $documentData;
        if (isset($request->SAVE)) {
            $model->status = "SAVED";
        }

        if (isset($request->SUBMIT)) {
            $model->status = "SUBMIT";
        }
        $model->save();
        return redirect()->back()->with('message', 'Successful');
    }

    public function msds(Request $request)
    {
        $documentData = [
            "identification" => [
                "product_identification" => $request->product_identification,
                "product_code" => $request->product_code,
                "physical_appearance" => $request->physical_appearance,
                "CAS_number" => $request->CAS_number,
                "relevant_identified_uses_of_substance" => $request->relevant_identified_uses_of_substance
            ],
            'hazards_identification' => $request->hazards_identification,
            'composition_information_or_ingredients' => $request->composition_information_or_ingredients,
            'first_and_measures' => $request->first_and_measures,
            'firefighting_measures' => $request->firefighting_measures,
            'accidental_release_measures' => $request->accidental_release_measures,
            'handling_and_storage' => $request->handling_and_storage,
            'exposure_control_or_personal_protection' => $request->exposure_control_or_personal_protection,
            'physical_and_chemical_properties' => $request->physical_and_chemical_properties,
            'stability_and_reactivity' => $request->stability_and_reactivity,
            'toxiocological_information' => $request->toxiocological_information
        ];
        $model = DocumentsModel::find($request->document_id);
        $model->document_details = $documentData;
        if (isset($request->SAVE)) {
            $model->status = "SAVED";
        }
        if (isset($request->SUBMIT)) {
            $model->status = "SUBMIT";
        }
        $model->save();
        return redirect()->back()->with('message', 'Successful');
    }

    public function sss(Request $request)
    {
        $documentData = [
            "client_name" => $request->client_name,
            "identification" => [
                "parameter" => $request->parameter,
                "specification" => $request->specification,
                "units" => $request->units,
                "remark" => $request->remark
            ],
        ];
        $model = DocumentsModel::find($request->document_id);
        $model->document_details = $documentData;
        if (isset($request->SAVE)) {
            $model->status = "SAVED";
        }
        if (isset($request->SUBMIT)) {
            $model->status = "SUBMIT";
        }
        $model->save();
        return redirect()->back()->with('message', 'Successful');
    }

    //---------------------ROLL BACK
    public function roll_back($sub_document_id, $version_number, $form_type)
    {
        $model = DocumentsModel::where('capa_action', 'ROLL_BACK')->where('status', 'SAVED')->where('sub_document_id', $sub_document_id)->orderBy('id', 'DESC')->first();
        if (empty($model)) {
            return redirect()->back();
        }
        $model->version_number = $version_number;
        $model->document_number = mb_substr($model->fetchLocation($model->location_id), 0, 3) . '/' . mb_substr($model->fetchDepartment($model->department_id), 0, 3) . '/' . $form_type . '/' . $version_number;
        $model->status = "SUBMIT";
        $model->save();
        return redirect()->back();
    }

    //---------------------DEACTIVATE
    public function deactivate($sub_document_ids)
    {
        $model = DocumentsModel::find($sub_document_ids);
        $model->status = "DEACTIVE";
        $model->save();
    }

    //---------------------REACTIVATE
    public function reactivate($document_id)
    {
        $model = DocumentsModel::find($document_id);
        $model->version_number = "ACTIVE";
        $model->save();
    }



    public function view($document_id)
    {
        $model = DocumentsModel::find($document_id);

        if ($model->form_id == 1) {
            return view('document_form_views.process_and_flow_control_form', [
                'dataSet' => $model
            ]);
        }

        if ($model->form_id == 2) {
            return view('document_form_views.sop_production_form', [
                'dataSet' => $model
            ]);
        }

        if ($model->form_id == 3) {
            return view('document_form_views.sop_quality_control_form', [
                'dataSet' => $model
            ]);
        }

        if ($model->form_id == 4) {
            return view('document_form_views.sop_maintenance_form', [
                'dataSet' => $model
            ]);
        }

        if ($model->form_id == 5) {
            return view('document_form_views.msds_form', [
                'dataSet' => $model
            ]);
        }

        if ($model->form_id == 6) {
            return view('document_form_views.sss_form', [
                'dataSet' => $model
            ]);
        }
    }
}
