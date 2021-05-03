{{-- Extends layout --}}
@extends('layout.default')

@section('styles')
@endsection

{{-- Content --}}
@section('content')
    <div class="text-center my-20">
        <h1><b>Update Self</b></h1>
        <div class="my-10 row">
            <div class="col-3"></div>
            <div class="col-6 bg-white  text-center">
                <div class="col-12">
                    <div class="p-10 mt-10">
                        <form method="post" class="m-login__form m-form">
                            @csrf
                            <div class="form-group m-form__group">
                                <label for="username">Username</label>
                                <input class="form-control m-input" type="text" placeholder="Username" name="username" required value="{{$manager->username}}">
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
                                <button class="btn btn-outline-primary">Update</button>
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
