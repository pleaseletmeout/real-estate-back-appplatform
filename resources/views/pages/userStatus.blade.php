@extends('layouts.master')
@section('content')
    <div class="containe-fluid m-0 p-0">
        <div class="row m-0 p-0">
            @include('layouts.sidebar')
            <div class="col-lg-9 main" id="backend_main">
                @include('layouts.header')
                @if (session('message'))
                <div class="alert alert-danger" role="alert">
                    {{ session('message') }}
                </div>
                @endif
                <div class="ps-4 m-0">
                    <form class="text-center"action="goUser" method="post"> 
                    @csrf   
                    <div class="input-group">
                        <div class="form-outline">
                          <input type="search" id="form1" name="searching" class="form-control" placeholder=" email or username"/>
                          
                        </div>
                        <button type="submit" class="btn btn-primary">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </form>
                </div>
                <table class="table ms-4">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            
                            <th scope="col">Phone Number</th>
                            <th scope="col">Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $Udata)
                            <tr>
                                <th scope="row">{{ $Udata->id }}</th>
                                <td>{{ $Udata->email }}</td>
                                <td>{{ $Udata->phone_number }}</td>
                                @if ($Udata->status == 1)
                                    <td><a class="btn btn-danger" href="/dis/{{ $Udata->id }}" role="button">Disable</a>
                                    </td>
                                @else
                                    <td><a class="btn btn-success" href="/enab/{{ $Udata->id }}" role="button">Enable</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
