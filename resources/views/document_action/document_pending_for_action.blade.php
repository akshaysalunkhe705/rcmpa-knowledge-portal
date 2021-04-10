@extends('./layouts/layout',
[
'title' => 'Document Status',
'heading' => 'Document Status',
'breadcrumb1' => 'Document Status',
'breadcrumb2' => 'Removed Document',
'nav_status' => 'document_status',
'sub_nav_status' => 'document_status-removed',
]
)

@section('main_container')
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>CAPA No</th>
                <th>Version</th>
                <th>Location/Department</th>
                <th>Form</th>
                <th>Master Document Title</th>
                <th>Sub Document Title</th>
                <th>Action</th>
            </tr>
        </thead>

        @foreach ($document_dataset as $item)
            <tr>
                <td>{{ $item->capa_number }}</td>
                <td>{{ $item->version_number }}</td>
                <td>{{ $item->fetchLocation($item->location_id) }} / {{ $item->fetchDepartment($item->department_id) }}</td>
                <td>{{ $item->fetchForm($item->form_id) }}</td>
                <td>{{ $item->fetchMainDocumentTitle($item->main_document_id) }}</td>
                <td>{{ $item->fetctSubDocumentTitle($item->sub_document_id) }}</td>
                <td>
                    <a style="width: 20%;" href="{{ url('admin/document_pending_for_action/view') }}/{{ $item->id }}" class="btn btn-info">View</a>
                    <a style="width: 25%;" href="{{ url('admin/document_pending_for_action/approve') }}/{{ $item->id }}" class="btn btn-success">Approve</a>
                    <a style="width: 20%;" href="{{ url('admin/document_pending_for_action/reject') }}/{{ $item->id }}" class="btn btn-warning">Reject</a>
                    <a style="width: 25%;" href="{{ url('admin/document_pending_for_action/remove') }}/{{ $item->id }}" class="btn btn-danger">Remove</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
