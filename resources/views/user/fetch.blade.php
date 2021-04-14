<?php
use App\Models\DocumentModel;
use App\Models\SubDocumentModel;
use App\Models\DepartmentModel;
?>

@extends('./layouts/layout',
[
'title' => 'User',
'heading' => 'User',
'breadcrumb1' => 'user',
'breadcrumb2' => 'list',
'nav_status' => 'user',
'sub_nav_status' => 'user-fetch',
]
)



@section('main_container')
    <table class="table">
        <tr>
            <th>department</th>
            <th>role</th>
            <th>name</th>
            <th>username</th>
            {{-- <th>email</th>
            <th>contact_number</th> --}}
            <th>Set Permissions</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->department }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                {{-- <td>{{ $user->email }}</td> --}}
                <td>
                    <a class="btn btn-info" href="{{ url('admin/user/detail') }}/{{ $user->id }}">Set Permissions</a>
                </td>
                <th>
                    <button class="btn" data-toggle="modal" data-target="#set-permission-{{ $user->id }}">View Permissions</button> | 
                    <a class="btn" href="{{ url('admin/user/remove') }}/{{ $user->id }}">Delete</a></th>
            </tr>
            <div class="modal fade" id="set-permission-{{ $user->id }}" tabindex="-1" role="dialog"
                aria-labelledby="set-permission-{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="set-permission-{{ $user->id }}">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @foreach ($departmentDataset as $department)
        <div onclick="js:toggleDepartmentSlide({{ $department->id }})" class="border p-2 bg-danger"
            style="font-weight:bold;">
            <h4 style="color:white;">{{ $department->department_name }}</h4>
        </div>
        <div id="department-{{ $department->id }}" class=" border p-2" style="background-color:rgb(179, 179, 179)">
            @foreach ($FormsModel as $formModel)
                <?php $masterDocumentsCount = 0; ?>
                <div class="masterForm-{{ $department->id }}-{{ $formModel->id }}">
                    <div onclick="js:toggleformModelSlide({{ $formModel->id }})" class="border p-2 bg-info">
                        <h5>{{ $formModel->form_name }}</h5>
                    </div>
                    <div id="form-master-{{ $formModel->id }}" class="form-master border p-2"
                        style="background-color:white;">
                        <?php $mainDocumentDataset = MainDocumentTitleModel::where('department_id',
                        $department->id)
                        ->where('form_id', $formModel->id)
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
                                ->where('form_id', $formModel->id)
                                ->where('main_document_id', $mainDocument->id)
                                ->where('sub_document_id', $subDocument->id)
                                ->first();
                                $VIEW_ACTIVE_DOC_PERMISSION_STATUS = UserDocumentPermissionModel::where('user_id',
                                $user->id)
                                ->where('permission_type', 'VIEW_ACTIVE_DOC')
                                ->where('department_id', $department->id)
                                ->where('form_id', $formModel->id)
                                ->where('main_document_id', $mainDocument->id)
                                ->where('sub_document_id', $subDocument->id)
                                ->first();
                                $DEACTIVE_REACTIVE_DOC_PERMISSION_STATUS = UserDocumentPermissionModel::where('user_id',
                                $user->id)
                                ->where('permission_type', 'DEACTIVE_REACTIVE_DOC')
                                ->where('department_id', $department->id)
                                ->where('form_id', $formModel->id)
                                ->where('main_document_id', $mainDocument->id)
                                ->where('sub_document_id', $subDocument->id)
                                ->first();
                                $VIEW_PENDING_DOC_PERMISSION_STATUS = UserDocumentPermissionModel::where('user_id',
                                $user->id)
                                ->where('permission_type', 'VIEW_PENDING_DOC')
                                ->where('department_id', $department->id)
                                ->where('form_id', $formModel->id)
                                ->where('main_document_id', $mainDocument->id)
                                ->where('sub_document_id', $subDocument->id)
                                ->first();
                                $VIEW_REJECTED_DOC_PERMISSION_STATUS = UserDocumentPermissionModel::where('user_id',
                                $user->id)
                                ->where('permission_type', 'VIEW_REJECTED_DOC')
                                ->where('department_id', $department->id)
                                ->where('form_id', $formModel->id)
                                ->where('main_document_id', $mainDocument->id)
                                ->where('sub_document_id', $subDocument->id)
                                ->first();
                                $VIEW_ARCHIVE_DOC_PERMISSION_STATUS = UserDocumentPermissionModel::where('user_id',
                                $user->id)
                                ->where('permission_type', 'VIEW_ARCHIVE_DOC')
                                ->where('department_id', $department->id)
                                ->where('form_id', $formModel->id)
                                ->where('main_document_id', $mainDocument->id)
                                ->where('sub_document_id', $subDocument->id)
                                ->first();
                                $CAPA_STATUS_PERMISSION_STATUS = UserDocumentPermissionModel::where('user_id', $user->id)
                                ->where('permission_type', 'CAPA_STATUS')
                                ->where('department_id', $department->id)
                                ->where('form_id', $formModel->id)
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
                                                id="checkbox-id-{{ $user->id }}-{{ $department->id }}-{{ $formModel->id }}-{{ $mainDocument->id }}-{{ $subDocument->id }}-ALL"
                                                onchange="js:checked_all(id, {{ $user->id }}, {{ $department->id }}, {{ $formModel->id }}, {{ $mainDocument->id }}, {{ $subDocument->id }}, 'ALL');">
                                            SELECT ALL <br>
                                            <input type="checkbox"
                                                id="checkbox-id-{{ $user->id }}-{{ $department->id }}-{{ $formModel->id }}-{{ $mainDocument->id }}-{{ $subDocument->id }}-CREATE_UPDATE_ROLLBACK_DOC"
                                                onchange="js:assignRoleToUser(id, {{ $user->id }}, {{ $department->id }}, {{ $formModel->id }}, {{ $mainDocument->id }}, {{ $subDocument->id }}, 'CREATE_UPDATE_ROLLBACK_DOC');" <?= $CREATE_UPDATE_ROLLBACK_DOC_PERMISSION_STATUS != null ? 'checked' : 'none' ?> disabled > Create | Update | Rollback
                                                    </div>

                                                    <div class="col-md-3">
                                                        <input type="checkbox" id="checkbox-id-{{ $user->id }}-{{ $department->id }}-{{ $formModel->id }}-{{ $mainDocument->id }}-{{ $subDocument->id }}-VIEW_ACTIVE_DOC" onchange="js:assignRoleToUser(id, {{ $user->id }}, {{ $department->id }}, {{ $formModel->id }}, {{ $mainDocument->id }}, {{ $subDocument->id }}, 'VIEW_ACTIVE_DOC');" <?= $VIEW_ACTIVE_DOC_PERMISSION_STATUS != null ? 'checked' : 'none' ?> disabled > View Active Docs <br>
                                                        <input type="checkbox" id="checkbox-id-{{ $user->id }}-{{ $department->id }}-{{ $formModel->id }}-{{ $mainDocument->id }}-{{ $subDocument->id }}-DEACTIVE_REACTIVE_DOC" onchange="js:assignRoleToUser(id, {{ $user->id }}, {{ $department->id }}, {{ $formModel->id }}, {{ $mainDocument->id }}, {{ $subDocument->id }}, 'DEACTIVE_REACTIVE_DOC');" <?= $DEACTIVE_REACTIVE_DOC_PERMISSION_STATUS != null ? 'checked' : 'none' ?> disabled > Deactivate | Reactive Docs
                                                    </div>

                                                    <div class="col-md-3">
                                                        <input type="checkbox" id="checkbox-id-{{ $user->id }}-{{ $department->id }}-{{ $formModel->id }}-{{ $mainDocument->id }}-{{ $subDocument->id }}-VIEW_PENDING_DOC" onchange="js:assignRoleToUser(id, {{ $user->id }}, {{ $department->id }}, {{ $formModel->id }}, {{ $mainDocument->id }}, {{ $subDocument->id }}, 'VIEW_PENDING_DOC');" <?= $VIEW_PENDING_DOC_PERMISSION_STATUS != null ? 'checked' : 'none' ?> disabled > View Pending Docs <br>
                                                        <input type="checkbox" id="checkbox-id-{{ $user->id }}-{{ $department->id }}-{{ $formModel->id }}-{{ $mainDocument->id }}-{{ $subDocument->id }}-VIEW_REJECTED_DOC" onchange="js:assignRoleToUser(id, {{ $user->id }}, {{ $department->id }}, {{ $formModel->id }}, {{ $mainDocument->id }}, {{ $subDocument->id }}, 'VIEW_REJECTED_DOC');" <?= $VIEW_REJECTED_DOC_PERMISSION_STATUS != null ? 'checked' : 'none' ?> disabled > View Rejected Docs
                                                    </div>

                                                    <div class="col-md-3">
                                                        <input type="checkbox" id="checkbox-id-{{ $user->id }}-{{ $department->id }}-{{ $formModel->id }}-{{ $mainDocument->id }}-{{ $subDocument->id }}-VIEW_ARCHIVE_DOC" onchange="js:assignRoleToUser(id, {{ $user->id }}, {{ $department->id }}, {{ $formModel->id }}, {{ $mainDocument->id }}, {{ $subDocument->id }}, 'VIEW_ARCHIVE_DOC');" <?= $VIEW_ARCHIVE_DOC_PERMISSION_STATUS != null ? 'checked' : 'none' ?> disabled > View Archive Docs <br>
                                                        <input type="checkbox" id="checkbox-id-{{ $user->id }}-{{ $department->id }}-{{ $formModel->id }}-{{ $mainDocument->id }}-{{ $subDocument->id }}-CAPA_STATUS" onchange="js:assignRoleToUser(id, {{ $user->id }}, {{ $department->id }}, {{ $formModel->id }}, {{ $mainDocument->id }}, {{ $subDocument->id }}, 'CAPA_STATUS');" <?= $CAPA_STATUS_PERMISSION_STATUS != null ? 'checked' : 'none' ?> disabled > View CAPA Status
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
                                    .masterForm-<?= $department->id ?>-<?= $formModel->id ?>{
                                        display: none;
                                    }

                                </style>
                            @endif
                        @endforeach
                    </div>
                    <br><br>
                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </table>

    <style>
        .modal-backdrop.fade.show {
            display: none;
        }

    </style>
    <script>
        function toggleSlide(user_id, id) {
            $("#form-master-" + user_id + "-" + id).slideToggle();
        }

    </script>
@endsection
