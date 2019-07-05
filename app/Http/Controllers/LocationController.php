<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('locations.form');
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
            Location::create($request->all());
        }
        catch (Exception $e){
            $message = "failed";
            return redirect('/locations')->with('status', $message);
        }
        $message = "success";
        return redirect('/locations')->with('status', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
        return view('locations.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
        return view('locations.form', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
        try{
            $location->update($request->all());
        }catch (Exception $exception){
            $message = "failed";
            return redirect('/locations')->with('status', $message);
        }
        $message = "success";
        return redirect('/locations')->with('status', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
        try{
            $location->delete();
        }catch (Exception $exception){
            $message = "failed";
            return redirect('/locations')->with('status', $message);
        }
        $message = "success";
        return redirect('/locations')->with('status', $message);
    }
}
