@extends('layouts.search.master')

@section('content')

<main role="main">
    @if (!$services)
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Hmm.. There is no Items in your List!</h1>
            <p>you can click here to go back and addd some items</p>
            <p><a class="btn btn-primary btn-lg" href="/" role="button">Search »</a></p>
        </div>
    </div>
    @else
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Items in your List!</h1>
            <p>all the items that are below are available from many vendore we have partnership with, if you need any
                help please click the button below</p>
            <p><a class="btn btn-primary btn-lg" href="" role="button">Support »</a></p>
        </div>
    </div>

    <div class="container mb-4">
        <form action="{{action('PurchaseRequestController@store')}}" method="post">

            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th scope="col"> # </th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Description</th>
                            <th> </th>
                        </thead>
                        <tbody>
                            @csrf
                            {{-- if services exist show in table else skip --}}
                            @if ($services)
                            <p class="d-none">{{$i = 1}}</p>
                            @foreach ($services as $key => $service)
                            <tr>
                                <td>{{$i}}</td>
                                <input type="text" name="services[]" hidden value="{{$service['service']['id']}}">
                                <td class="font-weight-bold">
                                    {{$service['service']['name']}}</td>
                                <td>{{$service['service']['description']}}</td>
                                <td class="text-right"><a class="btn btn-sm btn-danger text-white" href=""><i
                                            class="fa fa-trash"></i>
                                    </a></td>
                            </tr>
                            <p class="d-none">{{$i++}}</p>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="endDate">Request End Date</label>
                <input class="form-control border-1" type="date" name="date" id="date" value="">
            </div>
            <div class="form-group">
                <label for="comments">Comments</label>
                <textarea class="form-control border-1" name="details" id="comments" cols="30" rows="5"></textarea>
            </div>

            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <button type="submit" class="btn btn-block btn-secondary">Cancel</button>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <button class="btn btn-block btn-success text-uppercase">Send Request</button>
                    </div>
                </div>
            </div>
        </form>
    </div> <!-- /container -->
    @endif
</main>
@endsection

@section('page_script')
<script>

</script>
@endsection
