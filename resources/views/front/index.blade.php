@extends('front.layout.master')

@section('title', 'Home')

@section('body')
    <!--  -->
    <!--Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="front/img/1.png">
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-5">--}}
{{--                            <span>Bag, kids</span>--}}
{{--                            <h1>Black friday</h1>--}}
{{--                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit neque asperiores eius eos tempore, nisi cupiditate expedita quae aut, harum quas similique natus. In, impedit?</p>--}}
{{--                            <a href="#" class="primary-btn">Shop now</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="off-card">--}}
{{--                        <h2>Sale <span>50%</span></h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="single-hero-items set-bg" data-setbg="front/img/3.png">
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-5">--}}
{{--                            <span>Bag, kids</span>--}}
{{--                            <h1>Black friday</h1>--}}
{{--                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit neque asperiores eius eos tempore, nisi cupiditate expedita quae aut, harum quas similique natus. In, impedit?</p>--}}
{{--                            <a href="#" class="primary-btn">Shop now</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="off-card">--}}
{{--                        <h2>Sale <span>50%</span></h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="single-hero-items set-bg" data-setbg="front/img/2.png">
        </div>
    </section>
    <!--Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section sqad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <a href="shop/category/men">
                            <img src="front/img/banner-1.jpg" alt="">
                            <div class="inner-text">
                                <h4>Nam</h4>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <a href="shop/category/women">
                            <img src="front/img/banner-2.jpg" alt="">
                            <div class="inner-text">
                                <h4>Nữ</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-3.jpg" alt="">
                        <div class="inner-text">
                            <h4>Trẻ em</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="front/img/products/women-large.jpg">
                        <h2>Nữ</h2>
                        <a href="shop/category/women">Khám phá</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active item" data-tag="*" data-category="women">Tất Cả</li>
                            <li class="item" data-tag=".Clothing" data-category="women">Áo Quần</li>
                            <li class="item" data-tag=".HandBag" data-category="women">Balo</li>
                            <li class="item" data-tag=".Shoes" data-category="women">Giày</li>
                            <li class="item" data-tag=".Accessories" data-category="women">Phụ kiện</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel women">
                        @foreach($featuredProducts['women'] as $product)
                            @include('front.components.product-item')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Deal Of The Week Section Begin -->
{{--    <section class="deal-of-week set-bg spad" data-setbg="front/img/time-bg.jpg">--}}
{{--        <div class="container">--}}
{{--            <div class="col-lg-6 text-center">--}}
{{--                <div class="section-title">--}}
{{--                    <h2>Deal Of The Week</h2>--}}
{{--                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Est quod id quos suscipit ab assumenda eum quam voluptas delectus nesciunt.</p>--}}
{{--                    <div class="product-price">--}}
{{--                        $35.00--}}
{{--                        <span>/ HandBag</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="countdown-timer" id="countdown">--}}
{{--                    <div class="cd-item">--}}
{{--                        <span>56</span>--}}
{{--                        <p>Days</p>--}}
{{--                    </div>--}}
{{--                    <div class="cd-item">--}}
{{--                        <span>12</span>--}}
{{--                        <p>Hrs</p>--}}
{{--                    </div>--}}
{{--                    <div class="cd-item">--}}
{{--                        <span>40</span>--}}
{{--                        <p>Mins</p>--}}
{{--                    </div>--}}
{{--                    <div class="cd-item">--}}
{{--                        <span>52</span>--}}
{{--                        <p>Secs</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <a href="" class="primary-btn">Shop Now</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- Deal Of The Week Section End -->

    <!-- Men Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <li class="active item" data-tag="*" data-category="men">Tất cả</li>
                            <li class="item" data-tag=".Clothing" data-category="men">Áo Quần</li>
                            <li class="item" data-tag=".HandBag" data-category="men">Balo</li>
                            <li class="item" data-tag=".Shoes" data-category="men">Giày</li>
                            <li class="item" data-tag=".Accessories" data-category="men">Phụ kiện</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel men">
                        @foreach($featuredProducts['men'] as $product)
                            @include('front.components.product-item')
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg" data-setbg="front/img/products/man-large.jpg">
                        <h2>Nam</h2>
                        <a href="shop/category/men">Khám phá</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Men Banner Section End -->

    <!-- Instagram Section Begin -->
{{--    <div class="instagram-photo">--}}
{{--        <div class="insta-item set-bg" data-setbg="front/img/insta-1.jpg">--}}
{{--            <div class="inside-text">--}}
{{--                <i class="ti-instagram"></i>--}}
{{--                <h5><a href="#">CodeLean_Colecttion</a></h5>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="insta-item set-bg" data-setbg="front/img/insta-2.jpg">--}}
{{--            <div class="inside-text">--}}
{{--                <i class="ti-instagram"></i>--}}
{{--                <h5><a href="#">CodeLean_Colecttion</a></h5>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="insta-item set-bg" data-setbg="front/img/insta-3.jpg">--}}
{{--            <div class="inside-text">--}}
{{--                <i class="ti-instagram"></i>--}}
{{--                <h5><a href="#">CodeLean_Colecttion</a></h5>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="insta-item set-bg" data-setbg="front/img/insta-4.jpg">--}}
{{--            <div class="inside-text">--}}
{{--                <i class="ti-instagram"></i>--}}
{{--                <h5><a href="#">CodeLean_Colecttion</a></h5>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="insta-item set-bg" data-setbg="front/img/insta-5.jpg">--}}
{{--            <div class="inside-text">--}}
{{--                <i class="ti-instagram"></i>--}}
{{--                <h5><a href="#">CodeLean_Colecttion</a></h5>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="insta-item set-bg" data-setbg="front/img/insta-6.jpg">--}}
{{--            <div class="inside-text">--}}
{{--                <i class="ti-instagram"></i>--}}
{{--                <h5><a href="#">CodeLean_Colecttion</a></h5>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Từ diễn đàn</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-blog">
                            <img src="front/img/blog/{{$blog->image}}" alt="">
                            <div class="latest-text">
                                <div class="tag-list">
                                    <div class="tag-item">
                                        <i class="fa fa-calendar-o"></i>
                                        {{date('M d, Y', strtotime($blog->created_at))}}
                                    </div>
                                    <div class="tag-item">
                                        <i class="fa fa-comment-o"></i>
                                        {{count($blog->blogComments)}}
                                    </div>
                                </div>
                                <a href="">
                                    <h4>{{$blog->title}}</h4>
                                </a>
                                <p>{{$blog->subtitle}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Ship</h6>
                                <p>Cho hóa đơn trên 800.000<sup>đ</sup></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Giao hạn tận nơi</h6>
                                <p>Xử lý tại chỗ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-3.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Bảo mật thanh toán</h6>
                                <p>Lên đến 100%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->
@endsection

