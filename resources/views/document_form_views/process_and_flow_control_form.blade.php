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
        <input type="text" name="objective" class="form-control" value="<?= $documentData['objective'] ?>" disabled>
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
            <td> <?= $item ?> </td>
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
                <?= $item ?>
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
                            <?= $documentData['process_description']['description'][$i] ?>
                        </td>
                        <td>
                            <?= $documentData['process_description']['unit'][$i] ?>
                        </td>
                        <td>
                            <?= $documentData['process_description']['designation_responsibility'][$i] ?>
                        </td>
                        <td>
                            <?= $documentData['process_description']['document_in_use'][$i] ?>
                        </td>
                        <td>
                            <?= $documentData['process_description']['spacial_remarks'][$i] ?>
                        </td>
                    </tr>
                @endfor
            @endif
        </tbody>
    </table>
    
    <br>
    
    <label for="download_docs">Download Reference Documents</label>
    <br>
    @for ($i = 0; $i < count($documentData['reference_document_urls']); $i++)
        <a href="{{ url($documentData['reference_document_urls'][$i]) }}">Downloads</a> <br>
    @endfor
    <br>
@endsection
