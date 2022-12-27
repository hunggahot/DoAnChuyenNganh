<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Statistic;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $product_count = Product::count();
        $blog_count = Blog::count();
        $order_count = Order::count();
//        $total_price = intval(OrderDetail::where('total', 'sum'));
        return view('admin.dashboard.index', compact('product_count', 'blog_count', 'order_count'));
    }


    public function filter_by_date(Request $request){

        $data = $request->all();

        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = Statistic::whereBetween('order_date', [$from_date, $to_date])->orderBy('order_date', 'ASC')->get();


        $chart_data = [];

        foreach ($get as $key => $val){

            $chart_data[] = array(
              'period' => $val->order_date,
              'order' => $val->total_order,
              'sales' => $val->sales,
              'profit' => $val->profit,
              'quantity' => $val->quantity,
            );
        }

        echo $data =  json_encode($chart_data);
    }

    public function dashboard_filter(Request $request){

        $data = $request->all();

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value'] == '7ngay'){
            $get = Statistic::whereBetween('order_date', [$sub7days, $now])->orderBy('order_date', 'ASC')->get();
        } elseif($data['dashboard_value'] == 'thangtruoc'){
            $get = Statistic::whereBetween('order_date', [$dau_thangtruoc, $cuoi_thangtruoc])->orderBy('order_date', 'ASC')->get();
        } elseif($data['dashboard_value'] == 'thangnay'){
            $get = Statistic::whereBetween('order_date', [$dauthangnay, $now])->orderBy('order_date', 'ASC')->get();
        } else{
            $get = Statistic::whereBetween('order_date', [$sub365days, $now])->orderBy('order_date', 'ASC')->get();
        }

        $chart_data = [];

        foreach ($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity,
            );
        }

        echo $data =  json_encode($chart_data);
    }

    public function days_order(Request $request){
        $sub60days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(60)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Statistic::whereBetween('order_date', [$sub60days, $now])->orderBy('order_date', 'ASC')->get();

        $chart_data = [];

        foreach ($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity,
            );
        }

        echo $data =  json_encode($chart_data);
    }
}
