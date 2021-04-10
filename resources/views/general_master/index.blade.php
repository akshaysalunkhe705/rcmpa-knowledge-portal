@extends('./layouts/layout',
[
'title' => 'General Master',
'heading' => 'General Master',
'breadcrumb1' => 'general-master',
'breadcrumb2' => 'General Master',
'nav_status' => 'general-master',
'sub_nav_status' => 'department-general-master',
]
)

@section('main_container')

    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif

    <div>
        <div style="box-shadow:0px -4px 5px #aaa; padding:0.6%;" class="bg-primary text-white font-weight-bold">
            ROLE
        </div>
        <div style="box-shadow:0px 4px 5px #aaa; padding:1%; background-color:white;">
            <form action="{{ url('admin/general_master/role/add') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="role_name" id="" class="form-control" placeholder="Role">
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-2">
                        <input type="submit" value="submit" class="btn btn-info">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <br>

    <div>
        <div style="box-shadow:0px -4px 5px #aaa; padding:0.6%;" class="bg-primary text-white font-weight-bold">
            LOCATION
        </div>
        <div style="box-shadow:0px 4px 5px #aaa; padding:1%; background-color:white;">

            <form action="{{ url('admin/general_master/location/add') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="location_name" id="" class="form-control" placeholder="Location">
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-2">
                        <input type="submit" value="submit" class="btn btn-info">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <br>

    <div>
        <div style="box-shadow:0px -4px 5px #aaa; padding:0.6%;" class="bg-primary text-white font-weight-bold">
            DEPARTMENT
        </div>
        <div style="box-shadow:0px 4px 5px #aaa; padding:1%; background-color:white;">

            <form action="{{ url('admin/general_master/department/add') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <select name="location_id" id="" class="form-control">
                            <option value="">Select Location</option>
                            @foreach ($locationModel as $item)
                                <option value="{{ $item->id }}">{{ $item->location_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="department_name" id="" class="form-control" placeholder="Department Name">
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-2">
                        <input type="submit" value="submit" class="btn btn-info">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <br>

    <div>
        <div style="box-shadow:0px -4px 5px #aaa; padding:0.6%;" class="bg-primary text-white font-weight-bold">
            MASTER DOCUMENTS TITLES
        </div>
        <div style="box-shadow:0px 4px 5px #aaa; padding:1%; background-color:white;">

            <form action="{{ url('admin/general_master/main_document_title/add') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <select name="location_id" id="location_id-4" class="form-control" onchange="js:fetchDepartment()">
                            <option value="">Select Location</option>
                            @foreach ($locationModel as $item)
                                <option value="{{ $item->id }}">{{ $item->location_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="form_id" id="form-4" class="form-control" onchange="js:fetchMainDocumentTitle()">
                            <option value="">Select Form</option>
                            @foreach ($formsModel as $item)
                                <option value="{{ $item->id }}">{{ $item->form_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="department_id" id="department_id-4" class="form-control">
                            <option value="">Select Department</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="main_document_title" id="" class="form-control" placeholder="Main Document Name">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" value="submit" class="btn btn-info">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <br>

    <div>
        <div style="box-shadow:0px -4px 5px #aaa; padding:0.6%;" class="bg-primary text-white font-weight-bold">
            SUB DOCUMENTS TITLES
        </div>
        <div style="box-shadow:0px 4px 5px #aaa; padding:1%; background-color:white;">

            <form action="{{ url('admin/general_master/sub_document_title/add') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <select name="department_id" id="department_id-5" class="form-control" onchange="js:fetchMainDocumentTitle()">
                            <option value="">Select Department</option>
                            @foreach ($departmentModel as $item)
                                <option value="{{ $item->id }}">{{ $item->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="form_id" id="form-5" class="form-control" onchange="js:fetchMainDocumentTitle()">
                            <option value="">Select Form</option>
                            @foreach ($formsModel as $item)
                                <option value="{{ $item->id }}">{{ $item->form_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="main_document_id" id="main_document_id-5" class="form-control">
                            <option value="">Select Main Document Title</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="sub_document_title" id="" class="form-control"
                            placeholder="Sub Document Title">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" value="submit" class="btn btn-info">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>

    <div>
        <div style="box-shadow:0px -4px 5px #aaa; padding:0.6%;" class="bg-primary text-white font-weight-bold">
            UNIT
        </div>
        <div style="box-shadow:0px 4px 5px #aaa; padding:1%; background-color:white;">

            <form action="{{ url('admin/general_master/units/add') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="unit_name" id="" class="form-control" placeholder="ADD UNIT">
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-2">
                        <input type="submit" value="submit" class="btn btn-info">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <br>

    <script>
        function fetchMainDocumentTitle()
        {
            $.get('general_master/fetch_main_document_title',
            {
                department_id:$("#department_id-5").val()
            },
            function(response){
                console.log(response);
                $("#main_document_id-5").html(response);
            });
        }

        function fetchDepartment()
        {
            $.get('general_master/fetch_department_from_location',
            {
                location_id:$("#location_id-4").val()
            },
            function(response){
                console.log(response);
                $("#department_id-4").html(response);
            });
        }
    </script>

@endsection
