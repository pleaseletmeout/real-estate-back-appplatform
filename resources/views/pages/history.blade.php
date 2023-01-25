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
                        <th scope="col">Action</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Backend ID</th>    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $Udata)
                        <tr>
                            <th scope="row">{{ $Udata->id }}</th>
                            <td colspan="3">{{ $Udata->action }}</td>
                            <td>{{ $Udata->backend_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop