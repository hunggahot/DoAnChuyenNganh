@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('body')
                <!-- Main -->
                <div class="app-main__inner">
{{--                    <div class="app-page-title">--}}
{{--                        <div class="page-title-wrapper">--}}
{{--                            <div class="page-title-heading">--}}
{{--                                <div class="page-title-icon">--}}
{{--                                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    User--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div class="align-self-center">
                                                <i class="fas fa-tshirt text-info fa-3x"></i>
                                            </div>
                                            <div class="text-end">
                                                <h3>{{$product_count}}</h3>
                                                <p class="mb-0">Sản phẩm</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div class="align-self-center">
                                                <i class="fas fa-pencil-alt text-info fa-3x"></i>
                                            </div>
                                            <div class="text-end">
                                                <h3>{{$blog_count}}</h3>
                                                <p class="mb-0">Bài viết</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div class="align-self-center">
                                                <i class="fas fa-shopping-cart text-info fa-3x"></i>
                                            </div>
                                            <div class="text-end">
                                                <h3>{{$order_count}}</h3>
                                                <p class="mb-0">Đơn hàng đã đặt</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb3 card">
                                    <div class="card-body">
                                        <form action="">
                                            @csrf
                                            <div class="position-relative row form-group">
                                                <label for="name" class="col-md-3 text-md-right col-form-label">Từ ngày</label>
                                                <div class="col-md-9 col-xl-8">
                                                    <input id="datepicker" placeholder="Từ ngày" type="text"
                                                           class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="name" class="col-md-3 text-md-right col-form-label">Đến ngày</label>
                                                <div class="col-md-9 col-xl-8">
                                                    <input id="datepicker2" placeholder="Đến ngày" type="text"
                                                           class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="name" class="col-md-3 text-md-right col-form-label">Lọc theo</label>
                                                <div class="col-md-9 col-xl-8">
                                                    <select class="dashboard-filter form-control">
                                                        <option>--Chọn--</option>
                                                        <option value="7ngay">7 ngày qua</option>
                                                        <option value="thangtruoc">Tháng trước</option>
                                                        <option value="thangnay">Tháng này</option>
                                                        <option value="365ngayqua">365 ngày qua</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group mb-1">
                                                <div class="col-md-9 col-xl-8 offset-md-2">
                                                    <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-shadow btn-hover-shine" value="Lọc">
{{--                                                    <button id="btn-dashboard-filter"--}}
{{--                                                            class="btn-shadow btn-hover-shine btn btn-primary">--}}
{{--                                                    <span class="btn-icon-wrapper pr-2 opacity-8">--}}
{{--                                                        <i class="fa fa-download fa-w-20"></i>--}}
{{--                                                    </span>--}}
{{--                                                        <span>Lọc</span>--}}
{{--                                                    </button>--}}
                                                </div>
                                            </div>
                                        </form>

                                        <div id="chart" style="height: 250px;"></div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Main -->
@endsection


