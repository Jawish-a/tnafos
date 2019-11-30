@extends('layouts.admin.master')
@section('page_title')
Categories
<a href="{{route('category.create')}}" class="float-right fa fa-plus btn-circle btn-tnafos shadow"></a>

@endsection
@section('content')
<div class="row">
    @foreach ($categories as $category)
    <div class="col-lg-3 col-sm-6 mb-3">
        <div class="card h-100 shadow">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
                <h5 class="card-title">{{$category->name}}</h5>
                <p class="card-text">{{count($category->services)}} Servies</p>
                <p class="card-text">{{count($category->companies)}} Companies </p>
                <a href="#" class="btn btn-primary btn-block rounded-pill">Edit</a>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection
