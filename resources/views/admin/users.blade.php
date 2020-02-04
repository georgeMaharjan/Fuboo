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
                    <h1 class="m-0 text-dark">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="card-deck">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Players</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <table class="table table-hover table-bordered table-responsive-lg">
                            <thead>
                            <tr>
                                <th> SNo. </th>
                                <th> Name </th>
                                <th> Email</th>
                                <th> Contact </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>asdsc</td>
                                <td>as</td>
                                <td>sa</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Owners</h3>
                        <button type="button" class="btn btn-dark ml-2"> Add </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <table class="table table-hover table-bordered table-responsive-lg">
                            <thead>
                            <tr>
                                <th> SNo. </th>
                                <th> Name </th>
                                <th> Email</th>
                                <th> Contact </th>
                                <th> Futsal </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>asdsc</td>
                                <td>as</td>
                                <td>sa</td>
                                <td>as</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    {{--    end breadcrumbs--}}

@endsection