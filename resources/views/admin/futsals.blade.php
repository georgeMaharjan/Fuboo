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
                            <th> SNo. </th>
                            <th> Futsal Name </th>
                            <th> Owner Name</th>
                            <th> Contact </th>
                            <th> Location </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>asdsc</td>
                            <td>as</td>
                            <td>sa</td>
                            <td>as</td>
                            <td>
                                <div class="dropdown dropleft">
                                    <i class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" >
                                    </i>
                                    <div class="dropdown-menu ">
                                        <button class="btn">Verify</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
    {{--    end breadcrumbs--}}

@endsection