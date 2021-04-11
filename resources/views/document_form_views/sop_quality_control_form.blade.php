@extends('./layouts/formview_layout',
[
'title' => 'CAPA',
]
)

@section('main_container')
    <?php $documentData = $dataSet->document_details; ?>
    <x-document-view-header-component documentNumber='{{ $dataSet->document_number }}'
        createdDate='{{ $dataSet->created_date }}' versionNo='{{ $dataSet->version_number }}'
        capaNumber='{{ $dataSet->capa_number }}' revisionDate='{{ $dataSet->revision_date }}'
        preparedBy='{{ $dataSet->prepared_by }}' approvedBy='{{ $dataSet->approved_by }}'
        location='{{ $dataSet->fetchLocation($dataSet->location_id) }}'
        department='{{ $dataSet->fetchDepartment($dataSet->department_id) }}'
        mainDocumentId='{{ $dataSet->fetchMainDocumentTitle($dataSet->main_document_id) }}'
        subDocumentId='{{ $dataSet->fetctSubDocumentTitle($dataSet->sub_document_id) }}' />
    <br>
    <div>
        <label for="objective">Objective</label>
        <input type="text" name="objective" class="form-control" disabled>
    </div>
    <br>

    <label for="chemical_required_qc">Chemical Required</label>
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
        <tbody id="chemical_required_qc">
            <tr>
                <td><input type="text" class="form-control" name="chemical_name[]" id="chemical_name" disabled></td>
                <td><input type="text" class="form-control" name="chemical_make[]" id="make" disabled></td>
                <td><input type="text" class="form-control" name="chemical_grade_purity[]" id="grade_purity" disabled></td>
                <td><input type="text" class="form-control" name="chemical_quantity[]" id="quantity" disabled></td>
                <td><input type="text" class="form-control" name="chemical_unit[]" id="unit" disabled></td>
            </tr>
        </tbody>
    </table>
    <br>

    <label for="apparatus_required">Apparatus Required</label>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>make</th>
                <th>model</th>
            </tr>
        </thead>
        <tbody id="apparatus_required">
            <tr>
                <td><input type="text" class="form-control" name="apparatus_name[]" id="name" disabled></td>
                <td><input type="text" class="form-control" name="apparatus_make[]" id="make" disabled></td>
                <td><input type="text" class="form-control" name="apparatus_model[]" id="model" disabled></td>
            </tr>
        </tbody>
    </table>
    <br>

    <label for="pre_testing ">Pre Testing</label>
    <textarea name="pre_testing" class="form-control" disabled>{{ $documentData['pre_testing'] }}</textarea>

    <label for="testing">Testing</label>
    <textarea name="testing" class="form-control" disabled>{{ $documentData['testing'] }}</textarea>

    <br>
    <label for="name_of_reference_document">Name Of Reference Document</label>
    <table class="table table-bordered">
        <tbody id="name_of_reference_document_qc">
            <tr>
                <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
                <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
                <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
            </tr>
        </tbody>
    </table>
    <br>
    <label for="reference_document_urls">Reference Documents</label>
    <input type="file" name="reference_document_urls" class="form-control" disabled>
@endsection
