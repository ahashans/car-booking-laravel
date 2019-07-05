@extends('layouts.app')

@section('content')
<div class="container">

        @if (session('status'))
            @if(session('status')==="success")
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4 class="alert-heading">Success!</h4>
                    <p class="mb-0">Operation Successful</p>
                </div>
            @else
                <div class="alert alert-dismissible alert-error">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4 class="alert-heading">Error!</h4>
                    <p class="mb-0">Operation Failed!</p>
                </div>
            @endif
        @endif

    <div class="card bg-light mb-6">
        <div class="card-header"><h3>All Cars</h3>
            <div class="float-right">
                <a href="{{route('cars.create')}}" class="btn btn-info text-white">Create New Cars</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Car Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>

                    </tr>
                </thead>
                <tbody>


                    @foreach ($cars as $car)
                    <tr class="table-light">
                        <th scope="row">{{$car->id}}</th>
                        <td>{{$car->name}}</td>
                        <td>{{$car->created_at}}</td>
                        <td>{{$car->updated_at}}</td>
                        <td><a href="{{route('cars.edit', $car->id)}}" class="btn btn-primary text-white">Edit</a></td>
                        <td>
                            <form action="{{route('cars.destroy', $car->id)}}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-warning text-white" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

