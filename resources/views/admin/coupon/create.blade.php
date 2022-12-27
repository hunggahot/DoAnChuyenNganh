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

                                    @include('admin.components.notification')

                                    <form method="post" action="admin/coupon" enctype="multipart/form-data">
                                        @csrf
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Tên</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="name" id="name" placeholder="Tên" type="text"
                                                    class="form-control" value="{{old('name')}}">
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Code</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="code" id="code" placeholder="Code" type="text"
                                                       class="form-control" value="{{old('code')}}">
                                                @error('code')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Giảm theo</label>
                                            <div class="col-md-9 col-xl-8">
                                                <select name="condition" id="condition" class="form-control">
                                                    <option value="">-- Tính năng --</option>
                                                    @foreach(\App\Utilities\Constant::$coupon_condition as $key => $value)
                                                        <option value={{$key}} {{old('condition') == $key ? 'selected' : ''}}>
                                                            {{$value}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('condition')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Giảm giá</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="number" id="number" placeholder="Giảm giá" type="text"
                                                       class="form-control" value="{{old('number')}}">
                                                @error('number')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Số lượng</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="times" id="times" placeholder="Số lượng" type="text"
                                                       class="form-control" value="{{old('times')}}">
                                                @error('times')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Ngày bắt đầu</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="date_start" id="start_coupon" placeholder="Ngày bắt đầu" type="text"
                                                       class="form-control" value="{{old('date_start')}}">
                                                @error('date_start')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">Ngày kết thúc</label>
                                            <div class="col-md-9 col-xl-8">
                                                <input name="date_end" id="end_coupon" placeholder="Ngày kết thúc" type="text"
                                                       class="form-control" value="{{old('date_end')}}">
                                                @error('date_end')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
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
