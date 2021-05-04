@extends('./layouts/layout',
[
'title' => 'Document Status',
'heading' => 'Document Status',
'breadcrumb1' => 'Document Status',
'breadcrumb2' => 'Pending For Action',
'nav_status' => 'pending-for-action',
'sub_nav_status' => 'document_status-pending-for-action',
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
                <th>For?</th>
                <th>ACTIONS</th>
            </tr>
        </thead>

        @foreach ($document_dataset as $item)
            <tr>
                <td>{{ $item->capa_number }}</td>
                <td>{{ $item->version_number }}</td>
                <td>{{ $item->fetchLocation($item->location_id) }} / {{ $item->fetchDepartment($item->department_id) }}
                </td>
                <td>{{ $item->fetchForm($item->form_id) }}</td>
                <td>{{ $item->fetchMainDocumentTitle($item->main_document_id) }}</td>
                <td>{{ $item->fetctSubDocumentTitle($item->sub_document_id) }}</td>
                <td>{{ $item->capa_action }}</td>
                <td>
                    {{-- <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#rejectNote-{{ $item->id }}">Reject Note</button>
                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#removeNote-{{ $item->id }}">Remove Note</button>
                    <br><br> --}}
                    <a style="width: 20%;" href="{{ url('hod/document_views/view_form_document') }}/{{ $item->id }}"
                        class="btn btn-info">View</a>
                    <a style="width: 25%;"
                        href="{{ url('admin/document_pending_for_action/approve') }}/{{ $item->id }}"
                        class="btn btn-success">Approve</a>
                    <a style="width: 20%;"
                        href="{{ url('admin/document_pending_for_action/reject') }}/{{ $item->id }}"
                        class="btn btn-warning">Reject</a>
                    <a style="width: 25%;"
                        href="{{ url('admin/document_pending_for_action/remove') }}/{{ $item->id }}"
                        class="btn btn-danger">Remove</a>
                </td>
            </tr>

            {{-- <div class="modal fade" id="rejectNote-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="removeNote-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div> --}}
        @endforeach
    </table>
@endsection
