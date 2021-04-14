<?php

use App\Http\Controllers\DocumentStatusController;
use App\Http\Controllers\DocumentViewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralMaster\GeneralMasterController;
use App\Http\Controllers\GeneralMaster\RoleController;
use App\Http\Controllers\GeneralMaster\LocationController;
use App\Http\Controllers\GeneralMaster\DepartmentController;
use App\Http\Controllers\GeneralMaster\FormController;
use App\Http\Controllers\GeneralMaster\MainDocumenTitleController;
use App\Http\Controllers\GeneralMaster\SubDocumentTitleController;
use App\Http\Controllers\GeneralMaster\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDocumentPermissionController;



Route::get('/', [DashboardController::class, 'dashboard']);


Route::match(['GET', 'POST'], 'login', [UserController::class, 'login']);


Route::group(['prefix' => 'general-master'], function () {
    Route::get('/', [GeneralMasterController::class, 'index']);
});


//login and registration
Route::group(['prefix' => 'user'], function () {
    Route::get('fetch/', [UserController::class, 'fetch']);
    Route::get('detail/{id}', [UserController::class, 'detail']);
    Route::match(['GET', 'POST'], 'add', [UserController::class, 'add']);
    Route::match(['GET', 'POST'], 'edit/{id}', [UserController::class, 'edit']);
    Route::get('remove/{user_id}', [UserController::class, 'remove']);
});

Route::group(['middleware' => ['AuthCheck'], 'prefix' => 'general_master'], function () {
    Route::group(['prefix' => 'role'], function () {
        Route::get('/', [RoleController::class, 'index']);
        Route::match(['GET', 'POST'], 'add', [RoleController::class, 'add']);
        Route::match(['GET', 'POST'], 'edit/{id}', [RoleController::class, 'edit']);
        Route::get('remove/{id}', [RoleController::class, 'remove']);
    });
    Route::group(['prefix' => 'location'], function () {
        Route::get('/', [LocationController::class, 'index']);
        Route::match(['GET', 'POST'], 'add', [LocationController::class, 'add']);
        Route::match(['GET', 'POST'], 'edit/{id}', [LocationController::class, 'edit']);
        Route::get('remove/{id}', [LocationController::class, 'remove']);
    });
    Route::group(['prefix' => 'department'], function () {
        Route::get('/', [DepartmentController::class, 'index']);
        Route::match(['GET', 'POST'], 'add', [DepartmentController::class, 'add']);
        Route::match(['GET', 'POST'], 'edit/{id}', [DepartmentController::class, 'edit']);
        Route::get('remove/{id}', [DepartmentController::class, 'remove']);
    });
    Route::group(['prefix' => 'forms'], function () {
        Route::get('/', [FormController::class, 'index']);
        Route::get('/add', [FormController::class, 'add']);
        Route::get('/edit/{id}', [FormController::class, 'edit']);
        Route::get('/remove/{id}', [FormController::class, 'remove']);
    });
    Route::group(['prefix' => 'main_document_title'], function () {
        Route::get('/', [MainDocumenTitleController::class, 'index']);
        Route::match(['GET', 'POST'], 'add', [MainDocumenTitleController::class, 'add']);
        Route::match(['GET', 'POST'], 'edit/{id}', [MainDocumenTitleController::class, 'edit']);
        Route::get('remove/{id}', [MainDocumenTitleController::class, 'remove']);
    });
    Route::group(['prefix' => 'sub_document_title'], function () {
        Route::get('/', [SubDocumentTitleController::class, 'index']);
        Route::match(['GET', 'POST'], 'add', [SubDocumentTitleController::class, 'add']);
        Route::match(['GET', 'POST'], 'edit/{id}', [SubDocumentTitleController::class, 'edit']);
        Route::get('remove/{id}', [SubDocumentTitleController::class, 'remove']);
    });
    Route::group(['prefix' => 'units'], function () {
        Route::get('/', [UnitController::class, 'index']);
        Route::match(['GET', 'POST'], 'add', [UnitController::class, 'add']);
        Route::match(['GET', 'POST'], 'edit/{id}', [UnitController::class, 'edit']);
        Route::get('remove/{id}', [UnitController::class, 'remove']);
    });

    Route::get('fetch_department_from_location', [GeneralMasterController::class,'fetchDepartmentFromLocation']);
    Route::get('fetch_main_document_title', [GeneralMasterController::class,'fetchMainDocumentTitle']);
    Route::get('fetch_sub_document_title', [GeneralMasterController::class,'fetchSubDocumentTitle']);
});

Route::group(['prefix' => 'user_document_permissions'], function () {
    Route::match(['GET', 'POST'], 'set_document_action', [UserDocumentPermissionController::class, 'set_document_action']);
    Route::match(['GET', 'POST'], 'unset_document_action', [UserDocumentPermissionController::class, 'unset_document_action']);
    Route::match(['GET', 'POST'], 'set_all_action', [UserDocumentPermissionController::class, 'set_all_action']);
    Route::match(['GET', 'POST'], 'unset_all_action', [UserDocumentPermissionController::class, 'unset_all_action']);
});

Route::group(['prefix' => 'documents'], function () {
    Route::get('/', [DocumentsController::class, 'index']);
    Route::get('/add', [DocumentsController::class, 'add']);
    Route::get('/edit/{id}', [DocumentsController::class, 'edit']);
    Route::get('/remove/{id}', [DocumentsController::class, 'remove']);
});


Route::group(['prefix'=>'document_views'],function(){
    Route::get('active_document',[DocumentViewController::class, 'activeAdminDocument']);
    Route::get('deactive_document',[DocumentViewController::class, 'deactiveAdminDocument']);
    Route::get('archived_document',[DocumentViewController::class, 'archivedAdminDocument']);
});


Route::group(['prefix'=>'document_pending_for_action'],function(){
    Route::get('/',[DocumentStatusController::class,'pendingForAction']);
    Route::get('view/{documenet_id}',[DocumentStatusController::class,'approveDocument']);
    Route::get('approve/{documenet_id}',[DocumentStatusController::class,'approveDocument']);
    Route::get('reject/{documenet_id}',[DocumentStatusController::class,'rejectDocument']);
    Route::get('remove/{documenet_id}',[DocumentStatusController::class,'removeDocument']);
});