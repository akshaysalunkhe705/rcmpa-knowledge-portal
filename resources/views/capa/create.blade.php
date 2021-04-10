@extends('./layouts/layout',
[
'title' => 'CAPA',
'heading' => 'CAPA',
'breadcrumb1' => 'CAPA',
'breadcrumb2' => 'New',
'nav_status' => 'document_action',
'sub_nav_status' => 'document_action-set-create',
]
)

<?php
use App\Models\MainDocumentTitleModel;
use App\Models\SubDocumentTitleModel;
?>

@section('main_container')
    <style>
        section {
            display: none;
            background-color: white;
            padding: 2%;
            box-shadow: 0px 0px 3px grey;
        }

        #process_flow_control {
            display: block;
        }

    </style>

    @if (count($process) != 0)
        <button class="btn btn-primary" onclick="js:sectionFormToggle('process_flow_control')">PROCESS</button>
    @endif
    @if (count($sop_production) != 0)
        <button class="btn btn-primary" onclick="js:sectionFormToggle('sop_production')">SOP (PRODUCTION)</button>
    @endif
    @if (count($sop_quality_control) != 0)
        <button class="btn btn-primary" onclick="js:sectionFormToggle('sop_quality_control')">SOP (QUALITY CONTROL)</button>
    @endif
    @if (count($sop_maintenance) != 0)
        <button class="btn btn-primary" onclick="js:sectionFormToggle('sop_maintenance')">SOP (MAINTENANCE)</button>
    @endif
    @if (count($msds) != 0)
        <button class="btn btn-primary" onclick="js:sectionFormToggle('msds')">MSDS</button>
    @endif
    @if (count($sss) != 0)
        <button class="btn btn-primary" onclick="js:sectionFormToggle('sss')">SSS</button>
    @endif

    <br><br>

    <section id="process_flow_control">
        @include('forms.process_and_flow_control_form',[
        'processDataset' => $process
        ])
    </section>
    <section id="sop_production">
        @include('forms.sop_production_form',[
        'sopProductionDataset' => $sop_production
        ])
    </section>
    <section id="sop_quality_control">
        @include('forms.sop_quality_control_form',[
        'sopQualityControlDataset' => $sop_quality_control
        ])
    </section>
    <section id="sop_maintenance">
        @include('forms.sop_maintenance_form',[
        'sopMaintenanceDataset' => $sop_maintenance
        ])
    </section>
    <section id="msds">
        @include('forms.msds_form',[
        'msdsDataset' => $msds
        ])
    </section>
    <section id="sss">
        @include('forms.sss_form',[
        'sssDataset' => $sss
        ])
    </section>


    <script>
        function sectionFormToggle(section) {
            $('section').hide();
            $('#' + section).show();
        }
    </script>
@endsection
