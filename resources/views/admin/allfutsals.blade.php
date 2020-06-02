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
                    <h1 class="m-0 text-dark">Futsals</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Futsal</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Futsals</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">
                    <table class="table table-hover table-bordered table-responsive-lg">
                        <thead>
                        <tr>
                            <th> Futsal Name </th>
                            <th> Location </th>
                            <th> Price </th>
                            <th> Status </th>
                        </tr>
                        </thead>
                        @foreach($futsals as $futsal)
                            <tbody>
                            <tr>
                                <td>{{$futsal->name}}</td>
                                <td>{{$futsal->address}}</td>
                                <td>{{$futsal->price}}</td>
                                <td>{{$futsal->status}}</td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
    {{--    end breadcrumbs--}}

@endsection