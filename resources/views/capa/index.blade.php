@extends('./layouts/layout',
[
'title' => 'CAPA',
'heading' => 'CAPA',
'breadcrumb1' => 'CAPA',
'breadcrumb2' => $action,
'nav_status' => 'document_action',
'sub_nav_status' => 'document_action-'.$action,
]
)

<?php
use App\Models\MainDocumentTitleModel;
use App\Models\SubDocumentTitleModel;
?>

@section('main_container')

    <style>
        .selected-forms {
            visibility: hidden;
        }

    </style>

    <div class="row">
        <div class="col-md-4">
            <label for="capa_number"> Enter CAPA Number </label>
            <input type="text" name="capa_number" id="capa_number" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="location"> Location </label>
            <select name="location" id="location" class="form-control" ><!-- onchange="js:fetchDepartment();" -->
                <option value="">Select Location</option>
                @foreach ($locationModel as $item)
                    <option value="{{ $item->id }}">{{ $item->location_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="department"> Department </label>
            <input type="text" name="department" id="department" class="form-control" value="{{ Auth::user()->department }}">
            {{-- <select name="department" id="department" class="form-control">
                <option value="">Select Department</option>
            </select> --}}
        </div>
    </div>

    <br>
    <br>

    <div class="border p-3 bg-white">
        <h4>Select Forms</h4>
        <div class="row">
            @foreach ($formModel as $item)
                <div class="col-md-4">
                    <input type="checkbox" id="{{ $item->id }}" value="{{ $item->form_name }}"
                        onchange="js:showSelectedFormDocument(id)"> {{ $item->form_name }} <br><br>
                </div>
            @endforeach
        </div>
    </div>

    <br><br>

    <div class="border p-3 bg-white">
        <div class="row">
            <?php $i = 1; ?>
            @foreach ($formModel as $form)
                <div class="col-md-4 p-3 selected-forms" id="selected-form-{{ $form->id }}">
                    <h4>{{ $form->form_name }}</h4>
                    <?php $mainDocumentTitleModel = MainDocumentTitleModel::where('form_id', $form->id)
                    ->whereIn('id', array_column(json_decode($documentAccessListIds, true), 'main_document_id'))
                    ->get(); ?>
                    <select name="main_document_name-{{ $form->id }}" id="main_document_name-{{ $i }}"
                        class="form-control" onchange="js:fetchSubDocumentTitle({{ $i }});">
                        <option value="">Select Document Name</option>
                        @foreach ($mainDocumentTitleModel as $document)
                            <option value="{{ $document->id }}">{{ $document->main_document_title }}</option>
                        @endforeach
                    </select>
                    <br>
                    <?php $subDocumentNameModel = SubDocumentTitleModel::where('form_id', $form->id)
                    ->whereIn('id', array_column(json_decode($documentAccessListIds, true), 'sub_document_id'))
                    ->get(); ?>
                    <select name="sub_document_name-{{ $form->id }}" id="sub_document_name-{{ $i }}"
                        class="form-control">
                        <option value="">Select Sub Document Name</option>
                    </select>
                </div>
                <?php $i++; ?>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-block" onclick="js:nextPage('{{ $action }}');"> Next </button>
            </div>
        </div>
    </div>

    <script>
        function fetchDepartment() {
            $.get('{{ url('admin/general_master/fetch_department_from_location') }}', {
                    location_id: $("#location").val()
                },
                function(response) {
                    console.log(response);
                    $("#department").html(response);
                });
        }

        function fetchSubDocumentTitle(id) {
            $.get('{{ url('admin/general_master/fetch_sub_document_title') }}', {
                    main_document_id: $("#main_document_name-" + id).val()
                },
                function(response) {
                    console.log(response);
                    $("#sub_document_name-" + id).html(response);
                });
        }

        function nextPage(action) {
            if ($("#capa_number").val() == "") {
                alert("Enter CAPA Number");
                return false;
            }
            if ($("#location").val() == "") {
                alert("Select Location");
                return false;
            }
            if ($("#department").val() == "") {
                alert("Select Department");
                return false;
            }

            $.get("{{ url('hod/capa/store_capa') }}/" + action, {
                "capa_number": $("#capa_number").val(),
                "location": $("#location").val(),
                "department": $("#department").val(),

                "process_main_document": $("#main_document_name-1").val(),
                "process_sub_document": $("#sub_document_name-1").val(),

                "sop_production_main_document": $("#main_document_name-2").val(),
                "sop_production_sub_document": $("#sub_document_name-2").val(),

                "sop_qc_main_document": $("#main_document_name-3").val(),
                "sop_qc_sub_document": $("#sub_document_name-3").val(),

                "sop_maintenance_main_document": $("#main_document_name-4").val(),
                "sop_maintenance_sub_document": $("#sub_document_name-4").val(),

                "msds_main_document": $("#main_document_name-5").val(),
                "msds_sub_document": $("#sub_document_name-5").val(),

                "sss_main_document": $("#main_document_name-6").val(),
                "sss_sub_document": $("#sub_document_name-6").val(),
            }, function(response) {
                console.log(response);
                var capa_number = $("#capa_number").val();
                if (response) {
                    if (action == "create") {
                        location.href = "{{ url('/hod/capa/set/create') }}/" + capa_number;
                    }
                    if (action == "update") {
                        location.href = "{{ url('/hod/capa/set/update') }}/" + capa_number;
                    }
                    if (action == "roll_back") {
                        location.href = "{{ url('/hod/capa/set/roll_back') }}/" + capa_number +'/'+ response.process_sub_document +
                            '/' + response.sop_maintenance_sub_document + '/' + response
                            .sop_production_sub_document + '/' + response.sop_qc_sub_document + '/' + response
                            .msds_sub_document + '/' + response.sss_sub_document;
                    }
                    if (action == "deactivate") {
                        location.href = "{{ url('/hod/capa/set/deactivate') }}/" + capa_number +'/'+ response.process_sub_document +
                            '/' + response.sop_maintenance_sub_document + '/' + response
                            .sop_production_sub_document + '/' + response.sop_qc_sub_document + '/' + response
                            .msds_sub_document + '/' + response.sss_sub_document;
                    }
                    if (action == "reactivate") {
                        location.href = "{{ url('/hod/capa/set/reactivate') }}/" + capa_number +'/'+ response.process_sub_document +
                            '/' + response.sop_maintenance_sub_document + '/' + response
                            .sop_production_sub_document + '/' + response.sop_qc_sub_document + '/' + response
                            .msds_sub_document + '/' + response.sss_sub_document;
                    }
                }
            });
        }

        function showSelectedFormDocument(id) {
            $("#selected-form-" + id).css('visibility', 'visible');
        }

    </script>
@endsection
