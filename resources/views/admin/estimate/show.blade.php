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
Estimate
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
                            <h4 class="float-right font-16"><strong>Estimate #
                                    {{$estimate->uuid}}</strong></h4>
                            <h3 class="mt-0">
                                <img src="{{asset('storage/'.$estimate->company->logo)}}" alt="logo" height="48">
                            </h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong>From:</strong><br>
                                    {{$estimate->company->name}}<br>
                                    {{$estimate->company->country}} {{$estimate->company->city}}<br>
                                    {{$estimate->company->address}}<br>
                                    {{$estimate->company->telephone}}<br>
                                    {{$estimate->company->email}}<br>
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
                                    {{$estimate->company->email}}
                                </address>
                            </div>
                            <div class="col-6 m-t-30 text-right">
                                <address>
                                    <strong>Estimate Date:</strong><br>
                                    {{$estimate->date}}<br>
                                    <strong>Expiray Date:</strong><br>
                                    {{$estimate->expiryDate}}<br>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div>
                            <div class="p-2">
                                <h3 class="font-16"><strong>Estimate Details</strong></h3>
                            </div>
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table mt-4">
                                        <thead>
                                            <tr>
                                                <td class="text-left" style="width: 10%"><strong>Item</strong></td>
                                                <td class="text-left" style="width: auto"><strong>Service Name</strong>
                                                </td>
                                                <td class="text-center" style="width: 12%"><strong>Unit</strong></td>
                                                <td class="text-center" style="width: 12%"><strong>Type</strong></td>
                                                <td class="text-center" style="width: 12%"><strong>Rate</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <p class="d-none">{{$i=1}}</p>
                                            @foreach ($estimate->lines as $line)
                                            <tr>
                                                <td class="text-left">{{$i}}</td>
                                                <td class="text-left">
                                                    <strong>{{$line->service->name}}</strong> <br>
                                                    {{$line->service->description}}
                                                </td>
                                                <td class="text-center">{{$line->unit}}</td>
                                                <td class="text-center">{{$line->type}}</td>
                                                <td class="text-center">{{$line->rate}}</td>

                                            </tr>
                                            <p class="d-none">{{$i++}}</p>
                                            @endforeach
                                            <tr>
                                                <td class="py-1"></td>
                                                <td class="py-1"></td>
                                                <td class="py-1"><strong>Subtotal</strong></td>
                                                <td class="py-1"></td>
                                                <td class="py-1 text-center"><strong>{{$estimate->subtotal}} SR</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-1" style="border-color: transparent"></td>
                                                <td class="py-1" style="border-color: transparent"></td>
                                                <td class="py-1" style="border-color: transparent">
                                                    <strong>Discount</strong></td>
                                                <td class="py-1" style="border-color: transparent"></td>
                                                <td class="py-1 text-center" style="border-color: transparent">
                                                    <strong>{{$estimate->discount}}%</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="py-1" style="border-color: transparent"></td>
                                                <td class="py-1" style="border-color: transparent"></td>
                                                <td class="py-1" style="border-color: transparent"><strong>Tax</strong>
                                                </td>
                                                <td class="py-1" style="border-color: transparent"></td>
                                                <td class="py-1 text-center" style="border-color: transparent">
                                                    <strong>{{$estimate->tax}}%</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="py-1" style="border-color: transparent"></td>
                                                <td class="py-1" style="border-color: transparent"></td>
                                                <td class="py-1" style="border-color: transparent">
                                                    <strong>Total</strong></td>
                                                <td class="py-1" style="border-color: transparent"></td>
                                                <td class="py-1 text-center" style="border-color: transparent">
                                                    <strong>{{$estimate->total}} SR</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr class="p-3">
                                <div class="row">
                                    <div class="col-lg-1 col-md-3 text-md-right text-sm-left">
                                        <p><strong>Notes</strong></p>
                                    </div>
                                    <div class="col-lg-11 col-md-9">
                                        <p>{{$estimate->notes}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-1 col-md-3 text-md-right text-sm-left">
                                        <p><strong>Terms</strong></p>
                                    </div>
                                    <div class="col-lg-11 col-md-9">
                                        <p>{{$estimate->terms}}</p>
                                    </div>
                                </div>


                                @if (auth()->user()->company->id == $estimate->company->id)
                                <div class="d-print-none">
                                    <div class="float-right">
                                        <a href="javascript:window.print()" class="btn btn-success "><i
                                                class="fa fa-print"></i></a>
                                        @if ($estimate->status === "Approved")
                                        <a href="{{route('invoice.create', $estimate->uuid)}}" class="btn btn-primary ">Create
                                            Invoice</a>
                                        @else
                                        <a href="{{route('estimate.outgoing')}}" class="btn btn-primary ">View
                                            Estimates</a>
                                        @endif
                                    </div>
                                </div>

                                @else
                                <div class="d-print-none">
                                    <div class="float-right">
                                        <a href="javascript:window.print()" class="btn btn-primary "><i
                                                class="fa fa-print"></i></a>
                                        @if ($estimate->status != "Approved")
                                        <a href="{{route('estimate.setStatus', [$estimate->uuid])}}"
                                            class="btn btn-success ">Approve <i class="fa fa-check pl-2"></i></a>

                                        @else
                                        <a href="" class="btn btn-success ">Do Somthing <i
                                                class="fa fa-check pl-2"></i></a>

                                        @endif
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
