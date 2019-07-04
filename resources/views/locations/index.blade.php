@extends('layouts.app')

@section('content')
<div class="container">
    <div class="locationd bg-light mb-6">
        <div class="locationd-header">locations</div>
        <div class="locationd-body">
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