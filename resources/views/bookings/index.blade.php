@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('status'))
            @if(session('status')==="success")
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4 class="alert-heading">Success!</h4>
                    <p class="mb-0">Operation Successful</p>
                </div>
            @else
                <div class="alert alert-dismissible alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4 class="alert-heading">Error!</h4>
                    <p class="mb-0">{{status}}</p>
                </div>
            @endif
        @endif

        <div class="card bg-light mb-6">
            <div class="card-header"><h3>All Bookings</h3>
                <div class="float-right">
                    <a href="{{route('bookings.create')}}" class="btn btn-info text-white">Create New Booking</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">User Booked By</th>
                        <th scope="col">Car Name</th>
                        <th scope="col">Pickup Time</th>
                        <th scope="col">Pickup Location</th>
                        <th scope="col">Destination Location</th>
                        <th scope="col">Return Time</th>
                        <th scope="col">Number of Passengers</th>

                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>

                    </tr>
                    </thead>
                    <tbody>


                    @foreach ($bookings as $booking)
                        <tr class="table-light">
                            <th scope="row">{{$booking->id}}</th>
                            <td>{{$booking->user->name}}</td>
                            <td>{{$booking->car->name}}</td>
                            <td>{{$booking->return_time}}</td>
                            <td>{{$booking->pickup_location->name}}</td>

                            <td>{{$booking->destination_location->name}}</td>
                            <td>{{$booking->return_time}}</td>

                            <td>{{$booking->passenger_count}}</td>

                            <td>{{$booking->created_at}}</td>
                            <td>{{$booking->updated_at}}</td>
                            <td><a href="{{route('bookings.edit', $booking->id)}}" class="btn btn-primary text-white">Edit</a></td>
                            <td>
                                <form action="{{route('bookings.destroy', $booking->id)}}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-warning text-white" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

