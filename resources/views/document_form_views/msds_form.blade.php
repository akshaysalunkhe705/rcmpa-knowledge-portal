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
    <label for="identification">Identification</label>
    <table class="table table-bordered">
        <tr>
            <td>Product Idenitifer</td>
            <td><?= $documentData['identification']['product_identification'] ?></td>
        </tr>
        <tr>
            <td>Product Code</td>
            <td><?= $documentData['identification']['product_code'] ?></td>
        </tr>
        <tr>
            <td>Physical Appearance</td>
            <td><?= $documentData['identification']['physical_appearance'] ?></td>
        </tr>
        <tr>
            <td>CAS Number</td>
            <td><?= $documentData['identification']['CAS_number'] ?></td>
        </tr>
        <tr>
            <td>Relevant Identified Uses Of Substance</td>
            <td><?= $documentData['identification']['relevant_identified_uses_of_substance'] ?></td>
        </tr>
    </table>

    <br><br>
    <label for="hazards_identification">Hazards Identification</label><br>
    <?= isset($documentData['hazards_identification']) ? $documentData['hazards_identification'] : ''?>
    <br><br>
    <label for="composition_information_or_ingredients">Composition Information/Ingredients</label><br>
    <?= isset($documentData['composition_information_or_ingredients']) ? $documentData['composition_information_or_ingredients'] : '' ?>
    <br><br>
    <label for="first_and_measures">First And Measures</label><br>
    <?= isset($documentData['first_and_measures']) ? $documentData['first_and_measures'] : '' ?>
    <br><br>
    <label for="firefighting_measures">Firefighting Measures</label><br>
    <?= isset($documentData['firefighting_measures']) ? $documentData['firefighting_measures'] : '' ?>
    <br><br>
    <label for="accidental_release_measures">Accidental Release Measures</label><br>
    <?= isset($documentData['accidental_release_measures']) ? $documentData['accidental_release_measures'] : '' ?>
    <br><br>
    <label for="handling_and_storage">Handling And Storage</label><br>
    <?= isset($documentData['handling_and_storage']) ? $documentData['handling_and_storage'] : '' ?>
    <br><br>
    <label for="exposure_control_or_personal_protection">Exposure Control/Personal Protection</label><br>
    <?= isset($documentData['exposure_control_or_personal_protection']) ? $documentData['exposure_control_or_personal_protection'] : '' ?>
    <br><br>
    <label for="physical_and_chemical_properties">Physical And Chemical Properties</label><br>
    <?= isset($documentData['physical_and_chemical_properties']) ? $documentData['physical_and_chemical_properties'] : '' ?>
    <br><br>
    <label for="stability_and_reactivity">Stability And Reactivity</label><br>
    <?= isset($documentData['stability_and_reactivity']) ? $documentData['stability_and_reactivity'] : '' ?>
    <br><br>
    <label for="toxiocological_information">Toxiocological Information</label><br>
    <?= isset($documentData['toxiocological_information']) ? $documentData['toxiocological_information'] : '' ?>
    <br><br>
    <label for="ecological_information">Ecological Information</label><br>
    <?= isset($documentData['ecological_information']) ? $documentData['ecological_information'] : '' ?>
    <br><br>
    <label for="disposal_considerations">Disposal Considerations</label><br>
    <?= isset($documentData['disposal_considerations']) ? $documentData['disposal_considerations'] : '' ?>
    <br><br>
    <label for="transport_information">Transport Information</label><br>
    <?= isset($documentData['transport_information']) ? $documentData['transport_information'] : '' ?>
    <br><br>
    <label for="regulatory_information">Regulatory Information</label><br>
    <?= isset($documentData['regulatory_information']) ? $documentData['regulatory_information'] : '' ?>
    <br><br>
    <label for="other_information">Other Information</label><br>
    <?= isset($documentData['other_information']) ? $documentData['other_information'] : '' ?>

@endsection
