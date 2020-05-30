@extends('layouts.searchnav')

@section('content')
    <div class="container pt-5 mt-5">
        <p>{{$results->count()}} results(s) for {{request()->input('query')}}</p>

        <div class="row">
            @foreach($results as $result)
                <div class="col-md-4 mb-4">
                    <div class="card no-radius">
                        <a href = "{{route('futsal.details',$result->name)}}" class="text-dark " >
                            @if($result->images)
                                <img src="{{asset($result->images)}}" class="card-img-top">
                            @else
                                <img src = "{{asset('images/ground.jpg')}}" class="card-img-top">
                            @endif
                            <div class="card-body">
                                <h1>{{$result -> name}}</h1>
                                <h2>{{$result -> address}}</h2>
                                <h2>{{$result -> price}}</h2>
                            </div>
                        </a >
                        <div class="btn btn-black">
                            Book
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
