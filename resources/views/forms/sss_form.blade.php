@foreach ($sssDataset as $dataSet)
<?php
$documentData = $dataSet->document_details;
?>
    <form action="{{ url('hod/capa_actions/sss') }}/{{ $dataSet->id }}" method="post">
        <input type="hidden" name="document_id" value="{{ $dataSet->id }}">
        @csrf
        <div style="border:1px solid; padding:1%;">
            <x-document-form-header-component documentNumber='{{ $dataSet->document_number }}'
                createdDate='{{ $dataSet->created_date }}' versionNo='{{ $dataSet->version_number }}'
                capaNumber='{{ $dataSet->capa_number }}' revisionDate='{{ $dataSet->revision_date }}'
                preparedBy='{{ $dataSet->prepared_by }}' approvedBy='{{ $dataSet->approved_by }}'
                location='{{ $dataSet->fetchLocation($dataSet->location_id) }}' department='{{ $dataSet->fetchDepartment($dataSet->department_id) }}'
                mainDocumentId='{{ $dataSet->fetchMainDocumentTitle($dataSet->main_document_id) }}'
                subDocumentId='{{ $dataSet->fetctSubDocumentTitle($dataSet->sub_document_id) }}' />
        </div>
        <br>
        <label for="">Client Name</label>
        <input type="text" name="client_name" id="client_name" class="form-control" value="{{ $documentData != null ? $documentData['client_name'] : '' }}">
        <br>
        <button class="btn btn-primary" onclick="js:add_sss_parameters();">+</button>
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
                            <input type="text" name="parameter[]" id="parameter[]" class="form-control" value="{{ $documentData != null ? $documentData['identification']['parameter'][$i] : '' }}">
                        </td>
                        <td>
                            <input type="text" name="specification[]" id="specification[]" class="form-control" value="{{ $documentData != null ? $documentData['identification']['specification'][$i] : '' }}">
                        </td>
                        <td>
                            <select name="units[]" id="units" class="form-control">
                                <option value="{{ isset($documentData['identification']['units'][$i]) ? $documentData['identification']['units'][$i] : '' }}">{{ isset($documentData['identification']['units'][$i]) ? $documentData['identification']['units'][$i] : '' }}</option>
                                @foreach ($unitDataset as $unit)
                                    <option value="{{ $unit }}">{{ $unit }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" name="units[]" id="units[]" class="form-control" value="{{ $documentData != null ? $documentData['identification']['units'][$i] : '' }}"> --}}
                        </td>
                        <td>
                            <input type="text" name="remark[]" id="remark[]" class="form-control" value="{{ $documentData != null ? $documentData['identification']['remark'][$i] : '' }}">
                        </td>
                    </tr>
                    @endfor
                @endif
            </tbody>
        </table>

        <hr>
        <div style="border:1px solid; padding:1%;">
            <x-document-form-footer-component status='{{ $dataSet->status }}'
                statusByAdmin='{{ $dataSet->status_by_admin }}'
                statusBySuperAdmin='{{ $dataSet->status_by_super_admin }}'
                rejectNote='{{ $dataSet->reject_note }}' removedNote='{{ $dataSet->removed_note }}' />
        </div>
        <br>
        <input type="submit" name="SAVE" class="btn btn-primary" value="SAVE">
        <input type="submit" name="SUBMIT" class="btn btn-primary" value="SUBMIT">
    </form>

    <script>
        
    function add_sss_parameters() {
        event.preventDefault();
        $("#sss_parameters").after(`
            <tr>
                <td>
                    <input type="text" name="parameter[]" id="parameter" class="form-control">
                </td>
                <td>
                    <input type="text" name="specification[]" id="specification" class="form-control">
                </td>
                <td>
                    <select name="units[]" id="units" class="form-control">
                        @foreach ($unitDataset as $unit)
                            <option value="{{ $unit }}">{{ $unit }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" name="remark[]" id="remark" class="form-control">
                </td>
            </tr>
        `);
        return false;
    }
    </script>
@endforeach
