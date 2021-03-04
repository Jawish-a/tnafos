@extends('layouts.admin.master')
@section('pagecss')
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('page_title')
Create a new invoice
<a href="{{-- {{route('service.create')}} --}}" class="float-right fa fa-plus btn-circle btn-tnafos shadow"></a>
@endsection
@section('content')
<div class="row">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<div class="row">
    <div class="col-md-9 ml-auto mr-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">invoice Details</h6>
            </div>
            <div class="card-body">
                {{-- form starts here --}}
                <form method="post" action="{{action('InvoiceController@store')}}" autocomplete="off"
                    class="form-horizontal" id="user_form">
                    @csrf
                    {{-- name --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="invoice-title">
                                <h3 class="mt-0">
                                    <img src="{{asset('storage/'.auth()->user()->company->logo)}}" alt="logo"
                                        height="68">
                                </h3>
                            </div>
                            <hr>
                        </div>
                        <div class="col-6">
                            <strong>{{auth()->user()->company->name}}</strong><br>
                            {{auth()->user()->company->country}}, {{auth()->user()->company->city}}<br>
                            {{auth()->user()->company->address}}<br>
                            {{auth()->user()->company->telephone}}<br>
                            {{auth()->user()->company->email}}<br>
                        </div>
                        <div class="col-6 text-right">
                            <strong>Customer</strong><br>
                            {{$estimate->company->name}} <br>
                            {{$estimate->company->country}}, {{$estimate->company->city}}<br>
                            {{$estimate->company->address}}<br>
                            {{$estimate->company->telephone}}<br>
                            {{$estimate->company->email}}<br>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-3 text-left">
                            <strong>Purchase Request ID</strong><br>
                            <strong>Purchase Request Date</strong><br>
                        </div>
                        <div class="col-9 text-left">
                            {{$estimate->uuid}} <br> <input type="hidden" name="estimate_uuid" value="{{$estimate->uuid}}">
                            {{$estimate->created_at->format('Y-m-d')}} <br>

                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <td class="text-left" style="width: 10%"><strong>Item</strong></td>
                                    <td class="text-left" style="width: auto"><strong>Service Name</strong></td>
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
                                    <td class="text-right"><input type="text" class="form-control" placeholder=""
                                            name="unit[]" required></td>
                                    <td class="text-right">
                                        <select class="form-control select2" name="type[]" id="type" required>
                                            <option value="" disabled selected>Please Select One</option>
                                            <option value="hourly">Hourly</option>
                                            <option value="project">Project</option>
                                        </select>
                                    </td>
                                    <td class="text-right"><input type="text" class="form-control" placeholder=""
                                            name="rate[]" onchange="calcFields()" value="0" required></td>

                                </tr>
                                <p class="d-none">{{$i++}}</p>
                                @endforeach
                                <tr>
                                    <td class="py-1"></td>
                                    <td class="py-1"></td>
                                    <td class="py-1"><strong>Subtotal</strong></td>
                                    <td class="py-1"></td>
                                    <td class="py-1">
                                        <div class="input-group input-group-sm">
                                            <input type="text" id="subtotal" name="subtotal" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">SR</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-1" style="border-color: transparent"></td>
                                    <td class="py-1" style="border-color: transparent"></td>
                                    <td class="py-1" style="border-color: transparent"><strong>Discount</strong></td>
                                    <td class="py-1" style="border-color: transparent"></td>
                                    <td class="py-1" style="border-color: transparent">
                                        <div class="input-group input-group-sm">
                                            <input type="text" id="discount" onchange="calcFields()" name="discount"
                                                value="0" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-1" style="border-color: transparent"></td>
                                    <td class="py-1" style="border-color: transparent"></td>
                                    <td class="py-1" style="border-color: transparent"><strong>Tax</strong></td>
                                    <td class="py-1" style="border-color: transparent"></td>
                                    <td class="py-1" style="border-color: transparent">
                                        <div class="input-group input-group-sm">
                                            <input type="text" id="tax" name="tax" onchange="calcFields()" value="5"
                                                class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-1" style="border-color: transparent"></td>
                                    <td class="py-1" style="border-color: transparent"></td>
                                    <td class="py-1" style="border-color: transparent"><strong>Total</strong></td>
                                    <td class="py-1" style="border-color: transparent"></td>
                                    <td class="py-1" style="border-color: transparent">
                                        <div class="input-group input-group-sm">
                                            <input type="text" id="total" name="total" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">SR</i></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <hr class="py-3">
                    <div class="row  col-md-12">
                        <label class="col-sm-2 col-form-label text-md-right">Date</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="date" name="date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row  col-md-12">
                        <label class="col-sm-2 col-form-label text-md-right">Due Date</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="date" name="dueDate" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <label class="col-sm-2 col-form-label text-right"><strong>Notes</strong></label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <textarea class="form-control" name="notes" rows="3" maxlength="255"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <label class="col-sm-2 col-form-label text-right"><strong>Terms</strong></label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <textarea class="form-control" name="terms" rows="3" maxlength="255"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3 ml-auto mr-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Done ?</h6>
            </div>
            <div class="card-body">
                <button class="btn btn-block btn-success" type="submit" form="user_form">Save</button>
                <button class="btn btn-block btn-secondary">Cancel</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('page_scripts')
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
    function calcFields() {
        //decalring variables
        var subtotal = 0;
        var discount = 0
        var tax = 0;
        var total = 0;

        // calculate the sub of rates and sum it as subtotal
        var rates = []
        rates = document.getElementsByName('rate[]');
        for (let i = 0; i < rates.length; i++) {
            var rate = rates[i];
            subtotal = subtotal + parseFloat(rate.value);
            total = subtotal;
        }
        // display subtotal
        document.getElementById('subtotal').value = subtotal;

        // calculate discount
        discount = parseFloat(document.getElementById('discount').value)
        if(discount > 0){
            var discountAmount = (subtotal / 100)*discount
            total = subtotal - discountAmount;
        }

        // calculate tax
        tax = parseFloat(document.getElementById('tax').value)
        if( tax > 0 ){
            taxAmount = (total/100)* tax;
            total = total + taxAmount;
        }

        // save it to total
        document.getElementById('total').value = total;

    }
</script>
@endsection
