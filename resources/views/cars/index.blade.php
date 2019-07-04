@extends('layouts.app')

@section('content')
<div class="container">

        @if (session('status'))
            @if(session('status')==="success")
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4 class="alert-heading">Success!</h4>
                    <p class="mb-0">Successfully Inserted New Car</p>
                </div>
            @else
                <div class="alert alert-dismissible alert-error">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4 class="alert-heading">Error!</h4>
                    <p class="mb-0">Unable to insert New car</p>
                </div>
            @endif
        @endif

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

