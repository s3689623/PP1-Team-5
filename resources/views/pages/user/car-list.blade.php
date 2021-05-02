{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
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

{{-- Styles Section --}}
@section('styles')
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
@endsection
