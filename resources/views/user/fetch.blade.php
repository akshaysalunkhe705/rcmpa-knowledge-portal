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
                    <button class="btn btn-warning" data-toggle="modal" data-target="#change-password-{{ $user->id }}">Change Password</button> |
                    <a class="btn btn-danger" href="{{ url('admin/user/remove') }}/{{ $user->id }}">Delete</a>
                </th>
            </tr>
            <div class="modal fade" id="change-password-{{ $user->id }}" tabindex="-1" role="dialog"
                aria-labelledby="change-password-{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="change-password-{{ $user->id }}">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="password" class="form-control" name="password-{{ $user->id }}" id="password-{{ $user->id }}" placeholder="Enter New Password">
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary" onclick="js:changePassword({{ $user->id }});">Change Password</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

        function changePassword(user_id)
        {
            var password = $("#password-"+user_id).val();
            $.get('{{ url('admin/user/change_password') }}/'+user_id+'/'+password,{},function(response) {
                alert("Successfully Change Password");
            });
        }

    </script>
@endsection
