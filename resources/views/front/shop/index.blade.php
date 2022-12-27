@extends('front.layout.master')

@section('title', 'Shop')

@section('body')
        <!--  -->
        <!-- Breadcrumb Section Begin -->
        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="/"><i class="fa fa-home"></i> Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->

        <!-- Product Shop Section Begin -->
        <section class="product-shop spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">

                        @include('front.shop.components.products-sidebar-filter')

                    </div>
                    <div class="col-lg-9 order-1 order-lg-2">

                        <div class="product-show-option">

                            <div class="row">
                                <div class="col-lg-7 col-md-7">
                                    <form action="">
                                        <div class="select-option">
                                            <select name="sort_by" onchange="this.form.submit();" class="sorting">
                                                <option {{request('sort_by') == 'latest' ? 'selected' : ''}} value="latest">Lọc theo: Mới nhất</option>
                                                <option {{request('sort_by') == 'oldest' ? 'selected' : ''}} value="oldest">Lọc theo: Cũ nhất</option>
                                                <option {{request('sort_by') == 'name-ascending' ? 'selected' : ''}} value="name-ascending">Lọc theo: Tên A->Z</option>
                                                <option {{request('sort_by') == 'name-descending' ? 'selected' : ''}} value="name-descending">Lọc theo: Tên Z->A</option>
                                                <option {{request('sort_by') == 'price-ascending' ? 'selected' : ''}} value="price-ascending">Lọc theo: Giá tăng dần</option>
                                                <option {{request('sort_by') == 'price-descending' ? 'selected' : ''}} value="price-descending">Lọc theo: Giá giảm dần</option>
                                            </select>
                                            <select name="show" onchange="this.form.submit();" class="p-show">
                                                <option {{request('show') == '9' ? 'selected' : ''}} value="9">Xem: 9</option>
                                                <option {{request('show') == '15' ? 'selected' : ''}} value="15">Xem: 15</option>
                                                <option {{request('show') == '21' ? 'selected' : ''}} value="21">Xem: 21</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-5 col-md-5 text-right">
                                </div>
                            </div>
                        </div>
                        <div class="product-list">
                            <div class="row">
                                @foreach($products as $product)
                                    <div class="col-lg-4 col-sm-6">
                                        @include('front.components.product-item')
                                    </div>
                                @endforeach
                            </div>
                        </div>
{{--                        <div class="loading-more">--}}
{{--                            <i class="icon_loading"></i>--}}
{{--                            <a href="#">Loading More</a>--}}
{{--                        </div>--}}
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </section>
        <!-- Product Shop Section End -->
@endsection
