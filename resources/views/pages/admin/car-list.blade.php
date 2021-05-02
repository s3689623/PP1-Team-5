{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <a href="{{url('/admin/car/new')}}" class="btn btn-outline-primary">Add New Car</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>Make</th>
                    <th>Type</th>
                    <th>Color</th>
                    <th>User</th>
                    <th>Status</th>
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
                        <td>{{$car->status}}</td>
                        <td>{{$car->postcode}}</td>
                        <td>{{$car->created_at}}</td>
                        <td>{{$car->updated_at}}</td>
                        <td>
                            <a href="{{url('/admin/car/' . $car->id)}}" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                                <i class="la la-edit"></i>
                            </a>
                        </td>
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
