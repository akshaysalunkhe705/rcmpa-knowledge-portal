@extends('./layouts/layout',
[
'title' => 'document',
'heading' => 'Main Document Name',
'breadcrumb1' => 'document',
'breadcrumb2' => 'index',
'nav_status' => 'general-master',
'sub_nav_status' => 'maindocumentname-index',
]
)
<?php
use App\Models\DepartmentModel;
use App\Models\FormsModel;
?>

@section('main_container')
    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif


    <form action="{{ url('admin/general_master/main_document_title/add') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <select name="department_id" id="department_id" class="form-control">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="form_id" id="form_id" class="form-control">
                    @foreach ($form as $form_master)
                        <option value="{{ $form_master->id }}">{{ $form_master->form_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" name="main_document_title" id="document" class="form-control"
                    placeholder="Main Document Title">
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
            <th>Department</th>
            <th>Main Document Name</th>
            <th>Action</th>
        </tr>
        @foreach ($mainDocumentTitleModel as $item)
            <input type="hidden" value="{{ $item->department_id }}" id="department_id-{{ $item->id }}">
            <input type="hidden" value="{{ $item->form_id }}" id="form_id-{{ $item->id }}">
            <?php $department = DepartmentModel::find($item->department_id); ?>
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $department->department_name }}</td>
                <td><input type="text" name="" id="document-{{ $item->id }}" class="form-control"
                        value="{{ $item->main_document_title }}"></td>
                <td><button class="btn" onclick="edit({{ $item->id }})">Edit</button></td>
            </tr>
        @endforeach
    </table>

    <script>
        function edit(id) {
            var document = $("#document-" + id).val();
            var department_id = $("#department_id-" + id).val();
            var form_id = $("#form_id-" + id).val();
            $.get('{{ url('admin/general_master/main_document_title/edit') }}/' + id, {
                'main_document_title': document,
                'department_id': department_id,
                'form_id': form_id
            }, function(response) {
                console.log(response);
                alert("Main Document Edited Successfully");

            });
        }
    </script>
@endsection
