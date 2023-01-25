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
                        <th scope="col">Name</th>
                        <th scope="col">Message</th>
                        <th scope="col">Property ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $Udata)
                        <tr>
                            <th scope="row">{{ $Udata->contact_id }}</th>
                            <td>{{ $Udata->contact_name }}</td>
                            <td>{{ $Udata->contact_message }}</td>
                            <td>{{ $Udata->property_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop