@extends('front.layout.master')

@section('title', 'Quên Mật Khẩu')

@section('body')

        <!-- Section Begin -->
        <div class="checkout-section spad">
            <div class="container">
                <h4>
                    {{ $notification }}
                </h4>
                    <div class="login-form">
                        <h2>Điền email để lấy lại mật khẩu</h2>
                        <form action="{{url('account/recover-pass')}}" method="POST">
                            @csrf
                            <div class="group-input">
                                <input type="text" name="email" placeholder="Nhập Email">
                            </div>
                            <button type="submit" class="btn site-btn">Gửi</button>
                        </form>
                    </div>
            </div>
        </div>
        <!-- Section End -->
@endsection
