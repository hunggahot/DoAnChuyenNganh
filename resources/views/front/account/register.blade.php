@extends('front.layout.master')

@section('title', 'Đăng ký')

@section('body')
        <!--  -->
        <!-- Breadcrumb Section Begin -->
        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="/"><i class="fa fa-home"></i> Home</a>
                            <span>Đăng ký</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->

        <!-- Register Section Begin -->
        <div class="register-login-section sqad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="register-form">
                            <h2>Đăng ký</h2>

                            @if(session('notification'))
                                <div class="alert alert-waring" role="alert">
                                    {{session('notification')}}
                                </div>
                            @endif

                            <form action="" method="post">
                                @csrf
                                <div class="group-input">
                                    <label for="name">Tên *</label>
                                    <input type="text" id="name" name="name">
                                </div>
                                <div class="group-input">
                                    <label for="email">Email *</label>
                                    <input type="text" id="email" name="email">
                                </div>
                                <div class="group-input">
                                    <label for="pass">Mật khẩu *</label>
                                    <input type="password" id="pass" name="password">
                                </div>
                                <div class="group-input">
                                    <label for="con-pass">Xác nhận mật khẩu *</label>
                                    <input type="password" id="con-pass" name="password_confirmation">
                                </div>
                                <button class="site-btn register-btn" type="submit">Đăng ký</button>
                            </form>
                            <div class="switch-login">
                                <a href=".account/login" class="or-login">Hoặc đăng nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Register Section End -->
@endsection
