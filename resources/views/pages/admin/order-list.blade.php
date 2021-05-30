{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>User</th>
                    <th>Make</th>
                    <th>Type</th>
                    <th>Color</th>
                    <th>Owner</th>
                    <th>Ordered at</th>
                    <th>Duration</th>
                    <th>Cost</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->car->number}}</td>
                        <td>{{$order->user->first_name}} {{$order->user->last_name}}</td>
                        <td>{{$order->car->make->name}}</td>
                        <td>{{$order->car->type}}</td>
                        <td>{{$order->car->color}}</td>
                        <td>{{$order->car->user->first_name}} {{$order->car->user->last_name}}</td>
                        <td>{{$order->created_at}}</td>
                        @if($order->status != 'paid')
                        <td>{{$order->duration()}}</td>
                        <td>${{$order->price()}}</td>
                        @else
                        <td>Paid</td>
                        <td>Paid</td>
                        @endif
                        <td>{{$order->status}}</td>
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
