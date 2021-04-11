{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    <!--begin::Login-->
    <div class="text-center col-lg-6 ml-auto mr-auto mt-lg-48">
        <div class="m-auto">
            <h1 class="text-primary">Login In</h1>
            <p class="text-muted font-weight-bold">Admin system</p>
            <form class="form" method="post">
                @csrf
                <div class="form-group">
                    <input class="form-control h-auto text-primary rounded-pill border-0 py-4 px-8" type="text" placeholder="Username" name="username" required/>
                </div>
                <div class="form-group">
                    <input class="form-control h-auto text-primary rounded-pill border-0 py-4 px-8" type="password" placeholder="Password" name="password" required/>
                </div>
                @if(isset($errors))
                    @foreach($errors as $error)
                        <div class="alert alert-danger" role="alert">{{$error}}</div>
                    @endforeach
                @endif
                <div class="form-group mt-10">
                    <button class="btn btn-pill btn-primary opacity-90 px-15 py-3">Login In</button>
                </div>
            </form>
        </div>
    </div>
    <!--end::Login-->
@endsection

{{-- Styles Section --}}
@section('styles')
@endsection


{{-- Scripts Section --}}
@section('scripts')
@endsection