{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <a href="{{url('/admin/manager/new')}}" class="btn btn-outline-primary">Add New Manager</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($managers as $manager)
                    <tr>
                        <th scope="row">{{$manager->username}}</th>
                        <td>{{$manager->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

{{-- Styles Section --}}
@section('styles')
@endsection

{{-- Scripts Section --}}
@section('scripts')
@endsection
