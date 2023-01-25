@extends('layouts.master')
@section('content')
    <div class="containe-fluid m-0 p-0">
        <div class="row m-0 p-0">
            @include('layouts.sidebar')

            <div class="col-lg-9 main" id="backend_main">
                @include('layouts.header')
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="ps-3 m-0">
                    <form class="text-center"action="findEstate" method="post">
                        @csrf
                        <div class="input-group">
                            <div class="form-outline">
                                <input type="search" id="form1" name="searching" class="form-control" placeholder="property name"/>

                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                @if ($data_count != 0)
                    <div class="text-center fw-bold my-5"> Approval Pending</div>
                    <div class="container">
                        <div class="row p-0 m-0">
                            @foreach ($data as $Udata)
                                <div class="col m-0 p-0 mx-auto my-2">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{ $Udata->image_link }}" class="card-img-top"
                                            alt="{{ $Udata->property_name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $Udata->property_name }}</h5>
                                            <p class="card-text">Address: {{ $Udata->property_address }}</p>
                                            <p class="card-text">No. of Bedroom: {{ $Udata->no_of_bedrooms }}</p>
                                            <p class="card-text">No. of Bathroom: {{ $Udata->no_of_bathrooms }}</p>
                                            <p class="card-text">Area size: {{ $Udata->area_size }}</p>
                                            <p class="card-text">Price: {{ $Udata->property_price }}</p>
                                            <p class="card-text">Description: {{ $Udata->property_description }}</p>
                                            <p class="card-text">By User ID: {{ $Udata->user_id }}</p>

                                            <a href="/accept/{{ $Udata->property_id }}"
                                                class="btn btn-primary ">Approve</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                @endif
                @if ($app_count != 0)

                    <div class="text-center fw-bold my-5">property Approved</div>
                    <div class="container">
                        <div class="row p-0 m-0">
                            @foreach ($approved as $Udata)
                                <div class="col m-0 p-0 mx-auto my-2">
                                    <div class="card " style="width: 18rem;">
                                        <img src="{{ $Udata->image_link }}" class="card-img-top"
                                            alt="{{ $Udata->property_name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $Udata->property_name }}</h5>
                                            <p class="card-text">Address: {{ $Udata->property_address }}</p>
                                            <p class="card-text">No. of Bedroom: {{ $Udata->no_of_bedrooms }}</p>
                                            <p class="card-text">No. of Bathroom: {{ $Udata->no_of_bathrooms }}</p>
                                            <p class="card-text">Area size: {{ $Udata->area_size }}</p>
                                            <p class="card-text">Price: {{ $Udata->property_price }}</p>
                                            <p class="card-text">Description: {{ $Udata->property_description }}</p>
                                            <p class="card-text">By User ID: {{ $Udata->user_id }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop
