@extends('./layouts/formview_layout',
[
'title' => 'CAPA',
]
)

@section('main_container')
    <?php $documentData = $dataSet->document_details; ?>
        <input type="hidden" name="document_id" value="{{ $dataSet->id }}">
        @csrf
        <div style="border:1px solid; padding:1%;">
            <x-document-view-header-component documentNumber='{{ $dataSet->document_number }}'
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
            <input type="text" name="objective" class="form-control" disabled>
        </div>

        <br>
        <label for="chemical_required">Chemical Required</label>
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
                <tr>
                    <td><input class="form-control" type="text" name="chemical_name[]" id="chemical_name" disabled></td>
                    <td><input class="form-control" type="text" name="chemical_make[]" id="make" disabled></td>
                    <td><input class="form-control" type="text" name="chemical_grade_purity[]" id="grade_purity" disabled></td>
                    <td><input class="form-control" type="text" name="chemical_quantity[]" id="quantity" disabled></td>
                    <td><input class="form-control" type="text" name="chemical_unit[]" id="unit" disabled></td>
                </tr>
            </tbody>
        </table>
        <br>
        <label for="equipment_required">Equipment Required</label>
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
                <tr>
                    <td><input class="form-control" type="text" name="equipement_name[]" id="name" disabled></td>
                    <td><input class="form-control" type="text" name="equipement_location_mark_and_number[]" id="location_mark_and_number" disabled></td>
                    <td><input class="form-control" type="text" name="equipement_capacity[]" id="capacity" disabled></td>
                    <td><input class="form-control" type="text" name="equipement_unit[]" id="unit" disabled></td>
                </tr>
            </tbody>
        </table>
        <br>

        <label for="pre_production_process">Pre Production Process</label>
        <input type="text" name="pre_production_process" class="form-control" disabled>

        <label for="production_process">Production Process</label>
        <input type="text" name="production_process" class="form-control" disabled>

        <label for="post_production_process">Post Production Process</label>
        <input type="text" name="post_production_process" class="form-control" disabled>

        <label for="reference_document_urls">Reference Document Urls</label>
        <input type="text" name="reference_document_urls" class="form-control" disabled>

        <br>
        <label for="name_of_reference_document">Name Of Reference Document</label>
        <table class="table table-bordered">
            <tbody id="name_of_reference_document_sop_PR">
                @if ($documentData['name_of_reference_document'] != null)
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
                                        value="{{ $item }}" disabled>
                                </td>
                        @endforeach
                    </tr>
                @endif
            </tbody>
        </table>

<label for="reference_document_urls">Reference Document Upload</label>
<input type="file" name="reference_document_urls" class="form-control" multiple>
<br>

@endsection