<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Order\OrderServiceInterface;
use App\Services\User\UserServiceInterface;
use App\Utilities\Constant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    private $userService;
    private $orderService;

    public function __construct(UserServiceInterface $userService,
                                OrderServiceInterface $orderService)
    {
        $this->userService = $userService;
        $this->orderService = $orderService;
    }

    public function login()
    {
        return view('front.account.login');
    }

    public function checkLogin(Request $request){
        $credentials = [
          'email' => $request->email,
          'password' => $request->password,
          'level' => Constant::user_level_client,
        ];

        $remember = $request->remember;

        if(Auth::attempt($credentials, $remember)){
            return redirect('/'); //Mặc định là: trang chủ.
        } else{
            return back()
                ->with('notification', 'Sai email hoặc mật khẩu');
        }
    }

    public function logout(){
        Auth::logout();

        return back();
    }

    public function register()
    {
        return view('front.account.register');
    }

    public function postRegister(Request $request)
    {
        if($request->password != $request->password_confirmation){
            return back()
                ->with('notification', 'Xác nhận mật khẩu không đúng với mật khẩu đã nhập.');
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => Constant::user_level_client,
        ];

        $this->userService->create($data);

        return redirect('account/login')
            ->with('notification', 'Đăng ký tài khoản thành công! Xin vui lòng đăng nhập.');
    }

    public function myOrderIndex()
    {
        $orders = $this->orderService->getOrderByUserId(Auth::id());

        return view('front.account.my-order.index', compact('orders'));
    }

    public function myOrderShow($id)
    {
        $order = $this->orderService->find($id);

        return view('front.account.my-order.show', compact('order'));
    }

    public function forgot_pass(){
        $notification = session('notification');
        return view('front.account.forget', compact('notification'));
    }

    public function recover_pass(Request $request){
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $user = User::where('email', '=', $data['email'])->get();
        foreach ($user as $key => $value){
            $user_id = $value->id;
        }
        if($user){
            $count_user = $user->count();
            if($count_user == 0){
                return redirect()->back()
                    ->with('notification', 'Email chưa được đăng ký hoặc sai Email');
            } else{
                $token_random = Str::random();
                $user = User::find($user_id);
                $user->remember_token = $token_random;
                $user->save();

                $this->sendEmail($user, $token_random);
                return redirect()->back()
                    ->with('notification', 'Gửi mail thành công, vui lòng kiểm tra mail để reset mật khẩu');
            }

        }
    }

    public function reset_pass(Request $request){
        $data = $request->all();
        $token_random = Str::random();
        $user = User::where('email', '=' , $data['email'])->where('remember_token', '=', $data['token'])->get();
        $count = $user->count();
        if($count>0){
            foreach ($user as $key => $cus){
                $user_id = $cus->id;
            }
            $reset = User::find($user_id);
            $reset->password = bcrypt($data['password']);
            $reset->remember_token =$token_random;
            $reset->save();
            return redirect('account/login')->with('notification', 'Mật khẩu đã được câập nhật thành công.');
        } else{
            return redirect('account/forgot-pass')->with('notification', 'Link đã quá hạn, vui lòng nhập lại email.');
        }
    }

    public function update_pass(Request $request){
        return view('front.account.update');
    }

    private function sendEmail($user, $token_random)
    {
        $email_to = $user->email;
        $link_reset_pass = url('/account/update-pass?email='.$email_to. '&token='.$token_random);

        Mail::send('front.account.email',
            compact('user', 'link_reset_pass'),
            function ($message) use ($email_to){
                $message->from('hphstore2022@gmail.com', 'Hph Store');
                $message->to($email_to, $email_to);
                $message->subject('Nhập lại mật khẩu');
            });
    }
}
