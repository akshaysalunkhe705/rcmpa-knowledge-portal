@foreach ($sopQualityControlDataset as $dataSet)
    <?php $documentData = $dataSet->document_details; ?>
    <form action="{{ url('hod/capa_actions/sop_quality_control') }}/{{ $dataSet->id }}" method="post">
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
        <br>

        <div>
            <label for="objective">Objective</label>
            <input type="text" name="objective" class="form-control">
        </div>
        <br>

        <label for="chemical_required_qc">Chemical Required</label> <button class="btn btn-primary"
            onclick="js:add_chemical_required();">+</button>
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
            <tbody id="chemical_required_qc">
                {{-- <tr>
                    <td><input type="text" class="form-control" name="chemical_name[]" id="chemical_name"></td>
                    <td><input type="text" class="form-control" name="chemical_make[]" id="make"></td>
                    <td><input type="text" class="form-control" name="chemical_grade_purity[]" id="grade_purity"></td>
                    <td><input type="text" class="form-control" name="chemical_quantity[]" id="quantity"></td>
                    <td><input type="text" class="form-control" name="chemical_unit[]" id="unit"></td>
                </tr> --}}
            </tbody>
        </table>
        <br>

        <label for="apparatus_required">Apparatus Required</label> <button class="btn btn-primary"
            onclick="js:add_apparatus_required();">+</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>make</th>
                    <th>model</th>
                </tr>
            </thead>
            <tbody id="apparatus_required">
                {{-- <tr>
                    <td><input type="text" class="form-control" name="apparatus_name[]" id="name"></td>
                    <td><input type="text" class="form-control" name="apparatus_make[]" id="make"></td>
                    <td><input type="text" class="form-control" name="apparatus_model[]" id="model"></td>
                </tr> --}}
            </tbody>
        </table>
        <br>

        <label for="pre_testing ">Pre Testing</label>
        <textarea name="pre_testing" class="form-control">{{ isset($documentData['pre_testing']) ? $documentData['pre_testing'] : '' }}</textarea>

        <label for="testing">Testing</label>
        <textarea name="testing" class="form-control">{{ isset($documentData['testing']) ? $documentData['testing'] : '' }}</textarea>

        <br>
        <label for="name_of_reference_document">Name Of Reference Document</label><button class="btn" onclick="js:add_name_of_reference_document_qc();">+</button>
        <table class="table table-bordered">
            <tbody id="name_of_reference_document_qc">
                {{-- <tr>
                    <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
                    <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
                    <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
                </tr> --}}
            </tbody>
        </table>
        <br>
        <label for="reference_document_urls">Reference Documents</label>
        <input type="file" name="reference_document_urls" class="form-control">

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
        function add_chemical_required() {
            event.preventDefault();
            $("#chemical_required_qc").after(`
            <tr>
                <td><input type="text" class="form-control" name="chemical_name[]" id="chemical_name"></td>
                <td><input type="text" class="form-control" name="chemical_make[]" id="make"></td>
                <td><input type="text" class="form-control" name="chemical_grade_purity[]" id="grade_purity"></td>
                <td><input type="text" class="form-control" name="chemical_quantity[]" id="quantity"></td>
                <td><input type="text" class="form-control" name="chemical_unit[]" id="unit"></td>
            </tr>
            `);
            return false;
        }

        function add_apparatus_required() {
            event.preventDefault();
            $("#apparatus_required").after(`
            <tr>
                <td><input type="text" class="form-control" name="apparatus_name[]" id="name"></td>
                <td><input type="text" class="form-control" name="apparatus_make[]" id="make"></td>
                <td><input type="text" class="form-control" name="apparatus_model[]" id="model"></td>
            </tr>
            `);
            return false;
        }

        function add_name_of_reference_document_qc() {
            event.preventDefault();
            $("#name_of_reference_document_qc").after(`
            <tr>
                <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
                <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
                <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
            </tr>
            `);
            return false;
        }

    </script>

<script>
    CKEDITOR.replace('pre_testing', {});
    CKEDITOR.replace('testing', {});
</script>


@endforeach
