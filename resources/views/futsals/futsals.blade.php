@extends('layouts.searchnav')

<style >
    .card:hover{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        -moz-transition-duration: 0.3s;
    }
</style >
@section('content')

    <!-- Booking Modal -->
    @foreach($futsals as $futsal)
        <div class="modal fade" id="BookModal{{$futsal -> id}}" tabindex="-1" role="dialog" aria-labelledby="BookModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="BookModalTitle">futsal name</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-responsive-lg">
                            <thead>
                            <tr>
                                <th> Date </th>
                                <th> Time Slot </th>
                                <th> Price </th>
                                <th> Book </th>
                            </tr>
                            @foreach($timeslots as $timeslot)
                                @if($timeslot->futsal_id == $futsal -> id)
                                    <tr >
                                        <th > {{$timeslot -> date}}</th >
                                        <th > {{$timeslot -> slots}}</th >
                                        <th > {{$timeslot -> price}}</th >
                                        <th >
                                            <button class="btn btn-black" >BOOK</button >
                                        </th >
                                    </tr >
                                @endif
                            @endforeach
                            </thead>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="container-fluid mt-5 ">
        <div class="row">
            @foreach($futsals as $futsal)
                <div class="col-4 mb-4">
                    <div class="card no-radius" style="height:540px;">
                        <a href = "{{route('futsal.details',$futsal->name)}}" class="text-dark " >
                            @if($futsal->images)
                                <img src="{{asset($futsal->images)}}" class="card-img-top">
                            @else
                                <img src = "{{asset('images/ground.jpg')}}" class="card-img-top">
                            @endif
                            <div class="card-body" style="height:220px; ">
                                <h1>{{$futsal -> name}}</h1>
                                <h2>{{$futsal -> address}}</h2>
                                <h2>{{$futsal -> price}}</h2>
                            </div>
                        </a >
                        <div class="btn btn-black card-footer" data-backdrop="static" data-toggle="modal" data-target="#BookModal{{$futsal -> id}}">
                            Book
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
