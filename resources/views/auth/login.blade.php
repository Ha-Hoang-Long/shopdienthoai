@extends('layouts.app')

@section('content')
<div class="container">
    <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form id="admin-login" method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- <input type="hidden" name="_token" value=""> -->
                            <h1>Đăng nhập</h1>
                            <div>
                                <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <!-- <input type="submit" value="Đăng nhập"> -->
                                <a class="reset_pass" href="#">Quên mật khẩu?</a>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">
                                    <a href="{{ route('register') }}" class="to_register"> Tạo tài khoản </a>
                                </p>

                                <div class="clearfix"></div>
                                <br>

                                <div>
                                    <!-- <h1><i class="fa fa-paw"></i> University of Danang Foreign Language</h1> -->
                                    <p>©2022 All Rights Reserved.Privacy and Terms</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
</div>

@endsection
