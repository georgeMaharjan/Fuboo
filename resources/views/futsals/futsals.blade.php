@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach($futsals as $futsal)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href = "{{route('futsal.details',$futsal->name)}}" class="text-dark " >
                            <div class="card-body">
                                {{$futsal -> name}}
                            </div>
                        </a >
                        <div class="card-footer btn-success btn">
                            Book
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
