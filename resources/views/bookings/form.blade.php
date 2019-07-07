@extends('layouts.app')
@section('additional_css')
    <link href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f98c455828.js"></script>
@endsection
@section('content')
    <div class="container">
        <form action="{{isset($booking) ? route('bookings.update', $booking->id) : route('bookings.store')}}"
              method="POST" id="car_booking_form">
            @csrf
            @if(isset($booking))
                @method('PATCH')
            @endif
            <fieldset>
                <legend>Book a car</legend>

                <div class="form-group">
                    <label for="car_id">Car Name</label>
                    <select class="form-control" id="car" name="car_id" required>
                        <option value="">Select a car</option>
                        @foreach($cars as $car)

                            <option
                                value="{{$car->id}}" {{isset($booking)?($car->id===$booking->car_id?"selected":""):""}}>{{$car->name}}</option>

                        @endforeach
                    </select>
                    <small id="carHelp" class="form-text text-muted">This is required</small>
                </div>
                <div class="form-group">
                    <label for="pickup_location">Pickup Location</label>
                    <select class="form-control" id="pickup_location" name="pickup_location_id" required>
                        <option value="">Select a Pickup Location</option>
                        @foreach($locations as $location)

                            <option
                                value="{{$location->id}}" {{isset($booking)?($location->id===$booking->pickup_location_id?"selected":""):""}}>{{$location->name}}</option>

                        @endforeach

                    </select>
                    <small id="pickupHelp" class="form-text text-muted">This is required</small>
                </div>
                <div class="form-group">
                    <label for="pickup_location">Destination Location</label>
                    <select class="form-control" id="destination_location" name="destination_location_id" required disabled>
                        <option value="">Select a Pickup Location First</option>
{{--                        @foreach($locations as $location)--}}

{{--                            <option--}}
{{--                                value="{{$location->id}}" {{isset($booking)?($location->id===$booking->destination_location_id?"selected":""):""}}>{{$location->name}}</option>--}}

{{--                        @endforeach--}}
                    </select>
                    <small id="dropoffHelp" class="form-text text-muted">This is required</small>
                </div>
                <div class="form-group">
                    <label for="">Booking Time</label>
                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" id="booking_time" name="booking_time" data-target="#datetimepicker1" required >
                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label for="">Return Time</label>
                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" id="return_time" name="return_time" data-target="#datetimepicker2" required>
                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Passenger Count</label>
                    <input type="text" class="form-control" id="passenger_count" name="passenger_count" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </fieldset>

        </form>
    </div>
@endsection
@section('additional_js')
    <script src="{{asset('js/moment.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/tempusdominus-bootstrap-4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/notify.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                ignoreReadonly: true
            });
            $('#datetimepicker2').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                ignoreReadonly: true
            });

        });
        $(document).ready(function () {
            $('#pickup_location').change(function () {
                const pickup_location_id = this.value;
                $.ajax({
                    url:'/get-destination-locations',
                    type:'GET',
                    data:{id:pickup_location_id},
                    success:function (data) {
                        $('#destination_location').html("<option value=''>Select a destination location</option>");
                        for(var i=0;i<data.length;i++){
                            $('#destination_location').append(`<option value='${data[i].id}'>${data[i].name}</option>`);
                        }
                        $('#destination_location').removeAttr("disabled");
                    },
                    error:function () {

                    },
                    dataType: "json"
                });

            });
            $('#car_booking_form').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url:'/check-car-available',
                    type:'GET',
                    data:{
                        car:$('#car').val(),
                        pickup_time:$('#booking_time').val(),
                        dropoff_time:$('#return_time').val()
                    },
                    success:function (data) {
                        console.log(data);
                        if(data==="Booked"){
                            $.notify("The Car is booked");
                        }
                        else{
                            // $.notify("The Car is Free", "success");
                            $("#car_booking_form").unbind('submit');
                        }
                    },
                    error:function () {

                    },
                    dataType: "json"
                });
            });
        });
    </script>
@endsection
