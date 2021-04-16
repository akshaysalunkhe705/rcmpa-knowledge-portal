@foreach ($processDataset as $dataSet)
<?php
$documentData = $dataSet->document_details;
?>
    <form action="{{ url('hod/capa_actions/process_and_flow_control/') }}/{{ $dataSet->id }}" method="post">
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
        <hr>
        <div>
            <label for="objective">Objective</label>
            <input type="text" name="objective" class="form-control" value="{{ $documentData != null ? $documentData['objective'] : '' }}">
        </div>
        <br>

        <label for="department_and_thirdparty_involvement">Department And Thirdparty Involvement </label>
        <button class="btn btn-primary" onclick="js:add_department_and_thirdparty_involvement();">+</button>
        <table class="table table-bordered">
            <tbody id="department_and_thirdparty_involvement_tr">
                @if ($documentData != null)
                    <tr>
                        <?php $i=0; ?>
                        @foreach ($documentData['department_and_third_party_involvement'] as $item)
                            @if(($i % 3) == 0)
                                <?php $i=0; ?>
                                </tr><tr>
                            @endif
                            <?php $i++ ?>
                            <td>
                                <input type="text" name="department_and_third_party_involvement[]"
                                    id="department_and_third_party_involvement" class="form-control"
                                    value="{{ $item }}">
                            </td>
                        @endforeach
                    </tr>
                @endif
            </tbody>
        </table>
        <br>
        <label for="list_of_documnet_involved">List Of Document Involved</label>
        <button class="btn btn-primary" onclick="js:add_list_of_documnet_involved();">+</button>
        <table class="table table-bordered">
            <tbody id="list_of_documnet_involved">
                @if ($documentData != null)
                    <tr>
                        <?php $i=0; ?>
                        @foreach ($documentData['list_of_document_involved'] as $item)
                            @if(($i % 3) == 0)
                                <?php $i=0; ?>
                                </tr><tr>
                            @endif
                            <?php $i++ ?>
                            <td>
                                <input type="text" name="list_of_document_involved[]" id="list_of_document_involved"
                                    class="form-control" value="{{ $item }}">
                            </td>
                    @endforeach
                </tr>
                @endif
            </tbody>
        </table>
        <br>
        <label for="process_description">Process Description</label>
        <button class="btn btn-primary" onclick="js:add_process_description();">+</button>
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
                                <input type="text" name="process_description[]" id="process_description"
                                    class="form-control" value="{{ $documentData['process_description']['description'][$i] }}">
                            </td>
                            <td>
                                <select name="units[]" id="units" class="form-control">
                                    <option value="{{ $documentData['process_description']['unit'][$i] }}">{{ $documentData['process_description']['unit'][$i] }}</option>
                                    @foreach ($unitsDataset as $unit)
                                        <option value="{{ $unit->unit_name }}">{{ $unit->unit_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="desgination_responsible[]" id="desgination_responsible"
                                    class="form-control"
                                    value="{{ $documentData['process_description']['designation_responsibility'][$i] }}">
                            </td>
                            <td>
                                <input type="text" name="document_in_use[]" id="document_in_use" class="form-control"
                                    value="{{ $documentData['process_description']['document_in_use'][$i] }}">
                            </td>
                            <td>
                                <input type="text" name="special_remarks[]" id="special_remarks" class="form-control"
                                    value="{{ $documentData['process_description']['spacial_remarks'][$i] }}">
                            </td>
                        </tr>
                    @endfor
                @endif
            </tbody>
        </table>
        <br>
        <label for="name_of_reference_document">Name Of Reference Document</label> <button class="btn btn-primary" onclick="js:add_name_of_reference_document_proc();">+</button>
        <table class="table table-bordered">
            <tbody id="name_of_reference_document_proc">
                @if (isset($documentData['name_of_reference_document']))
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
                        <input type="text" name="name_of_reference_document[]" class="form-control"
                            value="{{ $item }}">
                    </td>
                @endforeach
                </tr>
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

        <br>
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
    <br>
    <hr>
    <br>
@endforeach

<script>
    

    function add_name_of_reference_document_proc() {
        event.preventDefault();
        $("#name_of_reference_document_proc").after(`
        <tr>
            <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
            <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
            <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
        </tr>
        `);
        return false;
    }

    function add_department_and_thirdparty_involvement() {
        event.preventDefault();
        $("#department_and_thirdparty_involvement_tr").after(`
            <tr>
                <td>
                    <input type="text" name="department_and_third_party_involvement[]" id="department_and_third_party_involvement" class="form-control">
                </td>
                <td>
                    <input type="text" name="department_and_third_party_involvement[]" id="department_and_third_party_involvement" class="form-control">
                </td>
                <td>
                    <input type="text" name="department_and_third_party_involvement[]" id="department_and_third_party_involvement" class="form-control">
                </td>
            </tr>
        `);
        return false;
    }

    function add_list_of_documnet_involved() {
        event.preventDefault();
        $("#list_of_documnet_involved").after(`
            <tr>
                <td>
                    <input type="text" name="list_of_document_involved[]" id="list_of_document_involved"class="form-control">
                </td>
                <td>
                    <input type="text" name="list_of_document_involved[]" id="list_of_document_involved" class="form-control">
                </td>
                <td>
                    <input type="text" name="list_of_document_involved[]" id="list_of_document_involved" class="form-control">
                </td>
            </tr>
        `);
        return false;
    }

    function add_process_description() {
        event.preventDefault();
        $("#process_description").after(`
            <tr>
                <td><input type="text" name="process_description[]" id="process_description" class="form-control"></td>
                <td>
                    <select name="units[]" id="units" class="form-control">
                        @foreach ($unitDataset as $unit)
                            <option value="{{ $unit->unit_name }}">{{ $unit->unit_name }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="text" name="desgination_responsible[]" id="desgination_responsible" class="form-control"></td>
                <td><input type="text" name="document_in_use[]" id="document_in_use" class="form-control"></td>
                <td><input type="text" name="special_remarks[]" id="special_remarks" class="form-control"></td>
            </tr>
        `);
        return false;
    }

</script>
