@extends('layouts.admin.master')
@section('page_title')
this should shows the list of company users
@endsection
@section('content')
<div class="row">
    @foreach ($company->users as $user)
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow border-bottom-tnafos">
            <img src="https://source.unsplash.com/9UVmlIb0wJU/500x350" class="card-img-top" alt="...">
            <div class="card-body text-center">
                <h5 class="card-title mb-0">{{$user->first_name}} {{$user->last_name}}</h5>
                <div class="card-text text-primary font-weight-bold">{{$user->email}}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
