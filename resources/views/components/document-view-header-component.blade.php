<style>
    [dir] .table-bordered, [dir] .table-bordered td, [dir] .table-bordered th{
        border: 1px solid #23282f !important;
    }
</style>
<table class="table table-bordered">
    <tr>
        <td rowspan="6" align="center" width="30%">
            <h3> RCMPA Polishing Technology Pvt Ltd. </h3>
        </td>
    </tr>
    <tr>
        <td rowspan="5" align="center">
            <h3> {{ $department }} Department </h3>
        </td>
        <th>
            Doc Number
        </th>
        <td>{{ $documentNumber }}</td>
    </tr>
    <tr>
        <th>
            Creation Date
        </th>
        <td>{{ $createdDate }}</td>
    </tr>
    <tr>
        <th>
            Revision Date
        </th>
        <td>{{ $revisionDate }}</td>
    </tr>
    <tr>
        <th>
            CAPA No
        </th>
        <td>{{ $capaNumber }}</td>
    </tr>
    <tr>
        <th>
            Prepared By
        </th>
        <td>{{ $preparedBy }}</td>
    </tr>
    <tr style="border-top: 2px solid black;">
        <th>Master Document Name</th>
        <td>{{ $mainDocumentId }}</td>
        <th>Approved By</th>
        <td>Mr. Maxeem Gill</td>
    </tr>
    <tr>
        <th>Document Name</th>
        <td>{{ $subDocumentId }}</td>
        <th>Pages</th>
        <td></td>
    </tr>
</table>