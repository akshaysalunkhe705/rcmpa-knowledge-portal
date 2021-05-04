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
        <?= isset($documentData['objective']) ? $documentData['objective'] : '' ?>
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
            @if ($documentData != null)
                @for ($i = 0; $i < count($documentData['apparatus_required']['apparatus_name']); $i++)
                    <tr>
                        <td><?= isset($documentData['apparatus_required']['apparatus_name'][$i]) ? $documentData['apparatus_required']['apparatus_name'][$i] : ''  ?></td>
                        <td><?= isset($documentData['apparatus_required']['apparatus_make'][$i]) ? $documentData['apparatus_required']['apparatus_make'][$i] : ''  ?></td>
                        <td><?= isset($documentData['apparatus_required']['apparatus_model'][$i]) ? $documentData['apparatus_required']['apparatus_model'][$i] : ''  ?></td>
                    </tr>
                @endfor
            @endif
        </tbody>
    </table>
    <br>

    <label for="pre_testing ">Pre Testing</label>
    <?= $documentData['pre_testing'] ?>

    <label for="testing">Testing</label>
    <?= $documentData['testing'] ?>

    <br>
    <label for="name_of_reference_document">Name Of Reference Document</label>
    <table class="table table-bordered">
        <tbody id="name_of_reference_document_qc">
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

    <br>
    
    <label for="download_docs">Download Reference Documents</label>
    <br>
    @if ($documentData['reference_document_urls'] != null)
        @for ($i = 0; $i < count($documentData['reference_document_urls']); $i++)
            <a href="{{ url($documentData['reference_document_urls'][$i]) }}">Downloads</a> <br>
        @endfor
    @endif
    <br>
@endsection
