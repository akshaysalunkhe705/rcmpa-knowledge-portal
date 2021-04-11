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
    <hr>
    <div>
        <label for="objective">Objective</label>
        <input type="text" name="objective" class="form-control" value="{{ $documentData['objective'] }}" disabled>
    </div>
    <br>

    <label for="department_and_thirdparty_involvement">Department And Thirdparty Involvement </label>
    <table class="table table-bordered">
        <tbody id="department_and_thirdparty_involvement_tr">
            @if ($documentData != null)
                <tr>
                    <?php $i = 0; ?>
                    @foreach ($documentData['department_and_third_party_involvement'] as $item)
                        @if ($i % 3 == 0)
                            <?php $i = 0; ?>
                </tr>
                <tr>
            @endif
            <?php $i++; ?>
            <td>
                <input type="text" name="department_and_third_party_involvement[]"
                    id="department_and_third_party_involvement" class="form-control" value="{{ $item }}" disabled>
            </td>
            @endforeach
            </tr>
            @endif
        </tbody>
    </table>
    <br>
    <label for="list_of_documnet_involved">List Of Document Involved</label>
    <table class="table table-bordered">
        <tbody id="list_of_documnet_involved">
            @if ($documentData != null)
                <tr>
                    <?php $i = 0; ?>
                    @foreach ($documentData['list_of_document_involved'] as $item)
                        @if ($i % 3 == 0)
                            <?php $i = 0; ?>
                </tr>
                <tr>
            @endif
            <?php $i++; ?>
            <td>
                <input type="text" name="list_of_document_involved[]" id="list_of_document_involved" class="form-control"
                    value="{{ $item }}" disabled>
            </td>
            @endforeach
            </tr>
            @endif
        </tbody>
    </table>
    <br>
    <label for="process_description">Process Description</label>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>desciption</th>
                <th>Units</th>
                <th>Desgination Responsible</th>
                <th>Document In Use</th>
                <th>Special Remarks</th>
            </tr>
        </thead>
        <tbody id="process_description">
            @if ($documentData != null)
                @for ($i = 0; $i < count($documentData['process_description']['description']); $i++)
                    <tr>
                        <td>
                            <input type="text" name="process_description[]" id="process_description" class="form-control"
                                value="{{ $documentData['process_description']['description'][$i] }}" disabled>
                        </td>
                        <td>
                            <input type="text" name="units[]" id="units" class="form-control"
                                value="{{ $documentData['process_description']['unit'][$i] }}" disabled>
                        </td>
                        <td>
                            <input type="text" name="desgination_responsible[]" id="desgination_responsible"
                                class="form-control"
                                value="{{ $documentData['process_description']['designation_responsibility'][$i] }}"
                                disabled>
                        </td>
                        <td>
                            <input type="text" name="document_in_use[]" id="document_in_use" class="form-control"
                                value="{{ $documentData['process_description']['document_in_use'][$i] }}" disabled>
                        </td>
                        <td>
                            <input type="text" name="special_remarks[]" id="special_remarks" class="form-control"
                                value="{{ $documentData['process_description']['spacial_remarks'][$i] }}" disabled>
                        </td>
                    </tr>
                @endfor
            @endif
        </tbody>
    </table>
    <br>
    <div class="row">
        <div class="col-md-3">
            <label for="reference_document_urls">Reference Document Upload</label>
            <input type="file" name="reference_document_urls" class="form-control" multiple>
        </div>
    </div>
@endsection
