@extends('layouts.search.master')

@section('content')

<div id="content" class="container">
    <div class="row py-5">
        <div class="col-md-3">
            <div class="row mr-2">
                <div class="card mb-5 mb-lg-0 w-100">
                    <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase text-center">Purchase Request List</h5>
                        <hr>
                        <ul class="fa-ul">
                            @if ($list)
                            @foreach ($list as $item)
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>{{$item['service']['name']}}</li>
                            @endforeach
                            @else
                            <h3 class="text-gray-400">List is empty</h3>
                            @endif
                        </ul>
                        <a href="{{route('list')}}" class="btn btn-block btn-primary text-uppercase">View List</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <h3>Filters</h3>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @foreach ($services as $service)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="card h-100 shadow">
                        <a href="#"><img class="card-img-top" src="https://placehold.it/700x400" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title text-center">
                                <a href="#">{{$service->name}}</a>
                            </h4>
                            <p class="card-text">{{$service->description}}</p>
                            <a href="{{route('addToList', $service->id)}}"
                                class="btn btn-block btn-tnafos rounded-pill">Add to List</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
