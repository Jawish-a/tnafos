@extends('layouts.admin.master')
@section('page_title')
this should shows a from to create new user
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
                <form method="post" action="{{action('UserController@store')}}" class="form-horizontal" id="user_form">
                    @csrf
                    {{-- first_name --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">First Name</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="" autofocus
                                    required value="{{old('first_name')}}">
                            </div>
                        </div>
                    </div>
                    {{-- last_name --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Last Name</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="last_name" class="form-control" placeholder="" autofocus
                                    required value="{{old('last_name')}}">
                            </div>
                        </div>
                    </div>
                    {{-- gender --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Gender</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <select class="form-control" name="gender" id="gender">
                                    <option value="" disabled selected>Please Select One</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- birth_date --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Birth Date</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="date" name="birth_date" class="form-control" required
                                    value="{{old('birth_date')}}">
                            </div>
                        </div>
                    </div>
                    {{-- mobile --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Mobile Number</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="mobile" class="form-control" placeholder="599887766" required
                                    value="{{old('mobile')}}">
                            </div>
                        </div>
                    </div>
                    {{-- email --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">E-Mail</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="email" name="email" class="form-control" placeholder="info@company.com"
                                    required value="{{old('email')}}">
                            </div>
                        </div>
                    </div>
                    {{-- password --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Password</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="password" name="password" class="form-control" placeholder="" required
                                    value="" id="password">
                            </div>
                        </div>
                    </div>
                    {{-- confirm_password --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Confirm Password</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="password" name="password" class="form-control" placeholder="" required
                                    value="" id="confirm_password">
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
                                        href="#">Terms of Servie</a> and <a href="#">Privacy
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

@section('page_scripts')
<script>
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
@endsection
