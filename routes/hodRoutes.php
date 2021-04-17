<?php

use App\Http\Controllers\CAPAActionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CAPAController;

use App\Http\Controllers\DocumentStatusController;
use App\Http\Controllers\DocumentViewController;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'capa'], function () {
    Route::match(['GET', 'POST'], '/{action}', [CAPAController::class, 'index']);
    Route::match(['GET', 'POST'], 'store_capa/{action}', [CAPAController::class, 'storeCapa']);
    Route::get('set/create/{capa_number}', [CAPAController::class, 'create']);
    Route::get('set/update/{capa_number}', [CAPAController::class, 'update']);

    Route::get('set/roll_back/{capa_number}/{process_sub_document}/{sop_maintenance_sub_document}/{sop_production_sub_document}/{sop_qc_sub_document}/{msds_sub_document}/{sss_sub_document}', [CAPAController::class, 'rollback']);
    Route::get('set/deactivate/{capa_number}/{process_sub_document}/{sop_maintenance_sub_document}/{sop_production_sub_document}/{sop_qc_sub_document}/{msds_sub_document}/{sss_sub_document}', [CAPAController::class, 'deactivate']);
    Route::get('set/reactivate/{capa_number}/{process_sub_document}/{sop_maintenance_sub_document}/{sop_production_sub_document}/{sop_qc_sub_document}/{msds_sub_document}/{sss_sub_document}', [CAPAController::class, 'reactivate']);
});

Route::group(['prefix' => 'capa_actions'], function () {
    Route::post('process_and_flow_control/{document_id}', [CAPAActionController::class, 'process_and_flow_control']);
    Route::post('sop_production/{document_id}', [CAPAActionController::class, 'sop_production']);
    Route::post('sop_quality_control/{document_id}', [CAPAActionController::class, 'sop_quality_control']);
    Route::post('sop_maintenance/{document_id}', [CAPAActionController::class, 'sop_maintenance']);
    Route::post('msds/{document_id}', [CAPAActionController::class, 'msds']);
    Route::post('sss/{document_id}', [CAPAActionController::class, 'sss']);
    
    Route::get('roll_back_document/{sub_document_id}/{version_number}/{form_type}', [CAPAActionController::class, 'roll_back']);
    Route::get('deactivate/{sub_document_ids}', [CAPAActionController::class, 'deactivate']);
    Route::get('reactivate/{document_id}', [CAPAActionController::class, 'reactivate']);
});

Route::group(['prefix' => 'document_status'], function () {
    Route::get('created_but_not_submitted', [DocumentStatusController::class, 'createdButNotSubmitted']);
    Route::get('submitted_but_not_approved', [DocumentStatusController::class, 'submittedButNotApproved']);
    Route::get('rejected_for_resubmission', [DocumentStatusController::class, 'rejectedForResubmission']);
    Route::get('rejected_for_remove_from_capa', [DocumentStatusController::class, 'rejectedForRemoveFromCapa']);
});

Route::group(['prefix' => 'document_views'], function () {
    Route::get('view_form_document/{document_id}', [CAPAActionController::class, 'view']);
    Route::get('active_document', [DocumentViewController::class, 'activeDocument']);
    Route::get('deactive_document', [DocumentViewController::class, 'deactiveDocument']);
    Route::get('archived_document', [DocumentViewController::class, 'archivedDocument']);
});
