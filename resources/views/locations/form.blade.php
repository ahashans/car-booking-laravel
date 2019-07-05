@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{isset($location) ? route('locations.update', $location->id) : route('locations.store')}}" method="POST">
        @csrf
        @if(isset($location))
            @method('PATCH')
        @endif
        <fieldset>
            <legend>Create location</legend>
           
            <div class="form-group">
                <label for="location">Location Name</label>
                <input type="text" class="form-control" id="location" name="name" aria-describedby="emailHelp"
                    placeholder="Enter location Name" required value="{{isset($location)? $location->name:""}}">
                <small id="locationHelp" class="form-text text-muted">This is required</small>
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>
</div>
@endsection
