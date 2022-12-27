@extends('front.layout.master')

@section('title', 'Check Out')

@section('body')

        <!-- Section Begin -->
        <div class="checkout-section spad">
            <div class="container">
                <form action="" method="post" class="checkout-form">
                    @csrf
                    <div class="row">
                        @if(Cart::count() > 0)
                            <div class="col-lg-6">
                                <div class="checkout-content">
                                    <a href="login.html" class="content-btn">Nhấn vào để đăng nhập</a>
                                </div>
                                <h4>Chi tiết hóa đơn</h4>
                                <div class="row">

                                    <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id ?? ''}}">

                                    <div class="col-lg-6">
                                        <label for="fir">Họ <span>*</span></label>
                                        <input type="text" id="fir" name="first_name" value="{{Auth::user()->name ?? ''}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="last">Tên <span>*</span></label>
                                        <input type="text" id="last" name="last_name">
                                    </div>
{{--                                    <div class="col-lg-12">--}}
{{--                                        <label for="cun-name">Company Name <span>*</span></label>--}}
{{--                                        <input type="text" id="cun-name" name="company_name" value="{{Auth::user()->company_name ?? ''}}">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-12">--}}
{{--                                        <label for="cun">Country <span>*</span></label>--}}
{{--                                        <input type="text" id="cun" name="country" value="{{Auth::user()->country ?? ''}}">--}}
{{--                                    </div>--}}
                                    <div class="col-lg-12">
                                        <label for="street">Địa chỉ giao hàng <span>*</span></label>
                                        <input type="text" id="street" name="street_address" value="{{Auth::user()->street_address ?? ''}}">
                                    </div>
{{--                                    <div class="col-lg-12">--}}
{{--                                        <label for="zip">Postcode/Zip (optional)</label>--}}
{{--                                        <input type="text" id="zip" name="postcode_zip" value="{{Auth::user()->postcode_zip ?? ''}}">--}}
{{--                                    </div>--}}
                                    <div class="col-lg-12">
                                        <label for="town">Tỉnh/Thành phố <span>*</span></label>
                                        <input type="text" id="town" name="town_city" value="{{Auth::user()->town_city ?? ''}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="email">Email <span>*</span></label>
                                        <input type="text" id="email" name="email" value="{{Auth::user()->email ?? ''}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="phone">Điện thoại <span>*</span></label>
                                        <input type="text" id="phone" name="phone" value="{{Auth::user()->phone ?? ''}}">
                                    </div>
{{--                                    <div class="col-lg-12">--}}
{{--                                        <div class="create-item">--}}
{{--                                            <label for="acc-create">--}}
{{--                                                Tạo tài khoản mới?--}}
{{--                                                <input type="checkbox" id="acc-create">--}}
{{--                                                <span class="checkmark"></span>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout-content">
                                    <input type="text" placeholder="Nhập mã giảm giá">
                                </div>
                                <div class="place-order">
                                    <h4>Your Order</h4>
                                    <div class="order-total">
                                        <div class="order-table">
                                            <li>Sản phẩm <span>Thành tiền</span></li>
                                            @foreach($carts as $cart)
                                                <li class="fw-normal">
                                                    {{$cart->name}} x {{$cart->qty}} <span>{{$cart->price * $cart->qty}}<sup>đ</sup></span>
                                                </li>
                                            @endforeach
                                            <li class="fw-normal">Tạm tính <span>{{$subtotal}}<sup>đ</sup></span></li>
                                            <li class="total-price">Thành tiền <span>{{$total}}<sup>đ</sup></span></li>
                                        </div>
                                        <div class="payment-check">
                                            <div class="pc-item">
                                                <label for="pc-check">
                                                    Tiền mặt
                                                    <input type="radio" name="payment_type" value="pay_later" id="pc-check" checked>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="pc-item">
                                                <label for="pc-vnpay">
                                                    VNPay
                                                    <input type="radio" name="payment_type" value="online_payment" id="pc-vnpay">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="pc-item">
                                                <label for="pc-momo">
                                                    Momo
                                                    <input type="checkbox" id="pc-momo">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="order-btn">
                                            <button type="submit" class="site-btn place-btn">Đặt hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-12">
                                <img style="width: 100%" src="front/img/cart-page/cart-empty.png" alt="">
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
        <!-- Section End -->
@endsection
