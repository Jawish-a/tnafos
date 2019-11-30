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
                <h6 class="m-0 font-weight-bold text-primary">Category Details</h6>
            </div>
            <div class="card-body">
                {{-- form starts here --}}
                <form method="post" action="{{action('CategoryController@store')}}" class="form-horizontal"
                    id="user_form">
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
                    {{-- type --}}
                    <div class="row">
                        <label class="col-sm-2 col-form-label text-md-right">Type</label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <select class="form-control" name="category_id" id="type">
                                    <option value="" disabled selected>Please Select One</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
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
