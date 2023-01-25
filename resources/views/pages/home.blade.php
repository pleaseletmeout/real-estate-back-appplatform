@extends('layouts.master')
@section('content')
    <div class="container m-0 p-0">
        <div class="row">
            @include('layouts.sidebar')
            <div class="col-lg-9 main" id="backend_main">
                @include('layouts.header')

                <div class="container m-0 p-0">
                    <div class="row ps-5 m-0">
                        <div class="col my-0 mx-auto p-0">
                            <div class="card mt-5" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        <ion-icon name="people-outline"></ion-icon>
                                    </h5>
                                    <h5 class="text-center"># of Users</h5>
                                    <p class="card-text text-center">{{ $count }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col m-0 p-0 mx-auto">
                            <div class="card mt-5 " style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        <ion-icon name="mail-outline"></ion-icon>
                                    </h5>
                                    <h5 class="text-center"># of Messages</h5>
                                    <p class="card-text text-center">{{ $message }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col m-0 p-0 mx-auto">
                            <div class="card mt-5 " style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        <ion-icon name="hourglass-outline"></ion-icon>
                                    </h5>
                                    <h5 class="text-center"># of Approval pending</h5>
                                    <p class="card-text text-center">{{ $pending }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col m-0 p-0 mx-auto">
                            <div class="card mt-5 pe-1" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">
                                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                                    </h5>
                                    <h5 class="text-center"># of Property Approved</h5>
                                    <p class="card-text text-center">{{ $approve}}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
