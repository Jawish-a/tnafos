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
                            {{-- @if ($list)
                            @foreach ($list as $item)
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>{{$item['service']['name']}}
                            </li>
                            @endforeach
                            @else
                            <h3 class="text-gray-400">List is empty</h3>
                            @endif --}}
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
                <h3>list of companies that provide this service</h3>
                <hr class="py-3">
                <div class="card shadow">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="#"><img class="card-img-top" src="https://placehold.it/700x400" alt=""></a>
                        </div>
                        <div class="col-md-8 card-body">
                            <p class="card-text">ldksldks</p>
                            <a href="#" class="btn btn-block btn-tnafos rounded-pill">Add to List</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
