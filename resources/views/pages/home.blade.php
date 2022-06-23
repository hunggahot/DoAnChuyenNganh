{{-- file chứa các dữ liệu được đẩy lên trang chủ --}}

@extends('index')
@section('content')

<div class="features_items"><!--features_items-->
    <div class="category-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">

                <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
                
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="tshirt" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div><!--/category-tab-->
    {{-- </div><!--/category-tab-->
    <div class="category-tab">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                @php
                    $i = 0;
                @endphp
                @foreach ($cate_pro_tabs as $key => $cat_tabs)
                    @php
                        $i++;
                    @endphp
                    <li data-id="{{$cat_tabs->category_id}}" id="{{$i==1 ? 'tabs_id' : ''}}" class="{{$i==1 ? 'active' : ''}} tabs_pro">
                        <a href="#{{$cat_tabs->slug_category_product}}" data-toggle="tab">{{$cat_tabs->category_name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div id="tabs_product"></div>
    </div> --}}
    <h2 class="title text-center">Hàng mới về</h2>
    @foreach($all_product as $key => $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <form>
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                        <a href="{{URL::to('/product-details/'.$product->product_slug)}}">
                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                        <h2>{{number_format($product->product_price,0,',','.')}}<sup>đ</sup></h2>
                        <p>{{$product->product_name}}</p>
                        </a>
                        {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a> --}}
                        <button type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">Thêm vào giỏ hàng</button>
                        </form>
                    </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào yêu thích</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>So sánh sản phẩm</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div><!--features_items-->
<ul class="pagination pagination-sm m-t-none m-b-none">
    {!!$all_product->links()!!}
   </ul>

@endsection