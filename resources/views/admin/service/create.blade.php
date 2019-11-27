@extends('layouts.admin.master')
@section('page_title')
Create New Service
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
                <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
            </div>
            <div class="card-body">
                {{-- form starts here --}}
                <form method="post" action="{{action('ServiceController@store')}}" class="form-horizontal" id="user_form">
                    @csrf
                    {{-- name --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Name</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="name" class="form-control" placeholder="Name of the Service"
                                    autofocus required value="{{old('name')}}">
                            </div>
                        </div>
                    </div>
                    {{-- description --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">description</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <textarea class="form-control" name="description" rows="3"
                                    maxlength="255">{{old('description')}}</textarea>
                            </div>
                        </div>
                    </div>
                    {{-- rate --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Rate</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-3">
                                <input type="number" min="0" class="form-control" placeholder="rate" aria-label="rate"
                                    name="rate" required value="{{old('rate')}}" aria-describedby="rate">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="rate">S.R.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- unit --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Unit</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="unit" class="form-control" placeholder="eg. design, month, etc"
                                     required value="{{old('unit')}}">
                            </div>
                        </div>
                    </div>
                    {{-- type --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Type</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <select class="form-control" name="type" id="type">
                                    <option value="" disabled selected>Please Select One</option>
                                    <option value="hourly">Hourly</option>
                                    <option value="project">Project</option>
                                </select>
                            </div>
                        </div>
                    </div>

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
                <button class="btn btn-block btn-success" type="submit" form="user_form">Save</button>
                <button class="btn btn-block btn-secondary">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection
