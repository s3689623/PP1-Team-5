{{-- Extends layout --}}
@extends('layout.default')

@section('styles')
    <style>
        .car {
            height: 100%;
            width: 100%;
        }
    </style>
@endsection

{{-- Content --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-custom card-stretch gutter-b">
                {{-- Header --}}
                <div class="card-header">
                    <h1>Welcome</h1>
                </div>

                {{-- Body --}}
                <div class="card-body pt-0">
                    {{-- Item --}}
                    <img src="{{ asset('media/share-bar/logo-large.png') }}" class="align-self-center" style="width: 250px;height: 150px"/>
                    <p>
                        Looking for a car in Australia? There are hundreds of cars belonging to the Shareber，Whether you're looking for a large car for a weekend away with friends, or something smaller for a trip to the supermarket, you can be sure to find the right car for you. With your free membership, you can choose from over 4,000 cars around the country. We have cars close to home, airports, and train stations to help you get around.

                        Shareber gives you access to a range of cars, including the latest hybrids, without the hassle of car ownership. Access cars by the hour or day, 24/7.

                        Choose the right car for every occasion, accessed when and where you need it - all run from a web page.
                    </p>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xxl-4">
            <div class="card card-custom card-stretch gutter-b">
                {{-- Header --}}
                <div class="card-header border-0">
                </div>

                {{-- Body --}}
                <div class="card-body pt-0">
                    {{-- Item --}}
                    <a href="{{url('member/car/list')}}">
                    <img src="{{ asset('media/share-bar/index-car-1.png') }}" class="align-self-center car"/>
                    </a>
                </div>
            </div>

        </div>

        <div class="col-lg-12 col-xxl-4">
            <div class="card card-custom card-stretch gutter-b">
                {{-- Header --}}
                <div class="card-header border-0">
                </div>

                {{-- Body --}}
                <div class="card-body pt-0">
                    {{-- Item --}}
                    <a href="{{url('member/car/list')}}">
                    <img src="{{ asset('media/share-bar/index-car-2.png') }}" class="align-self-center car"/>
                    </a>
                </div>
            </div>

        </div>

        <div class="col-lg-12 col-xxl-4">
            <div class="card card-custom card-stretch gutter-b">
                {{-- Header --}}
                <div class="card-header border-0">
                </div>

                {{-- Body --}}
                <div class="card-body pt-0">
                    {{-- Item --}}
                    <a href="{{url('member/car/list')}}">
                        <img src="{{ asset('media/share-bar/index-car-3.png') }}" class="align-self-center car"/>
                    </a>
                </div>
            </div>

        </div>

        <div class="col-lg-12 col-xxl-4">
            <div class="card card-custom card-stretch gutter-b">
                {{-- Header --}}
                <div class="card-header border-0">
                </div>

                {{-- Body --}}
                <div class="card-body pt-0">
                    {{-- Item --}}
                    <a href="{{url('member/car/list')}}">
                    <img src="{{ asset('media/share-bar/index-car-4.png') }}" class="align-self-center car"/>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
@endsection
