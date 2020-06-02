@extends('layouts.searchnav')

<style>
    .card:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        -moz-transition-duration: 0.3s;
    }
</style>
@section('content')

    <!-- Booking Modal -->
    @foreach($results as $result)
        <div class="modal fade" id="BookModal{{$result -> id}}" tabindex="-1" role="dialog" aria-labelledby="BookModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="BookModalTitle">{{$result->name}}</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <form action = "{{route('futsal.booking')}}" method="post">

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
                                    @if($timeslot->futsal_id == $result -> id)
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
    <div class="mt-5 container-md">
        @if($results->count()>0)
            <h4 style="font-weight: bold">{{$results->count()}} results(s) for {{request()->input('query')}}</h4>
        @else
            <h3>No results found</h3>
        @endif
            <hr class="mb-4">
        <div class="row">
            @foreach($results as $result)
                <div class="col-4 mb-4">
                    <div class="card no-radius" style="height:540px;">
                        <a href="{{route('futsal.details',$result->name)}}" class="text-dark ">
                            <img src = "{{asset('images/ground.jpg')}}" class="card-img-top">
                            <div class="card-body" style="height:220px; ">
                                <h1>{{$result -> name}}</h1>
                                <h2>{{$result -> address}}</h2>
                                <h2>{{$result -> price}}</h2>
                            </div>
                        </a >
                        <div class="btn btn-black card-footer" data-backdrop="static" data-toggle="modal" data-target="#BookModal{{$result -> id}}">
                            Book
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

