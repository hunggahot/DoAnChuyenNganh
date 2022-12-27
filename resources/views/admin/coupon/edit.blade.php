@extends('admin.layout.master')

@section('title', 'Coupon')

@section('body')
                <!-- Main -->
                <div class="app-main__inner">

                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>
                                    Coupon
                                    <div class="page-title-subheading">
                                        View, create, update, delete and manage.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <form method="post" action="admin/coupon/{{$coupon->id}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Tên</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="name" id="name" placeholder="Name" type="text"
                                                    class="form-control" value="{{$coupon->name}}">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Code</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="code" id="code" placeholder="Code" type="text"
                                                       class="form-control" value="{{$coupon->code}}">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Tính năng</label>
                                            <div class="col-md-9 col-xl-8">
                                                <select required name="condition" id="condition" class="form-control">
                                                    <option value="">-- Tính năng --</option>
                                                    @foreach(\App\Utilities\Constant::$coupon_condition as $key => $value)
                                                        <option value={{$key}} {{$coupon->condition == $key ? 'selected' : ''}}>
                                                            {{$value}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Số giảm</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="number" id="number" placeholder="Số giảm" type="text"
                                                       class="form-control" value="{{$coupon->number}}">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Số lượng</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="times" id="times" placeholder="Số lượng" type="text"
                                                       class="form-control" value="{{$coupon->times}}">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Ngày bắt đầu</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="date_start" id="start_coupon" placeholder="Ngày bắt đầu" type="text"
                                                       class="form-control" value="{{$coupon->date_start}}">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Ngày kết thúc</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input required name="date_start" id="end_coupon" placeholder="Ngày kết thúc" type="text"
                                                       class="form-control" value="{{$coupon->date_end}}">
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group mb-1">
                                            <div class="col-md-9 col-xl-8 offset-md-2">
                                                <a href="#" class="border-0 btn btn-outline-danger mr-1">
                                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                                        <i class="fa fa-times fa-w-20"></i>
                                                    </span>
                                                    <span>Cancel</span>
                                                </a>

                                                <button type="submit"
                                                    class="btn-shadow btn-hover-shine btn btn-primary">
                                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                                        <i class="fa fa-download fa-w-20"></i>
                                                    </span>
                                                    <span>Save</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->
@endsection
