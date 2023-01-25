@extends('layouts.master')
@section('content')
    <div class="containe-fluid m-0 p-0">
        <div class="row m-0 p-0">
            @include('layouts.sidebar')

            @if (session('message'))
                <div class="alert alert-danger" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="col-lg-9 main" id="backend_main">
                @include('layouts.header')
                <table class="table ms-4">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Edit Role</th>
                            <th scope="col">Edit Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $Udata)
                            <tr>
                                <th scope="row">{{ $Udata->id }}</th>
                                <td>{{ $Udata->name }}</td>
                                <td>{{ $Udata->role }}</td>
                                @if ($Udata->role == 'admin')
                                    <td><a class="btn btn-primary" href="/newRole/{{ $Udata->id }}/{{ 'operator' }}"
                                            role="button">Change
                                            Role</a>
                                    </td>
                                @else
                                    <td><a class="btn btn-primary" href="/newRole/{{ $Udata->id }}/{{ 'admin' }}"
                                            role="button">Change
                                            Role</a>
                                    </td>
                                @endif
                                <td><a class="btn btn-warning" href="/newPass/{{ $Udata->id }}" role="button">New
                                        Password</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
