@foreach ($sopProductionDataset as $dataSet)
    <?php $documentData = $dataSet->document_details; ?>
    <form action="{{ url('hod/capa_actions/sop_production') }}/{{ $dataSet->id }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="document_id" value="{{ $dataSet->id }}">
        @csrf
        <div style="border:1px solid; padding:1%;">
            <x-document-form-header-component documentNumber='{{ $dataSet->document_number }}'
                createdDate='{{ $dataSet->created_date }}' versionNo='{{ $dataSet->version_number }}'
                capaNumber='{{ $dataSet->capa_number }}' revisionDate='{{ $dataSet->revision_date }}'
                preparedBy='{{ $dataSet->prepared_by }}' approvedBy='{{ $dataSet->approved_by }}'
                location='{{ $dataSet->fetchLocation($dataSet->location_id) }}'
                department='{{ $dataSet->fetchDepartment($dataSet->department_id) }}'
                mainDocumentId='{{ $dataSet->fetchMainDocumentTitle($dataSet->main_document_id) }}'
                subDocumentId='{{ $dataSet->fetctSubDocumentTitle($dataSet->sub_document_id) }}' />
        </div>

        <div>
            <label for="objective">Objective</label>
            <input type="text" name="objective" class="form-control" value="{{ $documentData != null ? $documentData['objective'] : '' }}">
        </div>

        <br>
        <label for="chemical_required">Chemical Required</label>
        <button class="btn btn-primary" onclick="js:add_chemical_required_pr();">+</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Chemical Name</th>
                    <th>Make</th>
                    <th>Grade Purity</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                </tr>
            </thead>
            <tbody id="chemical_required_PR">
                @if ($documentData['chemical_required']['checmical_name'] != null)
                    @for ($i = 0; $i < count($documentData['chemical_required']['checmical_name']); $i++)
                        <tr>
                            <td><input class="form-control" type="text" name="chemical_name[]" id="chemical_name" value="{{ isset($documentData['chemical_required']['checmical_name'][$i]) ? $documentData['chemical_required']['checmical_name'][$i] : '' }}"></td>
                            <td><input class="form-control" type="text" name="chemical_make[]" id="make"  value="{{ isset($documentData['chemical_required']['chemical_make'][$i]) ? $documentData['chemical_required']['chemical_make'][$i] : '' }}"></td>
                            <td><input class="form-control" type="text" name="chemical_grade_purity[]" id="grade_purity" value="{{ isset($documentData['chemical_required']['chemical_grade_purity'][$i]) ? $documentData['chemical_required']['chemical_grade_purity'][$i] : '' }}"></td>
                            <td><input class="form-control" type="text" name="chemical_quantity[]" id="quantity" value="{{ isset($documentData['chemical_required']['chemical_quantity'][$i]) ? $documentData['chemical_required']['chemical_quantity'][$i] : '' }}"></td>
                            <td>
                                <select name="chemical_unit[]" id="units" class="form-control">
                                    <option value="{{ isset($documentData['chemical_required']['chemical_unit'][$i]) ? $documentData['chemical_required']['chemical_unit'][$i] : '' }}">{{ isset($documentData['chemical_required']['chemical_unit'][$i]) ? $documentData['chemical_required']['chemical_unit'][$i] : '' }}</option>
                                    @foreach ($unitDataset as $unit)
                                        <option value="{{ $unit->unit_name }}">{{ $unit->unit_name }}</option>
                                    @endforeach
                                </select>
                                {{-- <input class="form-control" type="text" name="chemical_unit[]" id="unit" value="{{ isset($documentData['chemical_required']['chemical_unit'][$i]) ? $documentData['chemical_required']['chemical_unit'][$i] : '' }}"></td> --}}
                        </tr>
                    @endfor
                @endif
            </tbody>
        </table>
        <br>
        <label for="equipment_required">Equipment Required</label><button class="btn btn-primary"
            onclick="js:add_equipment_required_pr();">+</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location Mark And Number</th>
                    <th>Capacity</th>
                    <th>Unit</th>
                </tr>
            </thead>
            <tbody id="equipment_required_PR">
                @if ($documentData['equipement_required']['equipement_name'] != null)
                    @for ($i = 0; $i < count($documentData['equipement_required']['equipement_name']); $i++)
                        <tr>
                            <td><input class="form-control" type="text" name="equipement_name[]" id="name" value="{{ isset($documentData['equipement_required']['equipement_name'][$i]) ? $documentData['equipement_required']['equipement_name'][$i] : ''  }}"></td>
                            <td><input class="form-control" type="text" name="equipement_location_mark_and_number[]" id="location_mark_and_number" value="{{ isset($documentData['equipement_required']['equipement_location_mark_and_number'][$i]) ? $documentData['equipement_required']['equipement_location_mark_and_number'][$i] : ''  }}"></td>
                            <td><input class="form-control" type="text" name="equipement_capacity[]" id="capacity" value="{{ isset($documentData['equipement_required']['equipement_capacity'][$i]) ? $documentData['equipement_required']['equipement_capacity'][$i] : ''  }}"></td>
                            <td>
                                <select name="equipement_unit[]" id="units" class="form-control">
                                    <option value="{{ isset($documentData['equipement_required']['equipement_unit'][$i]) ? $documentData['equipement_required']['equipement_unit'][$i] : '' }}">{{ isset($documentData['chemical_required']['chemical_unit'][$i]) ? $documentData['chemical_required']['chemical_unit'][$i] : '' }}</option>
                                    @foreach ($unitDataset as $unit)
                                        <option value="{{ $unit->unit_name }}">{{ $unit->unit_name }}</option>
                                    @endforeach
                                </select>
                                {{-- <input class="form-control" type="text" name="equipement_unit[]" id="unit" value="{{ isset($documentData['equipement_required']['equipement_unit'][$i]) ? $documentData['equipement_required']['equipement_unit'][$i] : ''  }}"></td> --}}
                        </tr>
                    @endfor
                @endif
            </tbody>
        </table>
        <br>

        <label for="pre_production_process">Pre Production Process</label>
        <textarea name="pre_production_process" id="pre_production_process" class="form-control"> {{ isset($documentData['pre_production_process']) ? $documentData['pre_production_process'] : ''  }} </textarea>

        <label for="production_process">Production Process</label>
        <textarea name="production_process" id="production_process" class="form-control"> {{ isset($documentData['production_process']) ? $documentData['production_process'] : ''  }} </textarea>

        <label for="post_production_process">Post Production Process</label>
        <textarea name="post_production_process" id="post_production_process" class="form-control"> {{ isset($documentData['post_production_process']) ? $documentData['post_production_process'] : ''  }} </textarea>

        <br>
        <label for="name_of_reference_document">Name Of Reference Document</label><button class="btn btn-primary" onclick="js:add_name_of_reference_document_pr();">+</button>
        <table class="table table-bordered">
            <tbody id="name_of_reference_document_sop_PR">
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

