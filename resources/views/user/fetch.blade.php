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
                                @foreach ($formMasters as $formMaster)
                                    <div class="col-md-6">
                                        <div onclick="js:toggleSlide({{ $user->id }},{{ $formMaster->id }})"
                                            class="border p-1" style="font-weight:bold">
                                            {{ $formMaster->form_name }}
                                        </div>
                                        <div id="form-master-{{ $user->id }}-{{ $formMaster->id }}"
                                            class="form-master border p-1" style="display: none">
                                            <p>
                                                <input type="checkbox" name="" checked disabled> Create/update/Rollback Document |<br>
                                                <input type="checkbox" name="" disabled> View Active Documents |<br>
                                                <input type="checkbox" name="" checked disabled> View Rejected Documents |<br>
                                                <input type="checkbox" name="" checked disabled> View Archived Documents |<br>
                                                <input type="checkbox" name="" checked disabled> View Pending Documents |<br>
                                                <input type="checkbox" name="" disabled> Deactivate Documents |<br>
                                                <input type="checkbox" name="" disabled> View CAPA status |<br>
                                            </p>
                                        </div>
                                        <br>
                                    </div>
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
