@extends('layouts.admin.master')
@section('pagecss')
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<style>
    @media print {
        nav * {
            display: none;
        }

        .navbar-nav * {
            display: none;
        }

        #section-to-print,
        #section-to-print * {
            visibility: visible;
        }

        #section-to-print {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>
@endsection
@section('page_title')
List of Purchase Requests
<a href="{{route('service.create')}}" class="float-right fa fa-plus btn-circle btn-tnafos shadow"></a>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-20" id="section-to-print">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="float-right font-16"><strong>Purchase Request #
                                    {{$purchaseRequest->uuid}}</strong></h4>
                            <h3 class="mt-0">
                                <img src="{{asset('storage/'.$purchaseRequest->company->logo)}}" alt="logo" height="48">
                            </h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong>From:</strong><br>
                                    {{$purchaseRequest->company->name}}<br>
                                    {{$purchaseRequest->company->country}} {{$purchaseRequest->company->city}}<br>
                                    {{$purchaseRequest->company->address}}<br>
                                    {{$purchaseRequest->company->telephone}}<br>
                                    {{$purchaseRequest->company->email}}<br>
                                </address>
                            </div>
                            <div class="col-6 text-right">
                                <address>
                                    <strong>To:</strong><br>
                                    {{auth()->user()->company->name}}<br>
                                    1234 Main<br>
                                    Apt. 4B<br>
                                    Springfield, ST 54321
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 m-t-30">
                                <address>
                                    <strong>Contact Details:</strong><br>
                                    Visa ending **** 4242<br>
                                    {{$purchaseRequest->company->email}}
                                </address>
                            </div>
                            <div class="col-6 m-t-30 text-right">
                                <address>
                                    <strong>Order Date:</strong><br>
                                    {{$purchaseRequest->date}}<br><br>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div>
                            <div class="p-2">
                                <h3 class="font-16"><strong>Purchase Request summary</strong></h3>
                            </div>
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td><strong>Item</strong></td>
                                                <td class="text-left"><strong>Service Name</strong></td>
                                                <td class="text-right"><strong>Service Details</strong></td>
                                            </tr>
                                        </thead>
                                        {{--  {{$purchaseRequest->lines}} --}}
                                        <tbody>
                                            <p class="d-none">{{$i=1}}</p>

                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            @foreach ($purchaseRequest->lines as $line)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td class="text-left">{{$line->service->name}}</td>
                                                <td class="text-right">{{$line->service->description}}</td>
                                            </tr>
                                            <p class="d-none">{{$i++}}</p>
                                            @endforeach
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line text-left">
                                                    <strong>Details</strong></td>
                                                <td class="no-line text-right">
                                                    <h4 class="m-0">{{$purchaseRequest->details}}</h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                @if (auth()->user()->company->id == $purchaseRequest->company->id)
                                <div class="d-print-none">
                                    <div class="float-right">
                                        <a href="javascript:window.print()" class="btn btn-success "><i
                                                class="fa fa-print"></i></a>
                                        <a href="{{route('estimate.incomming')}}"
                                            class="btn btn-primary ">View Estimates</a>
                                    </div>
                                </div>

                                @else
                                <div class="d-print-none">
                                    <div class="float-right">
                                        <a href="javascript:window.print()" class="btn btn-success "><i
                                                class="fa fa-print"></i></a>
                                        <a href="{{route('estimate.create', $purchaseRequest->uuid)}}"
                                            class="btn btn-primary ">Create Estimate</a>
                                    </div>
                                </div>

                                @endif
                            </div>
                        </div>

                    </div>
                </div> <!-- end row -->

            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection
@section('page_scripts')

@endsection
