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
                        <th scope="col">User</th>
                        <th scope="col">Role</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $Udata)
                    @if($Udata->name != 'admin')
                        <tr>
                            <th scope="row">{{ $Udata->id }}</th>
                            <td>{{ $Udata->name }}</td>
                            <td>{{ $Udata->role }}</td>
                            <td><a class="btn btn-danger" href="/delAd/{{ $Udata->id }}" role="button">Delete</a>
                            </td>
                            
                        </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop