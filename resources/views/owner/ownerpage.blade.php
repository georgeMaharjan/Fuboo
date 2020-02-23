@extends('layouts.olayouts')

@section('title')
    Owner
@endsection
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 50%;
    }
    .pac-container{
        z-index: 22222 !important;
    }
</style>
@section('content')
    {{--    breadcrumbs--}}
    <div class="content-header">
        <div class="container-fluid">
            @foreach( $futsal as $detail )
                <body>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            @if($detail->images)
                                <img src="{{asset($detail->images)}}" alt="...">
                            @else
                                <img src = "{{asset('images/defaultfutsal.jpg')}}" alt = "" >
                            @endif
                        </div>
                        {{--                <div class="carousel-item">--}}
                        {{--                    <img src="..." class="d-block w-100" alt="...">--}}
                        {{--                </div>--}}
                        {{--                <div class="carousel-item">--}}
                        {{--                    <img src="..." class="d-block w-100" alt="...">--}}
                        {{--                </div>--}}
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div  class="container">
                    <button type="button" class="btn btn-dark mt-3" data-toggle="modal" data-target="#editFutsal">
                        Edit Futsal
                    </button>
                    <h1>
                        {{$detail->name}}
                    </h1>
                    <h3>{{$detail->description}}</h3>
                    <h3>{{$detail->address}}</h3>
                    <h3>{{$detail->price}}</h3>
                </div>
                </body>
            @endforeach

            <div class="card">
                <h5 class="card-header">Booking Slots</h5>
                <div class="card-body ">
                    <table class="table table-hover table-bordered table-responsive-lg">
                        <thead>
                        <tr>
                            <th> SNo. </th>
                            <th> Time Slot </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <button class="btn btn-dark"> Edit  </button >
                                <button class="btn btn-dark"> Delete </button >
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    {{--    end breadcrumbs--}}
    <!-- end Modal edit Futsal -->
    <div class="modal fade" id="editFutsal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editFutsalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFutsalTitle">Edit Futsal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @foreach($futsal as $detail)
                    <div class="modal-body">
                        <form method="post" action="{{route('futsal.update',$detail->id)}}" enctype="multipart/form-data">
                            @csrf
                            {{method_field('PUT')}}
                            {{--location--}}
                            <input type="text" class="form-control mb-2" id="search" placeholder="Search....">
                            <div id="map" class="mb-3">
                            </div>
                            <input type = "text" name="display_address" class="form-control mt-1 mb-1" disabled>
                            <input type = "hidden" name="address_line_1" >
                            <input type = "hidden" name="longitude">
                            <input type = "hidden" name="latitude">
                            {{--                                 name--}}

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{$detail->name}}" >
                            </div>

                            {{--                        price--}}
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" type="text" class="form-control" name="price" value="{{$detail->price}}" required>
                            </div>

                            <div class="form-group">
                                <label for="image">{{ __('Select Image:') }}</label>
                                <input type="file" id="image" name="image" class="form-control" accept="image/*" multiple>
                            </div>
                            {{--                        description--}}
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control" name="description" placeholder="Description" rows="4" style="resize: none">{{$detail->description}}</textarea>
                            </div>
                            <div class="form-group ">
                                <div class="">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-dark pl-3 pr-3">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{--            end Modal edit Futsal--}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
        $('#editFutsal').on('show.bs.modal', function(e){
            $('#editFutsalTitle').trigger('focus');
            var modal = $(this);
            initMap('map', modal, 27.7059, 85.3340);
        });
        var infoWindow,map;
        function initMap(mapElementId, card, a = 27.7059, b = 85.3340) {
            var diff = 0.1000;
            //map options
            var options = {
                zoom:17,
                center:{lat:a, lng:b},
            };
            var restriction = {
                componentRestrictions: {country: 'np'}
            };
            var infowindow = new google.maps.InfoWindow();
            var infowindowContent = document.getElementById('infowindow-content');
            infowindow.setContent(infowindowContent);
            var markerCoordinates= {lat:a, lng:b};
            //new map
            map = new google.maps.Map(document.getElementById(mapElementId), options);
            var input = document.getElementById('search');
            var searchBox = new google.maps.places.Autocomplete(input, restriction);
            var marker = new google.maps.Marker({
                map:map,
                position: markerCoordinates,
                draggable: true,
            });
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({latLng:marker.getPosition()},function (result ,status){
                if('OK'===status){
                    address = result[0].formatted_address;
                    card.find('input[name=address_line_1]').val(address);
                    card.find('input[name=display_address]').val(address);
                }
            });
            map.addListener('bounds_changed',function(){
                searchBox.setBounds(map.getBounds());
            });
            searchBox.addListener('place_changed', function() {
                infowindow.close();
                marker.setVisible(false);
                var place = searchBox.getPlace();
                if (!place.geometry) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }
                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }
                card.find('input[name=address_line_1]').val(address);
                card.find('input[name=display_address]').val(address);
                card.find('input[name=latitude]').val(place.geometry.location.lat());
                card.find('input[name=longitude]').val(place.geometry.location.lng());
            });
            google.maps.event.addListener(marker, 'dragend', function(e) {
                displayPosition(this.getPosition());
                geocoder.geocode({latLng:marker.getPosition()},function (result ,status){
                    if('OK'===status){
                        address = result[0].formatted_address;
                        card.find('input[name=address_line_1]').val(address);
                        card.find('input[name=display_address]').val(address);
                    }
                    console.log(address);
                })
            });
            function displayPosition(pos) {
                card.find('input[name=latitude]').val(pos.lat());
                card.find('input[name=longitude]').val(pos.lng());
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9_-5XwAG2EqiuzpFLEUK0ZX-P5Bgm9Yk&libraries=places" async defer></script>
@endsection
