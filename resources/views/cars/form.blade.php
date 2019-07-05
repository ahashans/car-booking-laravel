@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{isset($car) ? route('cars.update', $car->id) : route('cars.store')}}" method="POST">
        @csrf
        @if(isset($car))
            @method('PATCH')
        @endif
        <fieldset>
            <legend>Create Car</legend>
           
            <div class="form-group">
                <label for="car">Car Name</label>
                <input type="text" class="form-control" id="car" name="name" aria-describedby="emailHelp"
                    placeholder="Enter Car Name" required value="{{isset($car)? $car->name:""}}">
                <small id="carHelp" class="form-text text-muted">This is required</small>
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>
</div>
@endsection
