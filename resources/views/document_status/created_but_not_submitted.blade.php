@extends('./layouts/layout',
[
'title' => 'Document Status',
'heading' => 'Document Status',
'breadcrumb1' => 'Document Status',
'breadcrumb2' => 'Saved Document',
'nav_status' => 'document_status',
'sub_nav_status' => 'document_status-saved',
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
            <th>For?</th>
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
                <td>{{ $item->capa_action }}</td>
                <td>
                    <a href="{{ url('hod/document_views/view_form_document/') }}/{{ $item->id }}" class="btn">View</a>
                    <a href="{{ url('hod/capa/set/') }}/{{ strtolower($item->capa_action) }}/{{ $item->capa_number }}" class="btn">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
