@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card bg-light mb-6">
        <div class="card-header">Cars</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Car Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($cars as $car)
                    <tr class="table-light">
                        <th scope="row">{{$car->id}}</th>
                        <td>{{$car->name}}</td>
                        <td>{{$car->created_at}}</td>
                        <td>{{$car->updated_at}}</td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection