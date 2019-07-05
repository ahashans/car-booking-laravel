<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Car;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $cars = Car::all();
//        if(!empty(Session::get('message'))){
//            $message = Session::get('message');
//            return view('cars.index', compact('cars','message'));
//
//        }
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cars.form');
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
            Car::create($request->all());
        }
        catch (Exception $exception){
            $message = "failed";
            return redirect('/cars')->with('status', $message);
        }
        $message = "success";
        return redirect('/cars')->with('status', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
        return view('cars.form', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
       try{
           $car->update($request->all());

       }catch (Exception $exception){
           $message = "failed";
           return redirect('/cars')->with('status', $message);
       }
        /*
         *TODO Possible Bug Notification shows if we back and
         * forth the edit page after edit.
         */
        $message = "success";
        return redirect('/cars')->with('status', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
        try{
            $car->delete();
        }catch (Exception $exception){
            $message = "failed";
            return redirect('/cars')->with('status', $message);
        }
        $message = "success";
        return redirect('/cars')->with('status', $message);
    }
}
