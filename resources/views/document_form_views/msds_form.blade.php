@extends('./layouts/formview_layout',
[
'title' => 'CAPA',
]
)

@section('main_container')
<?php
$documentData = $dataSet->document_details;
?>
    <form action="{{ url('hod/capa_actions/msds') }}/{{ $dataSet->id }}" method="post">
        <input type="hidden" name="document_id" value="{{ $dataSet->id }}">
        @csrf
        <div style="border:1px solid; padding:1%;">
            <x-document-view-header-component documentNumber='{{ $dataSet->document_number }}'
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
                <input type="text" name="product_identification" id="product_identification" class="form-control" value="{{ $documentData['identification']['product_identification'] }}" disabled>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-4">Product Code</div>
            <div class="col-md-4">
                <input type="text" name="product_code" id="product_code" class="form-control" value="{{ $documentData['identification']['product_code'] }}" disabled>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-4">Physical Appearance</div>
            <div class="col-md-4">
                <input type="text" name="physical_appearance" id="physical_appearance" class="form-control" value="{{ $documentData['identification']['physical_appearance'] }}" disabled>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-4">CAS Number</div>
            <div class="col-md-4">
                <input type="text" name="CAS_number" id="CAS_number" class="form-control" value="{{ $documentData['identification']['CAS_number'] }}" disabled>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-4">Relevant Identified Uses Of Substance</div>
            <div class="col-md-4">
                <input type="text" name="relevant_identified_uses_of_substance"
                    id="relevant_identified_uses_of_substance" class="form-control" value="{{ $documentData['identification']['relevant_identified_uses_of_substance'] }}" disabled>
            </div>
        </div>

        <br><br>
        <label for="hazards_identification">Hazards Identification</label><br>
        {{ $documentData['hazards_identification'] }}
        <br><br>
        <label for="composition_information_or_ingredients">Composition Information/Ingredients</label><br>
        {{ $documentData['composition_information_or_ingredients'] }}
        <br><br>
        <label for="first_and_measures">First And Measures</label><br>
        {{ $documentData['first_and_measures'] }}
        <br><br>
        <label for="firefighting_measures">Firefighting Measures</label><br>
        {{ $documentData['firefighting_measures'] }}
        <br><br>
        <label for="accidental_release_measures">Accidental Release Measures</label><br>
        {{ $documentData['accidental_release_measures'] }}
        <br><br>
        <label for="handling_and_storage">Handling And Storage</label><br>
        {{ $documentData['handling_and_storage'] }}
        <br><br>
        <label for="exposure_control_or_personal_protection">Exposure Control/Personal Protection</label><br>
        {{ $documentData['exposure_control_or_personal_protection'] }}
        <br><br>
        <label for="physical_and_chemical_properties">Physical And Chemical Properties</label><br>
        {{ $documentData['physical_and_chemical_properties'] }}
        <br><br>
        <label for="stability_and_reactivity">Stability And Reactivity</label><br>
        {{ $documentData['stability_and_reactivity'] }}
        <br><br>
        <label for="toxiocological_information">Toxiocological Information</label><br>
        {{ $documentData['toxiocological_information'] }}

        {{-- <hr>
        <div style="border:1px solid; padding:1%;">
            <x-document-form-footer-component status='{{ $dataSet->status }}'
                statusByAdmin='{{ $dataSet->status_by_admin }}'
                statusBySuperAdmin='{{ $dataSet->status_by_super_admin }}'
                rejectNote='{{ $dataSet->reject_note }}' removedNote='{{ $dataSet->removed_note }}' />
        </div>
        <br>
        <input type="submit" name="SAVE" class="btn btn-primary" value="SAVE">
        <input type="submit" name="SUBMIT" class="btn btn-primary" value="SUBMIT"> --}}
    </form>

@endsection