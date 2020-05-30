@extends('layouts.searchnav')

@section('content')
    <div>
        @foreach( $details as $detail )
            <body>
            <div id="carouselExampleIndicators" class="carousel slide mt-2" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        @if($detail->images)
                            <img src="{{asset($detail->images)}}" style="width: 100%; height: 50%" alt="...">
                        @else
                            <img src = "{{asset('images/ground.jpg')}}" style="width: 100%; height: 50%" alt = "">
                        @endif
                    </div>
                    {{--                <div class="carousel-item">--}}
                    {{--                    <img src="..." class="d-block w-100" alt="...">--}}
                    {{--                </div>--}}
                    {{--                <div class="carousel-item">--}}
                    {{--                    <img src="..." class="d-block w-100" alt="...">--}}
                    {{--                </div>--}}
                </div>
                <a class="carousel-control-prev " href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next " href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div>
                <h1>
                    {{$detail->name}}
                </h1>
                <h3>{{$detail->description}}</h3>
                <h3>{{$detail->address}}</h3>
                <h3>{{$detail->price}}</h3>
            </div>
            <hr>

            {{--            booking slots--}}
            <div class="container">
                <h2>Booking Slots</h2>
                <table class="table table-hover table-bordered table-responsive-lg">
                    <thead>
                    <tr>
                        <th> Date </th>
                        <th> Time Slot </th>
                        <th> Price </th>
                        <th> Book </th>
                    </tr>
                    @foreach($timeslots as $timeslot)
                        <tr >
                            <th > {{$timeslot -> date}}</th >
                            <th > {{$timeslot -> slots}}</th >
                            <th > {{$timeslot -> price}}</th >
                            <th >
                                <form action = "{{route('futsal.booking')}}" method="post">
                                    @csrf
                                    @auth()
                                        <input type = "hidden" value="{{$timeslot->id}}" name="time_slot_id">
                                        <input type = "hidden" value="{{Auth::user()->id}}" name="customer_id">
                                    @endauth
                                    <button type="submit" class="btn btn-black" >BOOK</button >
                                </form >
                            </th >
                        </tr >
                    @endforeach
                    </thead>
                </table>
            </div>
            </body>
        @endforeach
    </div>
@endsection