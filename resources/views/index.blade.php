@extends('layouts.master')
@section('content')
<div class="limiter">
    <div class="container-fluid container-login100">
        <div class="wrap-login100">
            <div class="col-12 col-md-6 login100-pic js-tilt" data-tilt>
                <img src="{{asset('images/myhome2.png')}}" alt="IMG">
            </div>
            <div class="login100-form validate-form my-auto">
                <span class="login100-form-title">
                    Welcome to Real Estate Backend 
                </span>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" onclick="window.location='{{ route('login')}}'">
                        Login
                    </button>
                </div>                
            </div>
        </div>
    </div>
</div>
@stop