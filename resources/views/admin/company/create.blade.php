@extends('layouts.admin.master')
@section('page_title')
Create Your Company Profile


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
                <form method="post" action="{{action('CompanyController@store')}}" class="form-horizontal"
                    id="company_form">
                    @csrf
                    {{-- name --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Company Name</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="name" class="form-control" placeholder="e.g. tnafos ITC co."
                                    autofocus required value="{{old('name')}}">
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
                                    <option value="Company">Company</option>
                                    <option value="Establishment">Establishment</option>
                                    <option value="Organization">Organization</option>
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
                                    value="{{old('cr')}}">
                            </div>
                        </div>
                    </div>
                    {{-- vat --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">VAT Number</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="vat" class="form-control" placeholder="e.g. 1300000003535"
                                    required value="{{old('vat')}}">
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
                                    <option value="Management">Software</option>
                                    <option value="Management">Profesional Services</option>
                                    <option value="Management">Consulting</option>
                                    <option value="Management">Finance</option>
                                    <option value="Management">Insurance</option>
                                    <option value="Management">Travel</option>
                                    <option value="Management">Events</option>
                                    <option value="Management">Food</option>
                                    <option value="Management">Marketing</option>
                                    <option value="Management">Reasearch</option>
                                    <option value="Management">Media</option>
                                    <option value="Management">Distribution</option>
                                    <option value="Management">Supply</option>
                                    <option value="Management">Printing & Prototyping</option>
                                    <option value="Management">Production</option>
                                    <option value="Management">Engineering</option>
                                    <option value="Management">Design</option>
                                    <option value="Management">Utilities</option>
                                    <option value="Management">Logistics</option>
                                    <option value="Management">Waste Management</option>
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
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                    <option value="1970">1970</option>
                                    <option value="1969">1969</option>
                                    <option value="1968">1968</option>
                                    <option value="1967">1967</option>
                                    <option value="1966">1966</option>
                                    <option value="1965">1965</option>
                                    <option value="1964">1964</option>
                                    <option value="1963">1963</option>
                                    <option value="1962">1962</option>
                                    <option value="1961">1961</option>
                                    <option value="1960">1960</option>
                                    <option value="1959">1959</option>
                                    <option value="1958">1958</option>
                                    <option value="1957">1957</option>
                                    <option value="1956">1956</option>
                                    <option value="1955">1955</option>
                                    <option value="1954">1954</option>
                                    <option value="1953">1953</option>
                                    <option value="1952">1952</option>
                                    <option value="1951">1951</option>
                                    <option value="1950">1950</option>
                                    <option value="1949">1949</option>
                                    <option value="1948">1948</option>
                                    <option value="1947">1947</option>
                                    <option value="1946">1946</option>
                                    <option value="1945">1945</option>
                                    <option value="1944">1944</option>
                                    <option value="1943">1943</option>
                                    <option value="1942">1942</option>
                                    <option value="1941">1941</option>
                                    <option value="1940">1940</option>
                                    <option value="1939">1939</option>
                                    <option value="1938">1938</option>
                                    <option value="1937">1937</option>
                                    <option value="1936">1936</option>
                                    <option value="1935">1935</option>
                                    <option value="1934">1934</option>
                                    <option value="1933">1933</option>
                                    <option value="1932">1932</option>
                                    <option value="1931">1931</option>
                                    <option value="1930">1930</option>
                                    <option value="1929">1929</option>
                                    <option value="1928">1928</option>
                                    <option value="1927">1927</option>
                                    <option value="1926">1926</option>
                                    <option value="1925">1925</option>
                                    <option value="1924">1924</option>
                                    <option value="1923">1923</option>
                                    <option value="1922">1922</option>
                                    <option value="1921">1921</option>
                                    <option value="1920">1920</option>
                                    <option value="1919">1919</option>
                                    <option value="1918">1918</option>
                                    <option value="1917">1917</option>
                                    <option value="1916">1916</option>
                                    <option value="1915">1915</option>
                                    <option value="1914">1914</option>
                                    <option value="1913">1913</option>
                                    <option value="1912">1912</option>
                                    <option value="1911">1911</option>
                                    <option value="1910">1910</option>
                                    <option value="1909">1909</option>
                                    <option value="1908">1908</option>
                                    <option value="1907">1907</option>
                                    <option value="1906">1906</option>
                                    <option value="1905">1905</option>
                                    <option value="1904">1904</option>
                                    <option value="1903">1903</option>
                                    <option value="1902">1902</option>
                                    <option value="1901">1901</option>
                                    <option value="1900">1900</option>
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
                                    required value="{{old('total_employees')}}">
                            </div>
                        </div>
                    </div>
                    {{-- bio --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Company Bio</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <textarea class="form-control" name="bio" rows="3" maxlength="255">{{old('bio')}}</textarea>
                            </div>
                        </div>
                    </div>
                    {{-- telephone --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Telephone</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="telephone" class="form-control"
                                    placeholder="e.g. +966112461111" required value="{{old('telephone')}}">
                            </div>
                        </div>
                    </div>
                    {{-- fax --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Fax</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="fax" class="form-control" placeholder="e.g. +966112461111"
                                    required value="{{old('fax')}}">
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
                    {{-- website --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Website</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="website" name="website" class="form-control" placeholder="www.company.com"
                                    value="{{old('website')}}">
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
                                    <option value="{{$country->name}}">{{$country->name}}</option>
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
                                    value="{{old('city')}}">
                            </div>
                        </div>
                    </div>
                    {{-- po_box --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">P.O. box</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="po_box" class="form-control" placeholder="" required
                                    value="{{old('po_box')}}">
                            </div>
                        </div>
                    </div>
                    {{-- zip_code --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">ZIP Code</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="zip_code" class="form-control" placeholder="" required
                                    value="{{old('zip_code')}}">
                            </div>
                        </div>
                    </div>
                    {{-- address --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Address</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="address" class="form-control" placeholder="" required
                                    value="{{old('address')}}">
                            </div>
                        </div>
                    </div>
                    {{-- location --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">location</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="text" name="location" class="form-control" placeholder="" required
                                    value="{{old('location')}}">
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
