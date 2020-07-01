@extends('layouts.admin.master')
@section('page_title')
List of Services
<a href="{{route('service.create')}}" class="float-right fa fa-plus btn-circle btn-tnafos shadow"></a>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3 col-sm-6 mb-4">
        <div class="card h-100 shadow">
            <a href="{{route('service.create')}}" class="text-decoration-none">
                <div class="card-body text-center">
                    <i class="fa fa-plus fa-7x text-gray-300"></i>
                    <hr>
                    <h3 class="card-text text-muted ">Add New Service</h3>
                </div>
            </a>
        </div>
    </div>
    @foreach ($services as $service)
    <div class="col-lg-3 col-sm-6 mb-4">
        <div class="card h-100 shadow">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
                <h4 class="card-title">
                    <div class="row">
                        <div class="col-lg-12 pb-3">
                            <a class="font-weight-bold">{{$service->name}}</a>
                        </div>
                        <div class="col-auto">
                            <a class="text-success">Price</a>
                        </div>
                        <div class="col-auto">{{$service->pivot->rate}} S.R. / {{$service->unit}}</div>
                    </div>
                </h4>
                <p class="card-text">{{$service->description}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
