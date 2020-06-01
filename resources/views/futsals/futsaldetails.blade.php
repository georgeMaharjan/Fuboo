@extends('layouts.searchnav')
<style >
    .crop {
        width: 100%;
        height: 75%;
        overflow: hidden;
    }

    .crop img {
        width: 100%;
        height: auto;
        margin: -150px 0 0 -10px;
    }

</style >
@section('content')
    <body class="mt-5">
    <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                @foreach($images as $image)
                    <li data-target=".carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach( $images as $image )
                    @if($image->image)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }} crop">
                            <img src="{{ asset($image->image) }}" class="d-block w-100" alt="..." height="auto" width="100%">
                        </div>
                    @else
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }} crop">
                            <img src="{{asset('/images/ground.jpg')}}" class="d-block w-100">
                        </div>
                    @endif
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    @foreach( $futsal as $detail )
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
@endsection