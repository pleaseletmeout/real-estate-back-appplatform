@extends('layouts.master')
@section('content')
<div class="container m-0 p-0">
    <div class="row">
        @include('layouts.sidebar')
        <div class="col-lg-9 main" id="backend_main">
            @include('layouts.header')
            <table class="table ms-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Operation</th>    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $Udata)
                        <tr>
                            <th scope="row">{{ $Udata->id }}</th>
                            <td>{{ $Udata->name }}</td>
                            <td>{{ $Udata->phone_number }}</td>
                            <td>{{ $Udata->email }}</td>
                            <td><a class="btn btn-danger" href="/rmUser/{{ $Udata->id }}" role="button">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop