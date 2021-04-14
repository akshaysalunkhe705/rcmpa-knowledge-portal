@foreach ($sopProductionDataset as $dataSet)
    <?php $documentData = $dataSet->document_details; ?>
    <form action="{{ url('hod/capa_actions/sop_production') }}/{{ $dataSet->id }}" method="post">
        <input type="hidden" name="document_id" value="{{ $dataSet->id }}">
        @csrf
        <div style="border:1px solid; padding:1%;">
            <x-document-form-header-component documentNumber='{{ $dataSet->document_number }}'
                createdDate='{{ $dataSet->created_date }}' versionNo='{{ $dataSet->version_number }}'
                capaNumber='{{ $dataSet->capa_number }}' revisionDate='{{ $dataSet->revision_date }}'
                preparedBy='{{ $dataSet->prepared_by }}' approvedBy='{{ $dataSet->approved_by }}'
                location='{{ $dataSet->fetchLocation($dataSet->location_id) }}'
                department='{{ $dataSet->fetchDepartment($dataSet->department_id) }}'
                mainDocumentId='{{ $dataSet->fetchMainDocumentTitle($dataSet->main_document_id) }}'
                subDocumentId='{{ $dataSet->fetctSubDocumentTitle($dataSet->sub_document_id) }}' />
        </div>

        <div>
            <label for="objective">Objective</label>
            <input type="text" name="objective" class="form-control" value="{{ $documentData != null ? $documentData['objective'] : '' }}">
        </div>

        <br>
        <label for="chemical_required">Chemical Required</label>
        <button class="btn btn-primary" onclick="js:add_chemical_required_pr();">+</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Chemical Name</th>
                    <th>Make</th>
                    <th>Grade Purity</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                </tr>
            </thead>
            <tbody id="chemical_required_PR">
                {{-- <tr>
                    <td><input class="form-control" type="text" name="chemical_name[]" id="chemical_name"></td>
                    <td><input class="form-control" type="text" name="chemical_make[]" id="make"></td>
                    <td><input class="form-control" type="text" name="chemical_grade_purity[]" id="grade_purity"></td>
                    <td><input class="form-control" type="text" name="chemical_quantity[]" id="quantity"></td>
                    <td><input class="form-control" type="text" name="chemical_unit[]" id="unit"></td>
                </tr> --}}
            </tbody>
        </table>
        <br>
        <label for="equipment_required">Equipment Required</label><button class="btn btn-primary"
            onclick="js:add_equipment_required_pr();">+</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location Mark And Number</th>
                    <th>Capacity</th>
                    <th>Unit</th>
                </tr>
            </thead>
            <tbody id="equipment_required_PR">
                {{-- <tr>
                    <td><input class="form-control" type="text" name="equipement_name[]" id="name"></td>
                    <td><input class="form-control" type="text" name="equipement_location_mark_and_number[]"
                            id="location_mark_and_number"></td>
                    <td><input class="form-control" type="text" name="equipement_capacity[]" id="capacity"></td>
                    <td><input class="form-control" type="text" name="equipement_unit[]" id="unit"></td>
                </tr> --}}
            </tbody>
        </table>
        <br>

        <label for="pre_production_process">Pre Production Process</label>
        <input type="text" name="pre_production_process" class="form-control">

        <label for="production_process">Production Process</label>
        <input type="text" name="production_process" class="form-control">

        <label for="post_production_process">Post Production Process</label>
        <input type="text" name="post_production_process" class="form-control">

        <label for="reference_document_urls">Reference Document Urls</label>
        <input type="text" name="reference_document_urls" class="form-control">

        <br>
        <label for="name_of_reference_document">Name Of Reference Document</label><button class="btn btn-primary"
            onclick="js:add_name_of_reference_document();">+</button>
        <table class="table table-bordered">
            <tbody id="name_of_reference_document_sop_PR">
                @if (isset($documentData['name_of_reference_document']))
                    <tr>
                        <?php $i = 0; ?>
                        @foreach ($documentData['name_of_reference_document'] as $item)
                            @if ($i % 3 == 0)
                                <?php $i = 0; ?>
                    </tr>
                    <tr>
                @endif
                <?php $i++; ?>
                <td>
                    <input type="text" name="name_of_reference_document[]" class="form-control"
                        value="{{ $item }}">
                </td>
@endforeach
</tr>
@endif
{{-- <tr>
    <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
    <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
    <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
</tr> --}}
</tbody>
</table>

<label for="reference_document_urls">Reference Document Upload</label>
<input type="file" name="reference_document_urls" class="form-control" multiple>
<br>

<hr>
<div style="border:1px solid; padding:1%;">
    <x-document-form-footer-component status='{{ $dataSet->status }}'
        statusByAdmin='{{ $dataSet->status_by_admin }}' statusBySuperAdmin='{{ $dataSet->status_by_super_admin }}'
        rejectNote='{{ $dataSet->reject_note }}' removedNote='{{ $dataSet->removed_note }}' />
</div>
<br>
<input type="submit" name="SAVE" class="btn btn-primary" value="SAVE">
<input type="submit" name="SUBMIT" class="btn btn-primary" value="SUBMIT">
</form>
<script>
    function add_chemical_required_pr() {
        event.preventDefault();
        $("#chemical_required_PR").after(`
            <tr>
                <td><input class="form-control" type="text" name="chemical_name[]" id="chemical_name"></td>
                <td><input class="form-control" type="text" name="make[]" id="make"></td>
                <td><input class="form-control" type="text" name="grade_purity[]" id="grade_purity"></td>
                <td><input class="form-control" type="text" name="quantity[]" id="quantity"></td>
                <td><input class="form-control" type="text" name="unit[]" id="unit"></td>
            </tr>`);
        return false;
    }

    function add_equipment_required_pr() {
        event.preventDefault();
        $("#equipment_required_PR").after(`
            <tr>
                <td><input class="form-control" type="text" name="equipement_name[]" id="name"></td>
                <td><input class="form-control" type="text" name="equipement_location_mark_and_number[]" id="location_mark_and_number"></td>
                <td><input class="form-control" type="text" name="equipement_capacity[]" id="capacity"></td>
                <td><input class="form-control" type="text" name="equipement_unit[]" id="unit"></td>
            </tr>`);
        return false;
    }

    function add_name_of_reference_document() {
        event.preventDefault();
        $("#name_of_reference_document_sop_PR").after(`
            <tr>
                <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
                <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
                <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
            </tr>`);
        return false;
    }

</script>

<script>
    CKEDITOR.replace('pre_production_process', {});
    CKEDITOR.replace('production_process', {});
    CKEDITOR.replace('post_production_process', {});

</script>

@endforeach
