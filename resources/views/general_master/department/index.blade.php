@extends('./layouts/layout',
[
'title' => 'Department',
'heading' => 'Department',
'breadcrumb1' => 'Department',
'breadcrumb2' => 'index',
'nav_status' => 'general-master',
'sub_nav_status' => 'department-index',
]
)
<?php use App\Models\LocationModel; ?>
@section('main_container')


    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif


    <form action="{{ url('admin/general_master/department/add') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <select name="location_id" id="location_id" class="form-control">
                    @foreach ($locations as $item)
                        <option value="{{ $item->id }}">{{ $item->location_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" name="department_name" id="department_name" class="form-control"
                    placeholder="Department Name">
            </div>
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
            <th>Location</th>
            <th>Department</th>
            <th>Action</th>
        </tr>
        @foreach ($departments as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    <?php $locationName = LocationModel::find($item->location_id); ?>
                    {{ $locationName->location_name }}
                    <input type="hidden" id="location_id-{{ $item->id }}" value="{{ $item->location_id }}">
                </td>
                <td><input type="text" name="" id="department-{{ $item->id }}" class="form-control"
                        value="{{ $item->department_name }}"></td>
                <td><button class="btn" onclick="edit({{ $item->id }});">Edit</button></td>
            </tr>
        @endforeach
    </table>

    <script>
        function edit(id) {
            var location_id = $("#location_id-" + id).val();
            var department = $("#department-" + id).val();
            $.get('{{ url('admin/general_master/department/edit') }}/' + id, {
                'location_id': location_id,
                'department_name': department,
            }, function(response) {
                console.log(response);
                alert("Department Edited Successfully");
            });
        }

    </script>
@endsection
