@extends('layouts.admin.master')
@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <a class="settings" href="{{url('settings/categories')}}">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Catgories</div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

</div>
@endsection
