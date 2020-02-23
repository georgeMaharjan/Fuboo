@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($details as $key)
            {{$key->name}}
        @endforeach
    </div>
@endsection