@extends('front.layout.master')

@section('title', 'My Order')

@section('body')
        <!-- Shopping Cart Section Begin -->
        <div class="shopping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th class="p-name">Product Name</th>
                                        <th>Total</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="first-row">#{{$order->id}}</td>
                                        <td class="cart-pic first-row"><img style="height: 100px; margin-left: 70px" src="front/img/products/{{$order->orderDetails[0]->product->productImages[0]->path}}" alt=""></td>
                                        <td class="cart-title first-row">
                                            <h5>
                                                {{$order->orderDetails[0]->product->name}}
                                                @if(count($order->orderDetails) > 1)
                                                    (and {{count($order->orderDetails)}} other products)
                                                @endif
                                            </h5>
                                        </td>
                                        <td class="total-price first-row">
                                            ${{array_sum(array_column($order->orderDetails->toArray(), 'total'))}}
                                        </td>
                                        <td class="first-row">
                                            <a class="btn" href="./account/my-order/{{$order->id}}">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-4">--}}
{{--                                <div class="cart-buttons">--}}
{{--                                    <a href="#" class="primary-btn continue-shop">Continue Shopping</a>--}}
{{--                                    <a href="#" class="primary-btn up-cart">Update Cart</a>--}}
{{--                                </div>--}}
{{--                                <div class="discount-coupon">--}}
{{--                                    <h6>Discount Codes</h6>--}}
{{--                                    <form action="#" class="coupon-form">--}}
{{--                                        <input type="text" placeholder="Enter your codes">--}}
{{--                                        <button type="submit" class="site-btn coupon-btn">Apply</button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-4 offset-lg-4">--}}
{{--                                <div class="proceed-checkout">--}}
{{--                                    <ul>--}}
{{--                                        <li class="subtotal">Subtotal <span>${{$total}}</span></li>--}}
{{--                                        <li class="cart-total">Total <span>${{$subtotal}}</span></li>--}}
{{--                                    </ul>--}}
{{--                                    <a href="./checkout" class="proceed-btn">PROCEED TO CHECK OUT</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shopping Cart Section End -->
@endsection

