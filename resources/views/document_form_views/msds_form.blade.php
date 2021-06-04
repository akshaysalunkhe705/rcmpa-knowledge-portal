@extends('./layouts/formview_layout',
[
'title' => 'CAPA',
]
)

@section('main_container')
    <?php $documentData = $dataSet->document_details; ?>
    <x-document-view-header-component documentNumber='{{ $dataSet->document_number }}'
        createdDate='{{ $dataSet->created_date }}' versionNo='{{ $dataSet->version_number }}'
        capaNumber='{{ $dataSet->capa_number }}' revisionDate='{{ $dataSet->revision_date }}'
        preparedBy='{{ $dataSet->prepared_by }}' approvedBy='{{ $dataSet->approved_by }}'
        location='{{ $dataSet->fetchLocation($dataSet->location_id) }}'
        department='{{ $dataSet->fetchDepartment($dataSet->department_id) }}'
        mainDocumentId='{{ $dataSet->fetchMainDocumentTitle($dataSet->main_document_id) }}'
        subDocumentId='{{ $dataSet->fetctSubDocumentTitle($dataSet->sub_document_id) }}' />
    <br>
    <label for="identification">identification</label>
    <div class="row">
        <div class="col-md-4">Product Idenitifer</div>
        <div class="col-md-4">
            <?= $documentData['identification']['product_identification'] ?>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-4">Product Code</div>
        <div class="col-md-4">
            <?= $documentData['identification']['product_code'] ?>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-4">Physical Appearance</div>
        <div class="col-md-4">
            <?= $documentData['identification']['physical_appearance'] ?>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-4">CAS Number</div>
        <div class="col-md-4">
            <?= $documentData['identification']['CAS_number'] ?>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-4">Relevant Identified Uses Of Substance</div>
        <div class="col-md-4">
            <?= $documentData['identification']['relevant_identified_uses_of_substance'] ?>
        </div>
    </div>

    <br><br>
    <label for="hazards_identification">Hazards Identification</label><br>
    <?= $documentData['hazards_identification'] ?>
    <br><br>
    <label for="composition_information_or_ingredients">Composition Information/Ingredients</label><br>
    <?= $documentData['composition_information_or_ingredients'] ?>
    <br><br>
    <label for="first_and_measures">First And Measures</label><br>
    <?= $documentData['first_and_measures'] ?>
    <br><br>
    <label for="firefighting_measures">Firefighting Measures</label><br>
    <?= $documentData['firefighting_measures'] ?>
    <br><br>
    <label for="accidental_release_measures">Accidental Release Measures</label><br>
    <?= $documentData['accidental_release_measures'] ?>
    <br><br>
    <label for="handling_and_storage">Handling And Storage</label><br>
    <?= $documentData['handling_and_storage'] ?>
    <br><br>
    <label for="exposure_control_or_personal_protection">Exposure Control/Personal Protection</label><br>
    <?= $documentData['exposure_control_or_personal_protection'] ?>
    <br><br>
    <label for="physical_and_chemical_properties">Physical And Chemical Properties</label><br>
    <?= $documentData['physical_and_chemical_properties'] ?>
    <br><br>
    <label for="stability_and_reactivity">Stability And Reactivity</label><br>
    <?= $documentData['stability_and_reactivity'] ?>
    <br><br>
    <label for="toxiocological_information">Toxiocological Information</label><br>
    <?= $documentData['toxiocological_information'] ?>
    <br><br>
    <label for="ecological_information">Ecological Information</label><br>
    <?= $documentData['ecological_information'] ?>
    <br><br>
    <label for="disposal_considerations">Disposal Considerations</label><br>
    <?= $documentData['disposal_considerations'] ?>
    <br><br>
    <label for="transport_information">Transport Information</label><br>
    <?= $documentData['transport_information'] ?>
    <br><br>
    <label for="regulatory_information">Regulatory Information</label><br>
    <?= $documentData['regulatory_information'] ?>
    <br><br>
    <label for="other_information">Other Information</label><br>
    <?= $documentData['other_information'] ?>

@endsection
