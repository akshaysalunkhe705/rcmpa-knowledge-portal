@foreach ($msdsDataset as $dataSet)
<?php
$documentData = $dataSet->document_details;
?>
    <form action="{{ url('hod/capa_actions/msds') }}/{{ $dataSet->id }}" method="post">
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
        <label for="identification">identification</label>
        <div class="row">
            <div class="col-md-4">Product Idenitifer</div>
            <div class="col-md-4">
                <input type="text" name="product_identification" id="product_identification" class="form-control" value="{{ $documentData != null ? $documentData['identification']['product_identification'] : '' }}">
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-4">Product Code</div>
            <div class="col-md-4">
                <input type="text" name="product_code" id="product_code" class="form-control" value="{{ $documentData != null ? $documentData['identification']['product_code'] : '' }}">
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-4">Physical Appearance</div>
            <div class="col-md-4">
                <input type="text" name="physical_appearance" id="physical_appearance" class="form-control" value="{{ $documentData != null ? $documentData['identification']['physical_appearance'] : '' }}">
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-4">CAS Number</div>
            <div class="col-md-4">
                <input type="text" name="CAS_number" id="CAS_number" class="form-control" value="{{ $documentData != null ? $documentData['identification']['CAS_number'] : '' }}">
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-4">Relevant Identified Uses Of Substance</div>
            <div class="col-md-4">
                <input type="text" name="relevant_identified_uses_of_substance"
                    id="relevant_identified_uses_of_substance" class="form-control" value="{{ $documentData != null ? $documentData['identification']['relevant_identified_uses_of_substance'] : '' }}">
            </div>
        </div>

        <br>
        <label for="hazards_identification">Hazards Identification</label>
        <?php 
            print_r($documentData['hazards_identification']);
        ?>
        <textarea name="hazards_identification" id="hazards_identification" class="form-control">{{ $documentData != null ? $documentData['hazards_identification'] : '' }}</textarea>
        <br>
        <label for="composition_information_or_ingredients">Composition Information/Ingredients</label>
        <textarea name="composition_information_or_ingredients" id="composition_information_or_ingredients" class="form-control">{{ $documentData != null ? $documentData['composition_information_or_ingredients'] : '' }}</textarea>
        <br>
        <label for="first_and_measures">First And Measures</label>
        <textarea name="first_and_measures" id="first_and_measures" class="form-control">{{ $documentData != null ? $documentData['first_and_measures'] : '' }}</textarea>
        <br>
        <label for="firefighting_measures">Firefighting Measures</label>
        <textarea name="firefighting_measures" id="firefighting_measures" class="form-control">{{ $documentData != null ? $documentData['firefighting_measures'] : '' }}</textarea>
        <br>
        <label for="accidental_release_measures">Accidental Release Measures</label>
        <textarea name="accidental_release_measures" id="accidental_release_measures" class="form-control">{{ $documentData != null ? $documentData['accidental_release_measures'] : '' }}</textarea>
        <br>
        <label for="handling_and_storage">Handling And Storage</label>
        <textarea name="handling_and_storage" id="handling_and_storage" class="form-control">{{ $documentData != null ? $documentData['handling_and_storage'] : '' }}</textarea>
        <br>
        <label for="exposure_control_or_personal_protection">Exposure Control/Personal Protection</label>
        <textarea name="exposure_control_or_personal_protection" id="exposure_control_or_personal_protection" class="form-control">{{ $documentData != null ? $documentData['exposure_control_or_personal_protection'] : '' }}</textarea>
        <br>
        <label for="physical_and_chemical_properties">Physical And Chemical Properties</label>
        <textarea name="physical_and_chemical_properties" id="physical_and_chemical_properties" class="form-control">{{ $documentData != null ? $documentData['physical_and_chemical_properties'] : '' }}</textarea>
        <br>
        <label for="stability_and_reactivity">Stability And Reactivity</label>
        <textarea name="stability_and_reactivity" id="stability_and_reactivity" class="form-control">{{ $documentData != null ? $documentData['stability_and_reactivity'] : '' }}</textarea>
        <br>
        <label for="toxiocological_information">Toxiocological Information</label>
        <textarea name="toxiocological_information" id="toxiocological_information" class="form-control">{{ $documentData != null ? $documentData['toxiocological_information'] : '' }}</textarea>

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
        CKEDITOR.replace('hazards_identification', {});
        CKEDITOR.replace('composition_information_or_ingredients', {});
        CKEDITOR.replace('first_and_measures', {});
        CKEDITOR.replace('firefighting_measures', {});
        CKEDITOR.replace('accidental_release_measures', {});
        CKEDITOR.replace('handling_and_storage', {});
        CKEDITOR.replace('exposure_control_or_personal_protection', {});
        CKEDITOR.replace('physical_and_chemical_properties', {});
        CKEDITOR.replace('stability_and_reactivity', {});
        CKEDITOR.replace('toxiocological_information', {});
    </script>
@endforeach