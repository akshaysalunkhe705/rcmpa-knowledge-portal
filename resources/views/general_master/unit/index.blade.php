@extends('./layouts/layout',
[
'title' => 'Unit',
'heading' => 'Unit',
'breadcrumb1' => 'Unit',
'breadcrumb2' => 'index',
'nav_status' => 'general-master',
'sub_nav_status' => 'unit-index',
]
)

@section('main_container')

    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif

    <form action="{{ url('admin/general_master/units/add') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="unit_name" id="" class="form-control" placeholder="Unit Name">
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
            <th>Unit</th>
            <th>Action</th>
        </tr>
        @foreach ($units as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td><input type="text" name="" id="unit-{{ $item->id }}" class="form-control"
                        value="{{ $item->unit_name }}"></td>
                <td><button class="btn" onclick="edit({{ $item->id }});">Edit</button></td>
            </tr>
        @endforeach
    </table>

    <script>
        function edit(id) {
            var unit = $("#unit-" + id).val();
            $.get('http://localhost:8000/admin/general_master/units/edit/' + id, {
                'unit_name': unit
            }, function(response) {
                console.log(response);
                alert("Unit Edited Successfully");
            });
        }

    </script>
@endsection
