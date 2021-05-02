{{-- Extends layout --}}
@extends('layout.default')

@section('styles')
@endsection

{{-- Content --}}
@section('content')
    <div class="text-center my-20">
        <h1><b>Create New Car</b></h1>
        <div class="my-10 row">
            <div class="col-3"></div>
            <div class="col-6 bg-white  text-center">
                <div class="col-12">
                    <div class="p-10 mt-10">
                        <form method="post" class="m-login__form m-form">
                            @csrf
                            <div class="form-group m-form__group">
                                <label for="user_id">User</label>
                                <select class="form-control" id="user_id" name="user_id">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="make_id">Make</label>
                                <select class="form-control" id="make_id" name="make_id">
                                    @foreach($makes as $make)
                                        <option value="{{$make->id}}">{{$make->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="number">Number</label>
                                <input class="form-control m-input" type="text" placeholder="Number" name="number" required>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="number">Color</label>
                                <input class="form-control m-input" type="text" placeholder="Color" name="color" required>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="postcode">Postcode</label>
                                <input class="form-control m-input" type="text" placeholder="Postcode" name="postcode" required>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="type">Type</label>
                                <select class="form-control" name="type" id="type">
                                    <option value="suv">SUV</option>
                                    <option value="car">Car</option>
                                    <option value="truck">Truck</option>
                                </select>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="lat">LAT</label>
                                <input class="form-control m-input" type="text" placeholder="LAT" name="lat" id="lat" required>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="lng">LNG</label>
                                <input class="form-control m-input" type="text" placeholder="LNG" name="lng" id="lng" required>
                            </div>
                            <div class="m-login__account">
                                @if(!!$errors)
                                    @foreach($errors as $error)
                                        <span class="m-login__account-msg text-danger">
                                        {{$error}}
                                    </span>
                                        <br>
                                    @endforeach
                                @endif
                            </div>
                            <div class="m-login__form-action">
                                <button class="btn btn-outline-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-3"></div>
        </div>
    </div>
@endsection


@section('page-footer')
@endsection

{{-- Scripts Section --}}
@section('scripts')
@endsection
