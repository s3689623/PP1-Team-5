{{-- Extends layout --}}
@extends('layout.default')
<link href="{{asset('customize/css/member-login.css')}}" rel="stylesheet" type="text/css"/>
{{-- Styles Section --}}
@section('styles')
@endsection

{{-- Content --}}
@section('content')
    <div class="text-center my-20">
        <h1><b>Create New User</b></h1>
        <div class="my-10 row">
            <div class="col-3"></div>
            <div class="col-6 bg-white  text-center">
                <div class="col-12">
                    <div class="p-10 mt-10">
                        <form method="post" class="m-login__form m-form">
                            @csrf
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="email" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="text" placeholder="First Name" name="first-name" required>
                            </div>
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="text" placeholder="Last Name" name="last-name" required>
                            </div>
                            <div class="form-group m-form__group">
                                <input class="form-control m-input" type="password" placeholder="Password" name="password" required>
                            </div>
                            <div class="form-group m-form__group">
                                <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" name="confirm-password" required>
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
