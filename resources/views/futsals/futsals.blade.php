@extends('layouts.searchnav')

<style >
    .card:hover{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.7);
        -moz-transition-duration: 0.3s;

    }
    .bg-black{
        background-color: black;
    }
</style >
@section('content')
<body >
    <!-- Booking Modal -->
    @foreach($futsals as $futsal)
        <div class="modal fade" id="BookModal{{$futsal -> id}}" tabindex="-1" role="dialog" aria-labelledby="BookModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="BookModalTitle">{{$futsal->name}}</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <form action = "{{route('futsal.booking')}}" method="post">
                            <h4>Available Time Slots</h4>
                            <table class="table table-hover table-bordered table-responsive-lg">
                                <thead>
                                <tr>
                                    <th> Date </th>
                                    <th> Time Slot </th>
                                    <th> Price </th>
                                    <th> Book </th>
                                </tr>
                                @csrf
                                @auth()
                                    <input type = "hidden" value="{{Auth::user()->id}}" name="customer_id">
                                    <input type = "hidden" value="booked" name="status">
                                @endauth
                                @foreach($timeslots as $timeslot)
                                    @if($timeslot->futsal_id == $futsal -> id)
                                        <tr >
                                            <th > {{$timeslot -> date}}</th >
                                            <th > {{$timeslot -> slots}}</th >
                                            <th > {{$timeslot -> price}}</th >
                                            <th >
                                                <input type = "checkbox" name = "timeslots[]" value="{{$timeslot->id}}">
                                            </th >
                                        </tr >
                                    @endif
                                @endforeach
                                </thead>
                            </table>
                            <button type="submit" class="btn btn-black" >BOOK</button >
                        </form >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="container-fluid mt-5 ">
        <h1>Browse Futsals</h1>
        <hr >
        <div class="row">
            @foreach($futsals as $futsal)
                <div class="col-3 mb-4">
                    <div class="card no-radius " style="height:470px;">
                        <a href = "{{route('futsal.details',$futsal->name)}}" class="text-dark " style="text-decoration: none" >
                            <img src = "{{asset('images/ground.jpg')}}" class="card-img-top">
                            <div class="card-body" style="height:220px; ">
                                <h2>{{$futsal -> name}}</h2>
                                <h3>{{$futsal -> address}}</h3>
                                <h3>{{$futsal -> price}}</h3>
                                <h3>{{$futsal -> status}}</h3>
                            </div>
                        </a >
                        @if($futsal->status=='open')
                            <div class="btn btn-black card-footer" data-backdrop="static" data-toggle="modal" data-target="#BookModal{{$futsal -> id}}">
                                Book
                            </div>
                        @elseif($futsal->status=='closed')
                            <div class="card-footer btn btn-black ">
                                CLOSED
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="signup-section text-light" style="align-content: center">
    </div>
</body>
@endsection
