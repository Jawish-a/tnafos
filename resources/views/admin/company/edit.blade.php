@extends('layouts.admin.master')
@section('page_title')
Update Your Company Profile


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

    <div class="col-md-8 ml-auto mr-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Basic Company Details</h6>
            </div>
            <div class="card-body">
                {{-- form starts here --}}
                <form method="post" action="{{action('CompanyController@update', $company)}}" class="form-horizontal"
                    id="company_form">
                    @csrf
                    @method('put')
                    {{-- name --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Company Name</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="name" class="form-control" placeholder="e.g. tnafos ITC co."
                                    autofocus required value="{{$company->name}}">
                            </div>
                        </div>
                    </div>
                    {{-- type --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Company Type</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <select class="form-control" name="type" id="type" required>
                                    <option value="" disabled selected>Please Select One</option>
                                    <option value="Company" {{ ($company->type == 'Company') ? 'selected' : ''}}>Company
                                    </option>
                                    <option value="Establishment"
                                        {{ ($company->type == 'Establishment') ? 'selected' : ''}}>Establishment
                                    </option>
                                    <option value="Organization"
                                        {{ ($company->type == 'Organization') ? 'selected' : ''}}>Organization</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- cr --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Company CR</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="cr" class="form-control" placeholder="e.g. 1010234567" required
                                    value="{{$company->cr}}">
                            </div>
                        </div>
                    </div>
                    {{-- vat --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">VAT Number</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="vat" class="form-control" placeholder="e.g. 1300000003535"
                                    required value="{{$company->vat}}">
                            </div>
                        </div>
                    </div>
                    {{-- main_services --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Main Services</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <select name="main_services" class="form-control" name="type" id="type" required>
                                    <option value="" disabled selected>Please select one</option>
                                    <option value="Computing">Computing</option>
                                    <option value="Networks & Communication">Networks & Communication</option>
                                    <option value="Software">Software</option>
                                    <option value="Software">Profesional Services</option>
                                    <option value="Consulting">Consulting</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Insurance">Insurance</option>
                                    <option value="Travel">Travel</option>
                                    <option value="Events">Events</option>
                                    <option value="Food">Food</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Reasearch">Reasearch</option>
                                    <option value="Media">Media</option>
                                    <option value="Distribution">Distribution</option>
                                    <option value="Supply">Supply</option>
                                    <option value="Printing & Prototyping">Printing & Prototyping</option>
                                    <option value="Production">Production</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Design">Design</option>
                                    <option value="Utilities">Utilities</option>
                                    <option value="Logistics">Logistics</option>
                                    <option value="Waste Management">Waste Management</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- establishment_year --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Establishment Year</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <select class="form-control" name="establishment_year" id="establishment_year" required>
                                    <option value="" disabled selected>Please select one</option>
                                    @for ($i = 2020; $i > 1900; $i--)
                                    <option value="{{$i}}" {{ ($company->establishment_year == $i) ? 'selected' : ''}}>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- total_employees --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Total Employees</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="number" name="total_employees" class="form-control" placeholder="e.g. 50"
                                    required value="{{$company->total_employees}}">
                            </div>
                        </div>
                    </div>
                    {{-- bio --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Company Bio</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <textarea class="form-control" name="bio" rows="3"
                                    maxlength="255">{{$company->bio}}</textarea>
                            </div>
                        </div>
                    </div>
                    {{-- telephone --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Telephone</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="telephone" class="form-control"
                                    placeholder="e.g. +966112461111" required value="{{$company->telephone}}">
                            </div>
                        </div>
                    </div>
                    {{-- fax --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Fax</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="fax" class="form-control" placeholder="e.g. +966112461111"
                                    required value="{{$company->fax}}">
                            </div>
                        </div>
                    </div>
                    {{-- email --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">E-Mail</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="email" name="email" class="form-control" placeholder="info@company.com"
                                    required value="{{$company->email}}">
                            </div>
                        </div>
                    </div>
                    {{-- website --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Website</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="website" name="website" class="form-control" placeholder="www.company.com"
                                    value="{{$company->website}}">
                            </div>
                        </div>
                    </div>
                    {{-- country --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Country</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <select class="form-control" name="country" id="country" required>
                                    <option value="" disabled selected>Please select one</option>
                                    @foreach ($countries as $country)
                                    <option value="{{$country->name}}" {{ ($company->country == $country->name) ? 'selected' : '' }}>{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- city --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">City</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="city" class="form-control" placeholder="" required
                                    value="{{$company->city}}">
                            </div>
                        </div>
                    </div>
                    {{-- po_box --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">P.O. box</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="po_box" class="form-control" placeholder="" required
                                    value="{{$company->po_box}}">
                            </div>
                        </div>
                    </div>
                    {{-- zip_code --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">ZIP Code</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="zip_code" class="form-control" placeholder="" required
                                    value="{{$company->zip_code}}">
                            </div>
                        </div>
                    </div>
                    {{-- address --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Address</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="address" class="form-control" placeholder="" required
                                    value="{{$company->address}}">
                            </div>
                        </div>
                    </div>
                    {{-- location --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">location</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="location" class="form-control" placeholder="" required
                                    value="{{$company->location}}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    {{-- terms and condition --}}
                    <div class="row py-4">
                        <label class="col-sm-2 col-form-label text-md-right"></label>
                        <div class="col-sm-10">
                            <h4>Terms & Conditions agreement</h4>
                            <div class="custom-control custom-checkbox large">
                                <input type="checkbox" class="custom-control-input" id="terms" required>
                                <label class="custom-control-label" for="terms" required>I agree to Tnafos <a
                                        href="http://">Terms of Servie</a> and <a href="http://">Privacy
                                        Policy</a></label>
                            </div>
                        </div>
                    </div>
                    {{-- valid_information --}}
                    <div class="row py-4">
                        <label class="col-sm-2 col-form-label text-md-right"></label>
                        <div class="col-sm-10">
                            <h4>Decleration of Valid Information</h4>
                            <div class="custom-control custom-checkbox large">
                                <input type="checkbox" class="custom-control-input" id="valid_information" required>
                                <label class="custom-control-label" for="valid_information">I confirm that the
                                    information given in
                                    this form is true, complete and accurate.
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4 ml-auto mr-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Done ?</h6>
            </div>
            <div class="card-body">
                <button class="btn btn-block btn-success" type="submit" form="company_form">Save</button>
                <button class="btn btn-block btn-secondary">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection
