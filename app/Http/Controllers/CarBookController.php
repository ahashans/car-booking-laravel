<?php

namespace App\Http\Controllers;

use App\Car;
use App\Location;
use App\CarBooking;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookings = CarBooking::all();
        return view('bookings.index',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cars = Car::all();
        $locations = Location::all();
        return view('bookings.form', compact('cars', 'locations'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try{
            $carbooking = new CarBooking();
            $carbooking->fill($request->all());
            $carbooking->booked_user_id=Auth::user()->id;
            $carbooking->save();
        }catch (Exception $exception){
            $message = "failed";
            return redirect('/bookings')->with('status', $message);
        }
        $message = "success";
        return redirect('/bookings')->with('status', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Sends Destination Location for a Pickup Location.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_destination_location(Request $request)
    {
        //
        $pickup_location_id = $request->input('id');
        $destination_locations = Location::where('id','<>',$pickup_location_id)->get();
        return json_encode($destination_locations);
    }
    /**
     * Checks whether a car is available between given time.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check_car_available(Request $request)
    {
        $car_id = $request->input('car');
        $pickup_time = $request->input('pickup_time');
        $dropoff_time = $request->input('dropoff_time');
        $is_booked_list = CarBooking::where('car_id','=',$car_id)->where('return_time','>=',$pickup_time);
        $status = $is_booked_list->count() >0?"Booked":"Free";
        return json_encode($status);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
