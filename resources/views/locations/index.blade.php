@extends('layouts.app')

@section('content')
    @if (session('status'))
        @if(session('status')==="success")
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4 class="alert-heading">Success!</h4>
                <p class="mb-0">Successfully inserted new location</p>
            </div>
        @else
            <div class="alert alert-dismissible alert-error">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4 class="alert-heading">Error!</h4>
                <p class="mb-0">Unable to insert Location</p>
            </div>
        @endif
    @endif
<div class="container">
    <div class="card bg-light mb-6">
        <div class="card-header">locations</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Location Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($locations as $location)
                    <tr class="table-light">
                        <th scope="row">{{$location->id}}</th>
                        <td>{{$location->name}}</td>
                        <td>{{$location->created_at}}</td>
                        <td>{{$location->updated_at}}</td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection