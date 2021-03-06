@extends('layouts.admin.master')
@section('page_title')
{{$company->name}}
@endsection
@section('content')


<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Basic Profile Info</h6>
                    <a href="{{route('company.edit', $company)}}"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-pen fa-sm text-white-50 pr-2"></i>Update Profile</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">Company Name</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->name }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">Company Type</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->type}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">CR Number</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->cr}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">VAT Number</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->vat}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">Main Services</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->main_services}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">Establishment Year</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->establishment_year}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">Total Employees</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->total_employees}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">Bio</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->bio}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">Telephone</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->telephone}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">Fax</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->fax}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">Fax</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->fax}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">e-mail</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->email}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">Website</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->website}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">Fax</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->fax}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">Country</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->country}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">City</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->city}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">P.O. Box</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->po_box}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">ZIP Code</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->zip_code}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">Address</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->address}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">Location</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->location}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="m-0 font-weight-bold text-primary">Admin</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{$company->admin->email}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
            </div>
            <div class="card-body">
                <img src="{{asset('storage/'.$company->logo)}}" alt="">
                The styling for this basic card example is created by using default Bootstrap utility classes. By using
                utility classes, the style of the card component can be easily modified with no need for any custom CSS!
            </div>
        </div>
    </div>
</div>
@endsection
