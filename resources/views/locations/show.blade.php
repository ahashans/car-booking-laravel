@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/locations" method="POST">
        @csrf
        <fieldset>
            <legend>Create Location</legend>
           
            <div class="form-group">
                <label for="car">Location Name</label>
                <input type="text" class="form-control" id="location" name="location" aria-describedby="emailHelp"
                    placeholder="Enter Location Name" disabled>
                <small id="locationHelp" class="form-text text-muted">This is required</small>
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>
</div>
@endsection