<div class="row">
    <div class="col-md-3">
        <label for="reference_document_urls">Reference Document Upload</label>
        <input type="file" name="sop_production_reference_document_urls[]" class="form-control" multiple>
    </div>
</div>
@if ($documentData['reference_document_urls'] != null)
    @foreach ($documentData['reference_document_urls'] as $item)
        <a href="{{ url($item)}}">{{ $item }}</a><br>
    @endforeach
@endif

<hr>
<div style="border:1px solid; padding:1%;">
    <x-document-form-footer-component status='{{ $dataSet->status }}'
        statusByAdmin='{{ $dataSet->status_by_admin }}' statusBySuperAdmin='{{ $dataSet->status_by_super_admin }}'
        rejectNote='{{ $dataSet->reject_note }}' removedNote='{{ $dataSet->removed_note }}' />
</div>
<br>
<input type="submit" name="SAVE" class="btn btn-primary" value="SAVE">
<input type="submit" name="SUBMIT" class="btn btn-primary" value="SUBMIT">
</form>
<script>
    function add_chemical_required_pr() {
        event.preventDefault();
        $("#chemical_required_PR").append(`
            <tr>
                <td><input class="form-control" type="text" name="chemical_name[]" id="chemical_name"></td>
                <td><input class="form-control" type="text" name="make[]" id="make"></td>
                <td><input class="form-control" type="text" name="grade_purity[]" id="grade_purity"></td>
                <td><input class="form-control" type="text" name="quantity[]" id="quantity"></td>
                <td>
                    <select name="chemical_unit[]" id="units" class="form-control">
                        @foreach ($unitDataset as $unit)
                            <option value="{{ $unit->unit_name }}">{{ $unit->unit_name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>`);
        return false;
    }

    function add_equipment_required_pr() {
        event.preventDefault();
        $("#equipment_required_PR").append(`
            <tr>
                <td><input class="form-control" type="text" name="equipement_name[]" id="name"></td>
                <td><input class="form-control" type="text" name="equipement_location_mark_and_number[]" id="location_mark_and_number"></td>
                <td><input class="form-control" type="text" name="equipement_capacity[]" id="capacity"></td>
                <td>
                    <select name="equipement_unit[]" id="units" class="form-control">
                        @foreach ($unitDataset as $unit)
                            <option value="{{ $unit->unit_name }}">{{ $unit->unit_name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>`);
        return false;
    }

    function add_name_of_reference_document_pr() {
        event.preventDefault();
        $("#name_of_reference_document_sop_PR").append(`
            <tr>
                <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
                <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
                <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
            </tr>`);
        return false;
    }

</script>

<script>
    CKEDITOR.replace('pre_production_process', {});
    CKEDITOR.replace('production_process', {});
    CKEDITOR.replace('post_production_process', {});

</script>

@endforeach
