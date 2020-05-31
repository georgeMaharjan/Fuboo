@extends('layouts.master')

@section('title')
    Admin
@endsection
@section('content')

    {{--    breadcrumbs--}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    @foreach($admin as $details)
                                        @if($details->image)
                                            <img src = "{{asset($details->image)}}" style="height: 220px; width: 200px; vertical-align: top" alt = "" >
                                        @else
                                            <img src = "{{asset('images/default.png')}}" style="height: 220px; width: 200px; vertical-align: top" alt = "" >
                                        @endif
                                        <div class="d-inline-block ml-4">
                                            <h1>
                                                Name:
                                                {{$details->name}}
                                            </h1>
                                            <h1>
                                                Email:
                                                {{$details->email}}
                                            </h1>
                                            <h1>
                                                Contact Number:
                                                {{$details->number}}
                                            </h1>
                                            <h1>
                                                Games Played:
                                                -------
                                            </h1>
                                            <h1>
                                                Reward Games:
                                                -------
                                            </h1>
                                            <button type = "submit" class="btn btn-dark" data-toggle="modal" data-target="#editDetails">Edit</button >
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    {{--    end breadcrumbs--}}

@endsection