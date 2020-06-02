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
        margin: -150px 0 0 0;
    }

</style >
@section('content')
    <body class="container-md mt-5 p-0 mb-5">
    <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                @foreach($images as $image)
                    <li data-target=".carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @forelse( $images as $image )
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }} crop">
                        <img src="{{ is_null($image->image) ? asset('images/ground.jpg') : asset($image->image) }}" class="d-block w-100" alt="..." height="auto" width="100%">
                    </div>
                @empty
                    <img src="{{asset('images/ground.jpg')}}" class="d-block w-100" alt="..." height="auto" width="100%">
                @endforelse
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
        <div class="row mt-3">
            <div class="col-md-4 ">
                <h1>
                    Futsal Name:
                    {{$detail->name}}
                </h1>

                <h3>
                    Address:
                    {{$detail->address}}
                </h3>

                <h3>
                    Price:
                    {{$detail->price}}
                </h3>
                <h3>
                    Description:
                    {{$detail->description}}
                </h3>
                @if($detail->status=='open')
                    <h2>
                        Status:
                        Open
                    </h2>
                @else
                    <h2>Status:</h2>
                    <button disabled class="btn btn-dark" >Futsal is closed</button >
                @endif
            </div>
            @if($detail->latitude)
                <h2>Find me here</h2>
                <hr >
                <iframe src="https://maps.google.com/maps?q={{$detail->latitude}}, {{$detail->longitude}}&z=17&output=embed" width="100%" height="300px" frameborder="10" style="border:0"></iframe>
            @else
                <h2>No map available</h2>
            @endif
        </div>
        <hr>
        <div>
            {{--            booking slots--}}
            <div class="container-md">
                <h2>Booking Slots</h2>
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
                            <tr >
                                <th > {{$timeslot -> date}}</th >
                                <th > {{$timeslot -> slots}}</th >
                                <th > {{$timeslot -> price}}</th >
                                <th >
                                    <input type = "checkbox" name = "timeslots[]" value="{{$timeslot->id}}">
                                </th >
                            </tr >
                        @endforeach
                        </thead>
                    </table>
                    @if($detail->status=='open')
                        <button type="submit" class="btn btn-black" >BOOK</button >
                    @else
                        <button disabled class="btn btn-dark" >Futsal is closed</button >
                    @endif
                </form >
            </div>
    @endforeach
    </body>
@endsection