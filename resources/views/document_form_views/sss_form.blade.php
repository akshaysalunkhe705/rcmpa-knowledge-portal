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
    <label for="">Client Name</label>
    @if (Auth::user()->department == 'SALES')
        <?= isset($documentData['client_name']) ? $documentData['client_name'] : '' ?>
        <br>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Parameter</th>
                <th>Specification</th>
                <th>Units</th>
                <th>Remark</th>
            </tr>
        </thead>
        <tbody id="sss_parameters">
            @if ($documentData != null)
                @for ($i = 0; $i < count($documentData['identification']['parameter']); $i++)
                    <tr>
                        <td>
                            <?= isset($documentData['identification']['parameter'][$i]) ? $documentData['client_name'] : ''  ?>
                        </td>
                        <td>
                            <?= isset($documentData['identification']['specification'][$i]) ? $documentData['client_name'] : ''  ?>
                        </td>
                        <td>
                            <?= isset($documentData['identification']['units'][$i]) ? $documentData['client_name'] : ''  ?>
                        </td>
                        <td>
                            <?= isset($documentData['identification']['remark'][$i]) ? $documentData['client_name'] : ''  ?>
                        </td>
                    </tr>
                @endfor
            @endif
        </tbody>
    </table>

@endsection
