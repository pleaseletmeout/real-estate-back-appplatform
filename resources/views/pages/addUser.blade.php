@extends('layouts.master')
@section('content')
    <div class="containe-fluid m-0 p-0">
        <div class="row m-0 p-0">
            @include('layouts.sidebar')
            <div class="col-lg-9 main" id="backend_main">
                @include('layouts.header')
                <div class="container-fluid m-0 p-0 mx-auto rounded">
                    <div class="rounded col-10 col-md-5 col-xl-4 m-0 py-3 px-lg-5 p-0 mx-auto bg-white">
                        <div class="row mx-auto m-0 p-0">
                            <div class="col-6 col-md-8 col-lg-9 mx-auto m-0 p-0 p-4">
                                <img src={{ asset('images/myhome2.png') }} alt="Logo" class="img-fluid" />
                            </div>
                        </div>
                        <div class="row mx-auto m-0 p-0">
                            <div class="col-12 text-center fw-bold h3">Backend Register</div>
                        </div>
                        <div class="row mx-5 p-0">
                            <form class="col-12 fw-bold" method="post" action="register">
                                @csrf
                                <div class="form-group w-100 text-center" data-validate="Valid username is required: exz">
                                    <span class="fw-bold">UserName</span>
                                    <input class="my-3" type="text" name="username" placeholder="username">
                                </div>

                                <div class="form-group w-100 text-center" data-validate="Password is required">
                                    <span class="fw-bold">Password</span>
                                    <input class="my-3" type="password" name="password" placeholder="password">
                                </div>
                                <div class="form-group w-100 text-center" data-validate="Type is required">
                                    <span class="fw-bold">Role: </span>
                                    <select class="my-3"name="role" id="role">
                                        <option value="admin">Admin</option>
                                        <option value="operator">Operator</option>
                                    </select>
                                </div>
                                <div class="form-group w-100 text-center">
                                    <input type="submit" class="form-control btn btn-success w-50">


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
