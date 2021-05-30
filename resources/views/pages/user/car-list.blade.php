{{-- Extends layout --}}
@extends('layout.default')

@section('google-script')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&callback=initMap&libraries=&v=weekly" defer></script>
@endsection

@section('styles')
    <style type="text/css">
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 50%;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
@endsection

{{-- Content --}}
@section('content')
    <div id="map"></div>
    <div class="card card-custom gutter-b">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table" id="car-list">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>Make</th>
                    <th>Type</th>
                    <th>Color</th>
                    <th>User</th>
                    <th>Postcode</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cars as $car)
                    <tr>
                        <td>{{$car->number}}</td>
                        <td>{{$car->make->name}}</td>
                        <td>{{$car->type}}</td>
                        <td>{{$car->color}}</td>
                        <td>{{$car->user->first_name}} {{$car->user->last_name}}</td>
                        <td>{{$car->postcode}}</td>
                        <td>{{$car->created_at}}</td>
                        <td>{{$car->updated_at}}</td>
                        <td>
                            <a href="{{url('/member/order/new/' . $car->id)}}" class="btn btn-primary mr-2">Order</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{asset('plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script>
        // begin first table
        $('#car-list').DataTable({
            responsive: true,

            lengthMenu: [5, 10, 25, 50],

            pageLength: 7,

            // Order settings
            order: [[1, 'desc']],
        });
    </script>


    <script>
        "use strict";

        function initMap() {
            // Map
            const qv = new google.maps.LatLng({{env('DEFAULT_LAT')}}, {{env('DEFAULT_LNG')}});
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: qv
            });

            // User
            const userInfo = new google.maps.InfoWindow({
                content: "Your position is QV"
            });
            const userMarker = new google.maps.Marker({
                position: qv,
                map,
                title: "Your position"
            });
            userMarker.addListener("click", () => {
                userInfo.open(map, userMarker);
            });

            // Cars
            var cars = [];
            @foreach($cars as $car)
            cars.push([
                new google.maps.Marker({
                    position: new google.maps.LatLng({{$car->lat}}, {{$car->lng}}),
                    map,
                    title: "{{$car->number}}"
                }),
                new google.maps.InfoWindow({
                    content:
                        '<div id="content">' +
                        '<div id="siteNotice">' +
                        "</div>" +
                        '<h1 class="firstHeading">{{$car->number}}</h1>' +
                        '<div>' +
                        "<p><b>Make: </b>{{$car->make->name}}</p>" +
                        "<p><b>Type: </b>{{$car->type}}</p>" +
                        "<p><b>Color: </b>{{$car->color}}</p>" +
                        "<p><b>Status: </b>{{$car->status}}</p>" +
                        "<p><b>Owner: </b>{{$car->user->first_name}} {{$car->user->last_name}}</p>" +
                            @if($car->status == 'free')
                            `<a href="{{url('/member/order/new/' . $car->id)}}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">Order</a>` +
                            @elseif($car->status == 'ordered')
                            `<button class="btn btn-metal m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air" disabled>Ordered</button>` +
                            @endif
                                "</div>" +
                        "</div>"
                })
            ]);
                    @endforeach
            for(let i = 0; i < cars.length; i++) {
                cars[i][0].addListener("click", () => {
                    cars[i][1].open(map, cars[i][0]);
                });
            }

            // Parkings
            var parkings = [];
            @foreach($parkings as $parking)
            parkings.push([
                new google.maps.Marker({
                    position: new google.maps.LatLng({{$parking->lat}}, {{$parking->lng}}),
                    map,
                    title: "{{$parking->name}}"
                }),
                new google.maps.InfoWindow({
                    content:
                        '<div id="content">' +
                        '<div id="siteNotice">' +
                        "</div>" +
                        '<h1 class="firstHeading">{{$parking->name}}</h1>' +
                        '<div>' +
                        "<p><b>Address: </b>{{$parking->address}}</p>" +
                        "</div>"
                })
            ]);
                    @endforeach
            for(let i = 0; i < parkings.length; i++) {
                parkings[i][0].addListener("click", () => {
                    parkings[i][1].open(map, parkings[i][0]);
                });
            }
        }

        initMap()
    </script>
@endsection
