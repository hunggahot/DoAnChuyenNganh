@extends('front.layout.master')

@section('title', 'Nhập mật khẩu mới')

@section('body')

        <!-- Section Begin -->
        <div class="checkout-section spad">
            <div class="container">
{{--                <h4>--}}
{{--                    {{ $notification }}--}}
{{--                </h4>--}}
                    <div class="login-form">
                        @php
                            $token = $_GET['token'];
                            $email = $_GET['email'];
                        @endphp
                        <h2>Điền mật khẩu mới</h2>
                        <form action="{{url('account/reset-pass')}}" method="POST">
                            @csrf
                            <div class="group-input">
                                <input type="hidden" name="email" value="{{$email}}">
                                <input type="hidden" name="token" value="{{$token}}">
                                <input type="password" name="password" placeholder="Nhập mật khẩu mới">
                            </div>
                            <button type="submit" class="btn site-btn">Gửi</button>
                        </form>
                    </div>
            </div>
        </div>
        <!-- Section End -->
@endsection
