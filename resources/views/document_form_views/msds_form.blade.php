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
    <label for="identification">Section 1 Identification</label>
    <table class="table table-bordered">
        <tr>
            <td>Product Identifier</td>
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
    <label for="hazards_identification">Section 2 Identification</label><br>
    <?= isset($documentData['hazards_identification']) ? $documentData['hazards_identification'] : ''?>
    <br><br>
    <label for="composition_information_or_ingredients">Section 3 Composition/Information on Ingredients</label><br>
    <?= isset($documentData['composition_information_or_ingredients']) ? $documentData['composition_information_or_ingredients'] : '' ?>
    <br><br>
    <label for="first_and_measures">Section 4 First And Measures</label><br>
    <?= isset($documentData['first_and_measures']) ? $documentData['first_and_measures'] : '' ?>
    <br><br>
    <label for="firefighting_measures">Section 5 Firefighting Measures</label><br>
    <?= isset($documentData['firefighting_measures']) ? $documentData['firefighting_measures'] : '' ?>
    <br><br>
    <label for="accidental_release_measures">Section 6 Accidental Release Measures</label><br>
    <?= isset($documentData['accidental_release_measures']) ? $documentData['accidental_release_measures'] : '' ?>
    <br><br>
    <label for="handling_and_storage">Section 7 Handling And Storage</label><br>
    <?= isset($documentData['handling_and_storage']) ? $documentData['handling_and_storage'] : '' ?>
    <br><br>
    <label for="exposure_control_or_personal_protection">Section 8 Exposure Control/Personal Protection</label><br>
    <?= isset($documentData['exposure_control_or_personal_protection']) ? $documentData['exposure_control_or_personal_protection'] : '' ?>
    <br><br>
    <label for="physical_and_chemical_properties">Section 9 Physical And Chemical Properties</label><br>
    <?= isset($documentData['physical_and_chemical_properties']) ? $documentData['physical_and_chemical_properties'] : '' ?>
    <br><br>
    <label for="stability_and_reactivity">Section 10 Stability And Reactivity</label><br>
    <?= isset($documentData['stability_and_reactivity']) ? $documentData['stability_and_reactivity'] : '' ?>
    <br><br>
    <label for="toxiocological_information">Section 11 Toxiocological Information</label><br>
    <?= isset($documentData['toxiocological_information']) ? $documentData['toxiocological_information'] : '' ?>
    <br><br>
    <label for="ecological_information">Section 12 Ecological Information</label><br>
    <?= isset($documentData['ecological_information']) ? $documentData['ecological_information'] : '' ?>
    <br><br>
    <label for="disposal_considerations">Section 13 Disposal Considerations</label><br>
    <?= isset($documentData['disposal_considerations']) ? $documentData['disposal_considerations'] : '' ?>
    <br><br>
    <label for="transport_information">Section 14 Transport Information</label><br>
    <?= isset($documentData['transport_information']) ? $documentData['transport_information'] : '' ?>
    <br><br>
    <label for="regulatory_information">Section 15 Regulatory Information</label><br>
    <?= isset($documentData['regulatory_information']) ? $documentData['regulatory_information'] : '' ?>
    <br><br>
    <label for="other_information">Section 16 Other Information</label><br>
    <?= isset($documentData['other_information']) ? $documentData['other_information'] : '' ?>

@endsection
