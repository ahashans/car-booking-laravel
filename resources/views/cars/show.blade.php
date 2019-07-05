@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/cars" method="POST">
        @csrf
        <fieldset>
            <legend>Create Car</legend>
           
            <div class="form-group">
                <label for="car">Car Name</label>
                <input type="text" class="form-control" id="car" name="car" aria-describedby="emailHelp"
                    placeholder="Enter Car Name" disabled>
                <small id="carHelp" class="form-text text-muted">This is required</small>
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>
</div>
@endsection
