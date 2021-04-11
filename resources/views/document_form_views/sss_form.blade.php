@extends('./layouts/formview_layout',
[
'title' => 'CAPA',
]
)

@section('main_container')
    <?php $documentData = $dataSet->document_details; ?>
    <input type="hidden" name="document_id" value="{{ $dataSet->id }}">
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
    <br>
    <label for="">Client Name</label>
    <input type="text" name="client_name" id="client_name" class="form-control" value="{{ $dataSet->client_name }}">
    <br>
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
                            <input type="text" name="parameter[]" id="parameter[]" class="form-control"
                                value="{{ $documentData['identification']['parameter'][$i] }}" disabled>
                        </td>
                        <td>
                            <input type="text" name="specification[]" id="specification[]" class="form-control"
                                value="{{ $documentData['identification']['specification'][$i] }}" disabled>
                        </td>
                        <td>
                            <input type="text" name="units[]" id="units[]" class="form-control"
                                value="{{ $documentData['identification']['units'][$i] }}" disabled>
                        </td>
                        <td>
                            <input type="text" name="remark[]" id="remark[]" class="form-control"
                                value="{{ $documentData['identification']['remark'][$i] }}" disabled>
                        </td>
                    </tr>
                @endfor
            @endif
            <tr>
                <td>
                    <input type="text" name="parameter[]" id="parameter" class="form-control" disabled>
                </td>
                <td>
                    <input type="text" name="specification[]" id="specification" class="form-control" disabled>
                </td>
                <td>
                    <input type="text" name="units[]" id="units" class="form-control" disabled>
                </td>
                <td>
                    <input type="text" name="remark[]" id="remark" class="form-control" disabled>
                </td>
            </tr>
        </tbody>
    </table>

@endsection
