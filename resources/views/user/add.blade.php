@extends('./layouts/layout',
[
'title' => 'User',
'heading' => 'User',
'breadcrumb1' => 'user',
'breadcrumb2' => 'add',
'nav_status' => 'user',
'sub_nav_status' => 'user-add',
]
)

@section('main_container')
    @if (isset($alert))
        <div class="alert alert-success">
            {{ alert }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br><br>
    <form action="{{ url('admin/user/add') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label for="department">Department</label>
                <select name="department" id="department" class="form-control" onchange="js:createUsername();">
                    @if (!empty($departments))
                        @foreach ($departments as $department)
                            <option value="{{ $department->department_name }}">{{ $department->department_name }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-4">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" onchange="js:createUsername();">
                    @if (!empty($roles))
                        @foreach ($roles as $role)
                            <option value="{{ $role->role_name }}">{{ $role->role_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-4">
                <label for="navigation_type">Navigation Type</label>
                <select name="navigation_type" id="navigation_type" class="form-control">
                    <option value="USER">USER</option>
                    <option value="HOD">HOD</option>
                    <option value="ADMIN">ADMIN</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                    onkeyup="js:createUsername();">
            </div>
            <div class="col-md-6">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" readonly>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="col-md-6">
                <br>
                <input type="submit" class="btn btn-success btn-block" value="Submit">
            </div>
        </div>
    </form>

    <script>
        function createUsername() {
            var department = $("#department").val();
            var role = $("#role").val();
            var name = $("#name").val();
            // department.slice(0,2)
            $("#username").val(department + "-" + role + "-" + name.split(" ")[0].toUpperCase());
        }

    </script>
@endsection
