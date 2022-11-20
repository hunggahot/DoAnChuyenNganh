<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\Constant;
use App\Utilities\VNPay;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    private $orderService;
    private $orderDetailService;

    public function __construct(OrderDetailServiceInterface $orderDetailService,
                                OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('front.checkout.index', compact('carts', 'total', 'subtotal'));
    }

    public function addOrder(Request $request)
    {
        //Add Order
        $data = $request->all();
        $data['status'] = Constant::order_status_ReceiveOrders;
        $order = $this->orderService->create($data);

        //Add Order Details
        $carts = Cart::content();

        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->qty * $cart->price,
            ];

            $this->orderDetailService->create($data);
        }

        if($request->payment_type == 'pay_later'){
            //Send Email
            $total = Cart::total();
            $subtotal = Cart::subtotal();
            $this->sendEmail($order, $total, $subtotal);

            //Delete Order
            Cart::destroy();

            //Notification
            return redirect('checkout/result')
                ->with('notification', 'Đã thanh toán đơn hành thành công. Xin vui lòng kiểm tra lại Mail của bạn!');
        }

        if($request->payment_type == 'online_payment'){
            //Take VNPay URL
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef' => $order->id, //Order Id
                'vnp_OrderInfo' =>  'Mô tả đơn hàng tại đây...', //Mô tả đơn hàng
                'vnp_Amount' => Cart::total(0, '', '') * 24807, //Tổng giá đơn hàng
            ]);

            //URL link redirect
            return redirect()->to($data_url);

        }
    }

    public function vnPayCheck(Request $request)
    {
        //Take URL data (VNPay send from $vnp_Returnurl)
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');
        $vnp_TxnRef = $request->get('vnp_TxnRef'); //order_id
        $vnp_Amount = $request->get('vnp_Amount'); //Price

        //Check data, result
        if($vnp_ResponseCode != null){
            //Success
            if($vnp_ResponseCode == 00){
                //Update Status
                $this->orderService->update([
                    'status' => Constant::order_status_Paid,
                ], $vnp_TxnRef);

                //Send Mail
                $order = $this->orderService->find($vnp_TxnRef); // $vnp_TxnRef = order_Id
                $total = Cart::total();
                $subtotal = Cart::subtotal();
                $this->sendEmail($order, $total, $subtotal);

                //Delete Cart
                Cart::destroy();

                //Result announcement
                return redirect('checkout/result')
                    ->with('notification', 'Đã thanh toán đơn hành thành công. Xin vui lòng kiểm tra lại Mail của bạn!');
            } else{ //Failed
                //Delete Order added to database
                $this->orderService->delete($vnp_TxnRef);

                //Error announcement
                return redirect('checkout/result')
                    ->with('notification', 'Đơn hàng bị lỗi hoặc bị hủy.');
            }
        }
    }

    public function result()
    {
        $notification = session('notification');
        return view('front.checkout.result', compact('notification'));
    }

    private function sendEmail($order, $total, $subtotal)
    {
        $email_to = $order->email;

        Mail::send('front.checkout.email',
            compact('order', 'total', 'subtotal'),
            function ($message) use ($email_to){
                $message->from('hphstore2022@gmail.com', 'Hph Store');
                $message->to($email_to, $email_to);
                $message->subject('Thông báo đơn hàng');
        });
    }
}
