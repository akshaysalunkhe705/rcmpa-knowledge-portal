@extends('./layouts/layout',
[
'title' => 'Document View',
'heading' => 'Document View',
'breadcrumb1' => 'Document View',
'breadcrumb2' => 'Archived Document',
'nav_status' => 'document_view',
'sub_nav_status' => 'document_view-archived',
]
)

@section('main_container')

<table class="table">
    <tr>
        <th>CAPA No</th>
        <th>Version</th>
        <th>Location/Department</th>
        <th>Form</th>
        <th>Master Document Title</th>
        <th>Sub Document Title</th>
        <th>Action</th>
    </tr>

    @foreach ($document_dataset as $item)
        <tr>
            <td>{{ $item->capa_number }}</td>
            <td>{{ $item->version_number }}</td>
            <td>{{ $item->fetchLocation($item->location_id) }} / {{ $item->fetchDepartment($item->department_id) }}</td>
            <td>{{ $item->fetchForm($item->form_id) }}</td>
            <td>{{ $item->fetchMainDocumentTitle($item->main_document_id) }}</td>
            <td>{{ $item->fetctSubDocumentTitle($item->sub_document_id) }}</td>
            <td>
                <a href="{{ url('hod/document_views/view_form_document/') }}/{{ $item->id }}" class="btn">View</a> | 
                <a href="{{ url('hod/document_views/view_form_document/') }}/{{ $item->id }}" class="btn">Reactivate</a>
            </td>
        </tr>
    @endforeach
</table>

@endsection