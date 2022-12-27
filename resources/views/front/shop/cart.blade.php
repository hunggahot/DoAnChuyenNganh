@extends('front.layout.master')

@section('title', 'Cart')

@section('body')
        <!-- Shopping Cart Section Begin -->
        <div class="shopping-cart spad">
            <div class="container">
                <div class="row">
                    @if(Cart::count() > 0)
                    <div class="col-lg-12">
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th class="p-name">Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                        <th>
                                            <i onclick="confirm('Bạn có chắc muốn xóa hết sản phẩm trong giỏ hàng?') === true ? destroyCart() : ''"
                                               style="cursor: pointer" class="ti-close"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($carts as $cart)
                                    <tr data-rowid="{{$cart->rowId}}">
                                        <td class="cart-pic first-row"><img style="height: 170px; margin-left: 45px" src="front/img/products/{{$cart->options->images[0]->path}}" alt=""></td>
                                        <td class="cart-title first-row">
                                            <h5>{{$cart->name}}</h5>
                                        </td>
                                        <td class="p-price first-row">{{$cart->price}}<sup>đ</sup></td>
                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="{{$cart->qty}}" data-rowId="{{$cart->rowId}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price first-row">{{$cart->price * $cart->qty}}<sup>đ</sup></td>
                                        <td class="close-td first-row">
                                            <i onclick="removeCart('{{$cart->rowId}}')" class="ti-close"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="cart-buttons">
                                    <a href="#" class="primary-btn continue-shop">Tiếp tục mua hàng</a>
                                    <a href="#" class="primary-btn up-cart">Cập nhật</a>
                                </div>
                                <div class="discount-coupon">
                                    <h6>Mã giảm giá</h6>
                                    <form action="" method="post" class="coupon-form">
                                        @csrf
                                        <input type="text" name="code" placeholder="Nhập mã giảm giá">
                                        <button type="submit" class="site-btn coupon-btn">Chấp nhận</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 offset-lg-4">
                                <div class="proceed-checkout">
                                    <ul>
                                        <li class="subtotal">Tạm tính <span>{{$total}}<sup>đ</sup></span></li>
                                        <li class="cart-total">Thành tiền <span>{{$subtotal}}<sup>đ</sup></span></li>
                                    </ul>
                                    <a href="./checkout" class="proceed-btn">Đặt hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-lg-12">
                        <h4>Giỏ hàng trống.</h4>
                        <img style="width: 100%" src="front/img/cart-page/cart-empty.png" alt="">
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Shopping Cart Section End -->
@endsection

