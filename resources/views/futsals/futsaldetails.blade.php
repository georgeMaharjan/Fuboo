@extends('layouts.searchnav')

@section('content')
    <div class="container mt-5">
        @foreach($details as $key)
           <h2> {{$key->name}} </h2>
        @endforeach
    </div>
@endsection