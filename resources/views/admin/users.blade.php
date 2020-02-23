@extends('layouts.master')

@section('title')
    Users
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
                            @foreach($players as $index=>$player)
                                <tbody>
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$player->name}}</td>
                                    <td>{{$player->email}}</td>
                                    <td>{{$player->number}}</td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Owners</h3>
                        <button class="btn btn-dark ml-2" data-toggle="modal" data-target="#addOwner">Add</button>
                        {{--add owners--}}
                        <div class="modal fade" id="addOwner"  tabindex="-1" role="dialog"
                             aria-labelledby="addOwnerTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addOwnerTitle">Add new Owner</h5>
                                    </div>

                                    <form method="POST" action="{{route('addOwner')}}">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="type" value="owner">
                                            <input type = "hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <div class="form-group">
                                                <label for="name" >{{ __('Name') }}</label>
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>

                                            <div class="form-group ">
                                                <label for="email" >{{ __('E-Mail Address') }}</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>

                                            <div class="form-group ">
                                                <label for="futsal" >Futsal</label>
                                                <input id="futsal" type="futsal" class="form-control @error('futsal') is-invalid @enderror" name="futsal" value="{{ old('futsal') }}" required autocomplete="futsal">
                                                @error('futsal')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>

                                            <div class="form-group ">
                                                <label for="password">{{ __('Password') }}</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>

                                            <div class="form-group ">
                                                <label for="password-confirm" class=" text-md-right">{{ __('Confirm Password') }}</label>

                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-dark">
                                                    {{ __('Register Owner') }}
                                                </button>
                                                <button type="button" class=" btn btn-outline-danger" data-dismiss="modal" aria-label="Close">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--end add owners--}}

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
                            @foreach($owners as $index => $owner)
                                <tbody>
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$owner->name}}</td>
                                    <td>{{$owner->email}}</td>
                                    <td>{{$owner->number}}</td>
                                    <td>{{$owner->futsal->name}}</td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    {{--    end breadcrumbs--}}
@endsection