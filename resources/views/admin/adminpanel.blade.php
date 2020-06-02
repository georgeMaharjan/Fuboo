@extends('layouts.master')

@section('title')
    Admin
@endsection
@section('content')

    @foreach($admin as $details)
        <div class="modal fade" id="editDetails" tabindex="-1" role="dialog" aria-labelledby="editDetailsTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="editDetailsTitle">Edit Details</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" >
                        <form action = "{{route('admin.update',Auth::user()->id)}}" enctype="multipart/form-data" method="POST" style="font-size:20px;" >
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label for="image" class="col-2 col-form-label">Select Image</label>
                                <div class="col-10">
                                    <input type="file" class="btn" id="image" name="image" style="font-size:20px;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-2 col-form-label">Email</label>
                                <div class="col-10">
                                    <div class="form-control-lg" style="font-size:20px;">
                                        {{$details->email}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-2 col-form-label">Name</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="name" name="name" value="{{$details->name}}" style="font-size:20px;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="number" class="col-2 col-form-label">Contact</label>
                                <div class="col-10">
                                    <input type="tel" class="form-control" id="inputEmail3" name="number" value="{{$details->number}}" style="font-size:20px;">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size:12px;">Close</button>
                                <button type="submit" class="btn btn-dark" style="font-size:12px;">Save changes</button>
                            </div>
                        </form >
                    </div>
                </div>
            </div>
        </div>
        {{--            edit--}}
    @endforeach
    {{--    breadcrumbs--}}
    <div class="content-header">
        <div class="container-fluid">
            <h1>Admin Dashboard</h1>
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    @foreach($admin as $details)
                                        @if($details->image)
                                            <img src = "{{asset($details->image)}}" style="height: 320px; width: 300px; vertical-align: top" alt = "" >
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