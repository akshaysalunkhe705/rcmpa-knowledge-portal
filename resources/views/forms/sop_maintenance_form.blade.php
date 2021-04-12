@foreach ($sopMaintenanceDataset as $dataSet)
    <?php $documentData = $dataSet->document_details; ?>
    <form action="{{ url('hod/capa_actions/sop_maintenance/') }}/{{ $dataSet->id }}" method="post">
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
        <label for="purpose">Purpose</label>
        <textarea name="purpose" id="purpose" class="form-control">{{ $documentData != null ? $documentData['purpose'] : '' }}</textarea>
        <br>
        <label for="scope">scope</label>
        <textarea name="scope" id="scope" class="form-control">{{ $documentData != null ? $documentData['scope'] : '' }}</textarea>
        <br>
        <label for="responsibility">responsibility</label>
        <textarea name="responsibility" id="responsibility"
            class="form-control">{{ $documentData != null ? $documentData['responsibility'] : '' }}</textarea>
        <br>
        <label for="accountability">accountability</label>
        <textarea name="accountability" id="accountability"
            class="form-control">{{ $documentData != null ? $documentData['accountability'] : '' }}</textarea>
        <br>
        <label for="defination">defination</label>
        <textarea name="defination" id="defination" class="form-control">{{ $documentData != null ? $documentData['defination'] : '' }}</textarea>
        <br>
        <label for="procedures">procedures</label>
        <textarea name="procedures" id="procedures" class="form-control">{{ $documentData != null ? $documentData['procedures'] : '' }}</textarea>
        <br>
        <label for="precautions">precautions</label>
        <textarea name="precautions" id="precautions"
            class="form-control">{{ $documentData != null ? $documentData['precautions'] : '' }}</textarea>
        <br>
        <label for="applicable_formats_reference">applicable_formats_reference</label>
        <textarea name="applicable_formats_reference" id="applicable_formats_reference"
            class="form-control">{{ $documentData != null ? $documentData['applicable_formats_reference'] }}</textarea>
        <br>
        <label for="abbrevations">abbrevations</label>
        <textarea name="abbrevations" id="abbrevations"
            class="form-control">{{ $documentData != null ? $documentData['abbrevations'] : '' }}</textarea>
        <br>
        <label for="document_history">document_history</label>
        <textarea name="document_history" id="document_history"
            class="form-control">{{ $documentData != null ? $documentData['document_history'] : '' }}</textarea>
        <br>
        <label for="reference_document_urls">reference_document</label>
        <input type="file" name="reference_document_urls" class="form-control">

        <br>
        <label for="name_of_reference_document">Name Of Reference Document</label><button class="btn btn-primary"
            onclick="js:add_name_of_reference_document();">+</button>
        <table class="table table-bordered">
            <tbody id="name_of_reference_document_sopM">
                @if ($documentData != null)
                    <tr>
                        <?php $i=0; ?>
                        @foreach ($documentData['name_of_reference_document'] as $item)
                            @if(($i % 3) == 0)
                                <?php $i=0; ?>
                                </tr><tr>
                            @endif
                            <?php $i++ ?>
                            <td>
                                <input type="text" name="name_of_reference_document[]" class="form-control" value="{{ $item }}">
                            </td>
                    @endforeach
                </tr>
                <tr>
                    <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
                    <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
                    <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
                </tr>
                @endif
            </tbody>
        </table>
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

    <script>
        function add_name_of_reference_document() {
            event.preventDefault();
            $("#name_of_reference_document_sopM").after(`
                <tr>
                    <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
                    <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
                    <td><input type="text" class="form-control" name="name_of_reference_document[]"></td>
                </tr>`);
            return false;
        }

    </script>

    <script>
        CKEDITOR.replace('purpose', {});
        CKEDITOR.replace('scope', {});
        CKEDITOR.replace('responsibility', {});
        CKEDITOR.replace('accountability', {});
        CKEDITOR.replace('defination', {});
        CKEDITOR.replace('procedures', {});
        CKEDITOR.replace('precautions', {});
        CKEDITOR.replace('applicable_formats_reference', {});
        CKEDITOR.replace('abbrevations', {});
        CKEDITOR.replace('document_history', {});
    </script>
@endforeach
