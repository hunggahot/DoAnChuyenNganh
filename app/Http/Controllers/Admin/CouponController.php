<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use App\Services\Coupon\CouponServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    private $couponService;

    public function __construct(CouponServiceInterface $couponService)
    {
        $this->couponService = $couponService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $coupons = $this->couponService->searchAndPaginate('name', $request->get('search'));

        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');


        return view('admin.coupon.index', compact('coupons', 'today'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');

        return view('admin.coupon.create', compact('today'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        $data = $request->all();
        $this->couponService->create($data);


        return redirect('admin/coupon');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupon = $this->couponService->find($id);

        return view('admin.coupon.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = $this->couponService->find($id);
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');

        return view('admin.coupon.edit', compact('coupon', 'today'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->couponService->update($data, $id);

        return redirect('admin/coupon/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->couponService->delete($id);

        return redirect('admin/coupon');
    }

}
