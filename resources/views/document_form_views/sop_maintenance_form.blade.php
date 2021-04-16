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
    <?= $documentData['purpose'] ?>
    <br>
    <label for="scope">scope</label>
        <?= $documentData['scope'] ?>
    <br>
    <label for="responsibility">responsibility</label>
        <?= $documentData['responsibility'] ?>
    <br>
    <label for="accountability">accountability</label>
        <?= $documentData['accountability'] ?>
    <br>
    <label for="defination">defination</label>
        <?= $documentData['defination'] ?>
    <br>
    <label for="procedures">procedures</label>
        <?= $documentData['procedures'] ?>
    <br>
    <label for="precautions">precautions</label>
        <?= $documentData['precautions'] ?>
    <br>
    <label for="applicable_formats_reference">applicable_formats_reference</label>
        <?= $documentData['applicable_formats_reference'] ?>
    <br>
    <label for="abbrevations">abbrevations</label>
        <?= $documentData['abbrevations'] ?>
    <br>
    <label for="document_history">document_history</label>
        <?= $documentData['document_history'] ?>
    <br>
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
                <?= $item ?>
            </td>
            @endforeach
            </tr>
            @endif
        </tbody>
    </table>
    <br>

@endsection
