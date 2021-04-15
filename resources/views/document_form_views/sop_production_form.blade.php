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
    <div>
        <label for="objective">Objective</label>
        <input type="text" name="objective" class="form-control" value="{{ $documentData != null ? $documentData['objective'] : '' }}" disabled>
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
            @if ($documentData != null)
                @for ($i = 0; $i < count($documentData['chemical_required']['checmical_name']); $i++)
                    <tr>
                        <td><input class="form-control" type="text" name="chemical_name[]" id="chemical_name" value="{{ isset($documentData['chemical_required']['checmical_name'][$i]) ? $documentData['chemical_required']['checmical_name'][$i] : '' }}" disabled></td>
                        <td><input class="form-control" type="text" name="chemical_make[]" id="make"  value="{{ isset($documentData['chemical_required']['chemical_make'][$i]) ? $documentData['chemical_required']['chemical_make'][$i] : '' }}" disabled></td>
                        <td><input class="form-control" type="text" name="chemical_grade_purity[]" id="grade_purity" value="{{ isset($documentData['chemical_required']['chemical_grade_purity'][$i]) ? $documentData['chemical_required']['chemical_grade_purity'][$i] : '' }}" disabled></td>
                        <td><input class="form-control" type="text" name="chemical_quantity[]" id="quantity" value="{{ isset($documentData['chemical_required']['chemical_quantity'][$i]) ? $documentData['chemical_required']['chemical_quantity'][$i] : '' }}" disabled></td>
                        <td><input class="form-control" type="text" name="chemical_unit[]" id="unit" value="{{ isset($documentData['chemical_required']['chemical_unit'][$i]) ? $documentData['chemical_required']['chemical_unit'][$i] : '' }}" disabled></td>
                    </tr>
                @endfor
            @endif
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
            @if ($documentData != null)
                @for ($i = 0; $i < count($documentData['equipement_required']['equipement_name']); $i++)
                    <tr>
                        <td><input class="form-control" type="text" name="equipement_name[]" id="name" value="{{ isset($documentData['equipement_required']['equipement_name'][$i]) ? $documentData['equipement_required']['equipement_name'][$i] : ''  }}" disabled></td>
                        <td><input class="form-control" type="text" name="equipement_location_mark_and_number[]" id="location_mark_and_number" value="{{ isset($documentData['equipement_required']['equipement_location_mark_and_number'][$i]) ? $documentData['equipement_required']['equipement_location_mark_and_number'][$i] : ''  }}" disabled></td>
                        <td><input class="form-control" type="text" name="equipement_capacity[]" id="capacity" value="{{ isset($documentData['equipement_required']['equipement_capacity'][$i]) ? $documentData['equipement_required']['equipement_capacity'][$i] : ''  }}" disabled></td>
                        <td><input class="form-control" type="text" name="equipement_unit[]" id="unit" value="{{ isset($documentData['equipement_required']['equipement_unit'][$i]) ? $documentData['equipement_required']['equipement_unit'][$i] : ''  }}" disabled></td>
                    </tr>
                @endfor
            @endif
        </tbody>
    </table>

    <br>
    <label for="pre_production_process">Pre Production Process</label>
    <textarea name="pre_production_process" id="pre_production_process" class="form-control" disabled> {{ isset($documentData['pre_production_process']) ? $documentData['pre_production_process'] : ''  }} </textarea>

    <label for="production_process">Production Process</label>
    <textarea name="production_process" id="production_process" class="form-control" disabled> {{ isset($documentData['production_process']) ? $documentData['production_process'] : ''  }} </textarea>

    <label for="post_production_process">Post Production Process</label>
    <textarea name="post_production_process" id="post_production_process" class="form-control" disabled> {{ isset($documentData['post_production_process']) ? $documentData['post_production_process'] : ''  }} </textarea>

    <br>
    <label for="name_of_reference_document">Name Of Reference Document</label>
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
                <input type="text" name="name_of_reference_document[]" class="form-control" value="{{ $item }}" disabled>
            </td>
    @endforeach
    </tr>
    @endif
</tbody>
</table>


@endsection
