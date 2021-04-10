@extends('./layouts/layout',
[
'title' => 'Form Master',
'heading' => 'Form Master',
'breadcrumb1' => 'form_master',
'breadcrumb2' => 'fetch',
'nav_status' => 'general-master',
'sub_nav_status' => 'form_master-index',
]
)

<?php $frommasterCount = count($formMasters); ?>

@section('main_container')

    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif


    <form action="{{ url('admin/general_master/forms/add') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="form_name" id="form_name" class="form-control" placeholder="Form Name">
            </div>
            <div class="col-md-4">
                <select type="checkbox" name="sequence" id="" class="form-control">
                    @for ($i = $frommasterCount + 1; $i >= 1; --$i)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-2">
                <input type="submit" class="btn btn-info btn-block">
            </div>
        </div>
    </form>
    <br>
    <br>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Sequence</th>
            <th>Form Master</th>
            <th>Action</th>
        </tr>
        @foreach ($formMasters as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    <select type="checkbox" name="sequence" id="sequence-{{ $item->id }}" class="form-control">
                        <option value="{{ $item->sequence }}" selected="selected">{{ $item->sequence }}</option>
                        @for ($i = 1; $i <= $frommasterCount; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </td>
                <td><input type="text" name="form_name" id="form_master-{{ $item->id }}" class="form-control"
                        value="{{ $item->form_name }}"></td>
                <td><button class="btn" onclick="edit({{ $item->id }});">Edit</button></td>
            </tr>
        @endforeach
    </table>


    <script>
        function edit(id) {
            var form_master = $("#form_master-" + id).val();
            var sequence = $("#sequence-" + id).val();
            $.get('{{ url('admin/general_master/forms/edit') }}/' + id, {
                'form_name': form_master,
                'sequence': sequence
            }, function(response) {
                console.log(response);
                alert("Form Edited Successfully");

            });
        }

    </script>
@endsection
