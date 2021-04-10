@extends('./layouts/layout',
[
'title' => 'Role',
'heading' => 'Role',
'breadcrumb1' => 'Role',
'breadcrumb2' => 'index',
'nav_status' => 'general-master',
'sub_nav_status' => 'role-index',
]
)

@section('main_container')

    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif

    <form action="{{ url('admin/general_master/role/add') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="role_name" id="" class="form-control" placeholder="Role Name">
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <input type="submit" value="submit" class="btn btn-info">
            </div>
        </div>
    </form>
    <br>
    <br>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        @foreach ($roles as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td><input type="text" name="" id="role-{{ $item->id }}" class="form-control"
                        value="{{ $item->role_name }}"></td>
                <td><button class="btn" onclick="edit({{ $item->id }});">Edit</button></td>
            </tr>
        @endforeach
    </table>

    <script>
        function edit(id) {
            var role = $("#role-" + id).val();
            $.get('http://localhost:8000/admin/general_master/role/edit/' + id, {
                'role_name': role
            }, function(response) {
                console.log(response);
                alert("Role Edited Successfully");
            });
        }

    </script>
@endsection
