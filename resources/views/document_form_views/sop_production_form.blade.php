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
        <?= $documentData != null ? $documentData['objective'] : '' ?>
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
                        <td><?= isset($documentData['chemical_required']['checmical_name'][$i]) ? $documentData['chemical_required']['checmical_name'][$i] : '' ?></td>
                        <td><?= isset($documentData['chemical_required']['chemical_make'][$i]) ? $documentData['chemical_required']['chemical_make'][$i] : '' ?></td>
                        <td><?= isset($documentData['chemical_required']['chemical_grade_purity'][$i]) ? $documentData['chemical_required']['chemical_grade_purity'][$i] : '' ?></td>
                        <td><?= isset($documentData['chemical_required']['chemical_quantity'][$i]) ? $documentData['chemical_required']['chemical_quantity'][$i] : '' ?></td>
                        <td><?= isset($documentData['chemical_required']['chemical_unit'][$i]) ? $documentData['chemical_required']['chemical_unit'][$i] : '' ?></td>
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
                        <td><?= isset($documentData['equipement_required']['equipement_name'][$i]) ? $documentData['equipement_required']['equipement_name'][$i] : ''  ?></td>
                        <td><?= isset($documentData['equipement_required']['equipement_location_mark_and_number'][$i]) ? $documentData['equipement_required']['equipement_location_mark_and_number'][$i] : ''  ?></td>
                        <td><?= isset($documentData['equipement_required']['equipement_capacity'][$i]) ? $documentData['equipement_required']['equipement_capacity'][$i] : ''  ?></td>
                        <td><?= isset($documentData['equipement_required']['equipement_unit'][$i]) ? $documentData['equipement_required']['equipement_unit'][$i] : ''  ?></td>
                    </tr>
                @endfor
            @endif
        </tbody>
    </table>

    <br>
    <label for="pre_production_process">Pre Production Process</label>
    <?= isset($documentData['pre_production_process']) ? $documentData['pre_production_process'] : ''  ?>

    <label for="production_process">Production Process</label>
    <?= isset($documentData['production_process']) ? $documentData['production_process'] : ''  ?>

    <label for="post_production_process">Post Production Process</label>
    <?= isset($documentData['post_production_process']) ? $documentData['post_production_process'] : ''  ?>

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
                <?= $item ?>
            </td>
    @endforeach
    </tr>
    @endif
</tbody>
</table>


@endsection
