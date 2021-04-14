<?php
use App\Models\DepartmentModel;
use App\Models\MainDocumentTitleModel;
use App\Models\SubDocumentTitleModel;
use App\Models\UserDocumentPermissionModel;
?>

@extends('./layouts/layout',
[
'title' => 'User',
'heading' => 'User',
'breadcrumb1' => 'user',
'breadcrumb2' => $user->name,
'nav_status' => 'user',
'sub_nav_status' => 'user-fetch',
]
)


@section('main_container')
    <div class="row">
        <div class="col-md-6 border p-2">
            <label>Department : </label>
            <span>{{ $user->department }}</span>
        </div>
        <div class="col-md-6 border p-2">
            <label>Role : </label>
            <span>{{ $user->role }}</span>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4 border p-2">
            <label>Name : </label>
            <span>{{ $user->name }}</span>
        </div>
        <div class="col-md-4 border p-2">
            <label>User Name : </label>
            <span>{{ $user->username }}</span>
        </div>
        {{-- <div class="col-md-4 border p-2">
            <label>Email : </label>
            <span>{{ $user->email }}</span>
        </div> --}}
    </div>

    <br><br>



    @foreach ($departmentDataset as $department)
        <div onclick="js:toggleDepartmentSlide({{ $department->id }})" class="border p-2 bg-danger"
            style="font-weight:bold;">
            <h4 style="color:white;">{{ $department->department_name }}</h4>
        </div>
        <div id="department-{{ $department->id }}" class=" border p-2" style="background-color:rgb(179, 179, 179)">
            @foreach ($FormsModel as $formMaster)
                <?php $masterDocumentsCount = 0; ?>
                <div class="masterForm-{{ $department->id }}-{{ $formMaster->id }}">
                    <div onclick="js:toggleFormMasterSlide({{ $formMaster->id }})" class="border p-2 bg-info">
                        <h5>{{ $formMaster->form_name }}</h5>
                    </div>
                    <div id="form-master-{{ $formMaster->id }}" class="form-master border p-2"
                        style="background-color:white;">
                        <?php $mainDocumentDataset = MainDocumentTitleModel::where('department_id',
                        $department->id)
                        ->where('form_id', $formMaster->id)
                        ->get(); ?>
                        @foreach ($mainDocumentDataset as $mainDocument)
                            <?php $masterDocumentsCount++; ?>
                            <h5> {{ $mainDocument->document_name }} </h5>
                            <?php $subDocumentDataset = SubDocumentTitleModel::where('department_id',
                            $department->id)
                            ->where('main_document_id', $mainDocument->id)
                            ->get(); ?>

                            @foreach ($subDocumentDataset as $subDocument)
                                <?php
                                $CREATE_UPDATE_ROLLBACK_DOC_PERMISSION_STATUS =
                                UserDocumentPermissionModel::where('user_id', $user->id)
                                ->where('permission_type', 'CREATE_UPDATE_ROLLBACK_DOC')
                                ->where('department_id', $department->id)
                                ->where('form_id', $formMaster->id)
                                ->where('main_document_id', $mainDocument->id)
                                ->where('sub_document_id', $subDocument->id)
                                ->first();
                                $VIEW_ACTIVE_DOC_PERMISSION_STATUS = UserDocumentPermissionModel::where('user_id',
                                $user->id)
                                ->where('permission_type', 'VIEW_ACTIVE_DOC')
                                ->where('department_id', $department->id)
                                ->where('form_id', $formMaster->id)
                                ->where('main_document_id', $mainDocument->id)
                                ->where('sub_document_id', $subDocument->id)
                                ->first();
                                $DEACTIVE_REACTIVE_DOC_PERMISSION_STATUS = UserDocumentPermissionModel::where('user_id',
                                $user->id)
                                ->where('permission_type', 'DEACTIVE_REACTIVE_DOC')
                                ->where('department_id', $department->id)
                                ->where('form_id', $formMaster->id)
                                ->where('main_document_id', $mainDocument->id)
                                ->where('sub_document_id', $subDocument->id)
                                ->first();
                                $VIEW_PENDING_DOC_PERMISSION_STATUS = UserDocumentPermissionModel::where('user_id',
                                $user->id)
                                ->where('permission_type', 'VIEW_PENDING_DOC')
                                ->where('department_id', $department->id)
                                ->where('form_id', $formMaster->id)
                                ->where('main_document_id', $mainDocument->id)
                                ->where('sub_document_id', $subDocument->id)
                                ->first();
                                $VIEW_REJECTED_DOC_PERMISSION_STATUS = UserDocumentPermissionModel::where('user_id',
                                $user->id)
                                ->where('permission_type', 'VIEW_REJECTED_DOC')
                                ->where('department_id', $department->id)
                                ->where('form_id', $formMaster->id)
                                ->where('main_document_id', $mainDocument->id)
                                ->where('sub_document_id', $subDocument->id)
                                ->first();
                                $VIEW_ARCHIVE_DOC_PERMISSION_STATUS = UserDocumentPermissionModel::where('user_id',
                                $user->id)
                                ->where('permission_type', 'VIEW_ARCHIVE_DOC')
                                ->where('department_id', $department->id)
                                ->where('form_id', $formMaster->id)
                                ->where('main_document_id', $mainDocument->id)
                                ->where('sub_document_id', $subDocument->id)
                                ->first();
                                $CAPA_STATUS_PERMISSION_STATUS = UserDocumentPermissionModel::where('user_id', $user->id)
                                ->where('permission_type', 'CAPA_STATUS')
                                ->where('department_id', $department->id)
                                ->where('form_id', $formMaster->id)
                                ->where('main_document_id', $mainDocument->id)
                                ->where('sub_document_id', $subDocument->id)
                                ->first();
                                ?>
                                <div class="border p-3">
                                    <b>{{ $mainDocument->main_document_title }} - (
                                        {{ $subDocument->sub_document_title }} ) </b>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="checkbox"
                                                id="checkbox-id-{{ $user->id }}-{{ $department->id }}-{{ $formMaster->id }}-{{ $mainDocument->id }}-{{ $subDocument->id }}-ALL"
                                                onchange="js:checked_all(id, {{ $user->id }}, {{ $department->id }}, {{ $formMaster->id }}, {{ $mainDocument->id }}, {{ $subDocument->id }}, 'ALL');">
                                            SELECT ALL <br>
                                            <input type="checkbox"
                                                id="checkbox-id-{{ $user->id }}-{{ $department->id }}-{{ $formMaster->id }}-{{ $mainDocument->id }}-{{ $subDocument->id }}-CREATE_UPDATE_ROLLBACK_DOC"
                                                onchange="js:assignRoleToUser(id, {{ $user->id }}, {{ $department->id }}, {{ $formMaster->id }}, {{ $mainDocument->id }}, {{ $subDocument->id }}, 'CREATE_UPDATE_ROLLBACK_DOC');" <?= $CREATE_UPDATE_ROLLBACK_DOC_PERMISSION_STATUS != null ? 'checked' : 'none' ?>> Create | Update | Rollback
                                                </div>

                                                <div class="col-md-3">
                                                    <input type="checkbox" id="checkbox-id-{{ $user->id }}-{{ $department->id }}-{{ $formMaster->id }}-{{ $mainDocument->id }}-{{ $subDocument->id }}-VIEW_ACTIVE_DOC" onchange="js:assignRoleToUser(id, {{ $user->id }}, {{ $department->id }}, {{ $formMaster->id }}, {{ $mainDocument->id }}, {{ $subDocument->id }}, 'VIEW_ACTIVE_DOC');" <?= $VIEW_ACTIVE_DOC_PERMISSION_STATUS != null ? 'checked' : 'none' ?>> View Active Docs <br>
                                                    <input type="checkbox" id="checkbox-id-{{ $user->id }}-{{ $department->id }}-{{ $formMaster->id }}-{{ $mainDocument->id }}-{{ $subDocument->id }}-DEACTIVE_REACTIVE_DOC" onchange="js:assignRoleToUser(id, {{ $user->id }}, {{ $department->id }}, {{ $formMaster->id }}, {{ $mainDocument->id }}, {{ $subDocument->id }}, 'DEACTIVE_REACTIVE_DOC');" <?= $DEACTIVE_REACTIVE_DOC_PERMISSION_STATUS != null ? 'checked' : 'none' ?>> Deactivate | Reactive Docs
                                                </div>

                                                <div class="col-md-3">
                                                    <input type="checkbox" id="checkbox-id-{{ $user->id }}-{{ $department->id }}-{{ $formMaster->id }}-{{ $mainDocument->id }}-{{ $subDocument->id }}-VIEW_PENDING_DOC" onchange="js:assignRoleToUser(id, {{ $user->id }}, {{ $department->id }}, {{ $formMaster->id }}, {{ $mainDocument->id }}, {{ $subDocument->id }}, 'VIEW_PENDING_DOC');" <?= $VIEW_PENDING_DOC_PERMISSION_STATUS != null ? 'checked' : 'none' ?>> View Pending Docs <br>
                                                    <input type="checkbox" id="checkbox-id-{{ $user->id }}-{{ $department->id }}-{{ $formMaster->id }}-{{ $mainDocument->id }}-{{ $subDocument->id }}-VIEW_REJECTED_DOC" onchange="js:assignRoleToUser(id, {{ $user->id }}, {{ $department->id }}, {{ $formMaster->id }}, {{ $mainDocument->id }}, {{ $subDocument->id }}, 'VIEW_REJECTED_DOC');" <?= $VIEW_REJECTED_DOC_PERMISSION_STATUS != null ? 'checked' : 'none' ?>> View Rejected Docs
                                                </div>

                                                <div class="col-md-3">
                                                    <input type="checkbox" id="checkbox-id-{{ $user->id }}-{{ $department->id }}-{{ $formMaster->id }}-{{ $mainDocument->id }}-{{ $subDocument->id }}-VIEW_ARCHIVE_DOC" onchange="js:assignRoleToUser(id, {{ $user->id }}, {{ $department->id }}, {{ $formMaster->id }}, {{ $mainDocument->id }}, {{ $subDocument->id }}, 'VIEW_ARCHIVE_DOC');" <?= $VIEW_ARCHIVE_DOC_PERMISSION_STATUS != null ? 'checked' : 'none' ?>> View Archive Docs <br>
                                                    <input type="checkbox" id="checkbox-id-{{ $user->id }}-{{ $department->id }}-{{ $formMaster->id }}-{{ $mainDocument->id }}-{{ $subDocument->id }}-CAPA_STATUS" onchange="js:assignRoleToUser(id, {{ $user->id }}, {{ $department->id }}, {{ $formMaster->id }}, {{ $mainDocument->id }}, {{ $subDocument->id }}, 'CAPA_STATUS');" <?= $CAPA_STATUS_PERMISSION_STATUS != null ? 'checked' : 'none' ?>> View CAPA Status
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <br>
                                @endforeach
                            </div>
                            <br><br>
                        </div>
                        @if ($masterDocumentsCount == 0)
                            <style>
                                .masterForm-<?= $department->id ?>-<?= $formMaster->id ?>{
                                    display: none;
                                }

                            </style>
                        @endif
                    @endforeach
                </div>
                <br><br>
            @endforeach

            <style>
                label {
                    font-size: 1.2em;
                }

            </style>

            <script>
                function assignRoleToUser(checkbox_id, user_id, department_id, form_id, main_document_id, sub_document_id, action) {
                    if($("#"+checkbox_id).prop("checked") == true)
                    {
                        $.get('{{ url('admin/user_document_permissions/set_document_action') }}',{
                            'user_id':user_id,
                            'department_id':department_id,
                            'form_id':form_id,
                            'main_document_id':main_document_id,
                            'sub_document_id':sub_document_id,
                            'permission_type':action,
                        },function(response) {
                            console.log(response);
                        });
                    }else{
                        $.get('{{ url('admin/user_document_permissions/unset_document_action') }}',{
                            'user_id':user_id,
                            'department_id':department_id,
                            'form_id':form_id,
                            'main_document_id':main_document_id,
                            'sub_document_id':sub_document_id,
                            'permission_type':action,
                        },function(response) {
                            console.log(response);
                        });
                    }
                }

                function toggleDepartmentSlide(id) {
                    $("#department-" + id).slideToggle();
                }

                function toggleFormMasterSlide(id) {
                    $("#form-master-" + id).slideToggle();
                }

                function checked_all(checkbox_id, user_id, department_id, form_id, main_document_id, sub_document_id, action) {
                    if($("#"+checkbox_id).prop("checked") == true)
                    {
                        $("#curd-" + checkbox_id).prop('checked', true);
                        $("#view_active-" + checkbox_id).prop('checked', true);
                        $("#view_rejected-" + checkbox_id).prop('checked', true);
                        $("#view_archive-" + checkbox_id).prop('checked', true);
                        $("#view_pending-" + checkbox_id).prop('checked', true);
                        $("#view_deactivate-" + checkbox_id).prop('checked', true);
                        $("#capa_status-" + checkbox_id).prop('checked', true);
                    }else{
                        $("#curd-" + checkbox_id).prop('checked', false);
                        $("#view_active-" + checkbox_id).prop('checked', false);
                        $("#view_rejected-" + checkbox_id).prop('checked', false);
                        $("#view_archive-" + checkbox_id).prop('checked', false);
                        $("#view_pending-" + checkbox_id).prop('checked', false);
                        $("#view_deactivate-" + checkbox_id).prop('checked', false);
                        $("#capa_status-" + checkbox_id).prop('checked', false);
                    }
                    $.get('{{ url('admin/user_document_permissions/set_all_action') }}',{
                            'user_id':user_id,
                            'department_id':department_id,
                            'form_id':form_id,
                            'main_document_id':main_document_id,
                            'sub_document_id':sub_document_id,
                            'permission_type':action,
                        },function(response) {
                            console.log(response);
                        });
                }
            </script>
@endsection
