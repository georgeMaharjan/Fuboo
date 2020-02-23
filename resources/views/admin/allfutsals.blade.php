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
            <div class="card-deck">
                <div class="card col-md-9">
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Time Slots</h3>
                        <button class="btn btn-dark ml-2" data-toggle="modal" data-target="#addSlot">Add Slot</button >
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <table class="table table-hover table-bordered table-responsive-lg">
                            <thead>
                            <tr>
                                <th> SNo. </th>
                                <th> Time Slot </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($time as $index => $slot)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$slot->slots}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                {{--add owners--}}
                <div class="modal fade" id="addSlot" data-backdrop="static" tabindex="-1" role="dialog"
                     aria-labelledby="addSlotTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addSlotTitle">Add new Owner</h5>
                            </div>
                            <form method="POST" class="p-5" action='{{route('timeslots.store')}}'>
                                @csrf
                                <div class="form-group">
                                    <label for="slot" >Slots</label>
                                    <input id="slot" type="text" class="form-control @error('slot') is-invalid @enderror" name="slot" value="{{ old('slot') }}" required autocomplete="slot" autofocus>
                                    @error('slot')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-dark">
                                    Add Time Slot
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                {{--end add owners--}}

            </div>
        </div><!-- /.container-fluid -->
    </div>
    {{--    end breadcrumbs--}}

@endsection