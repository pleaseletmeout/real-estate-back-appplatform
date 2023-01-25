@extends('layouts.master')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset('images/myhome2.png')}}" alt="IMG">
            </div>
            <form class="login100-form validate-form" method="post" action='login'>
                @csrf
                <span class="login100-form-title">
                    PTE'S K'NHOM Login
                </span>

                <div class="wrap-input100 validate-input" data-validate="Valid username is required: xyz">
                    <input class="input100" type="text" name="name" placeholder="username">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>                
            </form>
        </div>
    </div>
</div>
@stop