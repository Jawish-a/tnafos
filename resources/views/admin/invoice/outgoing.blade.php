@extends('layouts.admin.master')
@section('pagecss')
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('page_title')
List of Outgoing Invoices
<a href="{{route('invoice.create')}}" class="float-right fa fa-plus btn-circle btn-tnafos shadow"></a>
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Of Invoices</h6>
    </div>
    <div class="card-body">

        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
            aria-describedby="dataTable_info" style="width: 100%;">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-sort="ascending" aria-label="Name: activate to sort column descending"
                        style="width: 158px;">UUID
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Position: activate to sort column ascending" style="width: 241px;">
                        Company</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Office: activate to sort column ascending" style="width: 113px;">
                        Date</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Start date: activate to sort column ascending" style="width: 105px;">
                        Details</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                        aria-label="Salary: activate to sort column ascending" style="width: 95px;">
                        Options</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th rowspan="1" colspan="1">UUID</th>
                    <th rowspan="1" colspan="1">Company</th>
                    <th rowspan="1" colspan="1">Date</th>
                    <th rowspan="1" colspan="1">Total</th>
                    <th rowspan="1" colspan="1">Options</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($invoices as $invoice)
                <tr role="row">
                    <td class="sorting_1"><a href="{{route('invoice.show', $invoice->id)}}">{{$invoice->uuid}}</a>
                    </td>
                    <td>{{$invoice->company->name}}</td>
                    <td>{{$invoice->date}}</td>
                    <td>{{$invoice->total}}</td>
                    <td>Oprions</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('page_scripts')
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready( function () {
    $('#dataTable').DataTable();
} );
</script>
@endsection
