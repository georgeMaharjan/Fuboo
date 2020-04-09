@extends('layouts.searchnav')

@section('content')
    <div class="container pt-5 mt-5">
        @foreach($results as $result)
            {{$result->name}}
        @endforeach
    </div>
@endsection
