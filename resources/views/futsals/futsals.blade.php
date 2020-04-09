@extends('layouts.searchnav')

<style >
    .card:hover{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        -moz-transition-duration: 0.3s;
    }
</style >
@section('content')
    <div class="container-fluid mt-5 ">
        <div class="row">
            @foreach($futsals as $futsal)
                <div class="col-md-4 mb-4">
                    <div class="card no-radius">
                        <a href = "{{route('futsal.details',$futsal->name)}}" class="text-dark " >
                            <div class="card-body">
                                {{$futsal -> name}}
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
