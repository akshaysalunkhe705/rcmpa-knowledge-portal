@extends('./layouts/layout',
[
'title' => 'Location',
'heading' => 'Location',
'breadcrumb1' => 'Location',
'breadcrumb2' => 'index',
'nav_status' => 'general-master',
'sub_nav_status' => 'location-index',
]
)

@section('main_container')
    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif

    <form action="{{ url('admin/general_master/location/add') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="location_name" id="" class="form-control" placeholder="Location Name">
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
            <th>Location</th>
            <th>Action</th>
        </tr>
        @foreach ($locationDataset as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td><input type="text" name="" id="location-{{ $item->id }}" class="form-control"
                        value="{{ $item->location_name }}"></td>
                <td><button class="btn" onclick="edit({{ $item->id }});">Edit</button></td>
            </tr>
        @endforeach
    </table>

    <script>
        function edit(id)
        {
            var location = $("#location-" + id).val();
            $.get('{{ url('admin/general_master/location/edit') }}/' + id, {
                'location_name': location
            }, function(response) {
                console.log(response);
                alert("Location Edited Successfully");
            });
        }
    </script>
@endsection
