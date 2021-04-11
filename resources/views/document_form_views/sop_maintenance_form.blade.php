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
    <label for="purpose">Purpose</label>
    <textarea name="purpose" id="purpose" class="form-control" disabled>{{ $documentData['purpose'] }}</textarea>
    <br>
    <label for="scope">scope</label>
    <textarea name="scope" id="scope" class="form-control" disabled>{{ $documentData['scope'] }}</textarea>
    <br>
    <label for="responsibility">responsibility</label>
    <textarea name="responsibility" id="responsibility" class="form-control"
        disabled>{{ $documentData['responsibility'] }}</textarea>
    <br>
    <label for="accountability">accountability</label>
    <textarea name="accountability" id="accountability" class="form-control"
        disabled>{{ $documentData['accountability'] }}</textarea>
    <br>
    <label for="defination">defination</label>
    <textarea name="defination" id="defination" class="form-control"
        disabled>{{ $documentData['defination'] }}</textarea>
    <br>
    <label for="procedures">procedures</label>
    <textarea name="procedures" id="procedures" class="form-control"
        disabled>{{ $documentData['procedures'] }}</textarea>
    <br>
    <label for="precautions">precautions</label>
    <textarea name="precautions" id="precautions" class="form-control"
        disabled>{{ $documentData['precautions'] }}</textarea>
    <br>
    <label for="applicable_formats_reference">applicable_formats_reference</label>
    <textarea name="applicable_formats_reference" id="applicable_formats_reference" class="form-control"
        disabled>{{ $documentData['applicable_formats_reference'] }}</textarea>
    <br>
    <label for="abbrevations">abbrevations</label>
    <textarea name="abbrevations" id="abbrevations" class="form-control"
        disabled>{{ $documentData['abbrevations'] }}</textarea>
    <br>
    <label for="document_history">document_history</label>
    <textarea name="document_history" id="document_history" class="form-control"
        disabled>{{ $documentData['document_history'] }}</textarea>
    <br>
    <label for="reference_document_urls">reference_document</label>
    <input type="file" name="reference_document_urls" class="form-control" disabled>

    <br>
    <label for="name_of_reference_document">Name Of Reference Document</label>
    <table class="table table-bordered">
        <tbody id="name_of_reference_document_sopM">
            @if ($documentData != null)
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
                <input type="text" name="name_of_reference_document[]" class="form-control" value="{{ $item }}"
                    disabled>
            </td>
            @endforeach
            </tr>
            @endif
        </tbody>
    </table>
    <br>

@endsection
