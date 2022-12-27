<?php

namespace App\Utilities;

class Constant
{
    /*
     *
     *
     * Chứa các hằng số dùng chung cho hệ thống
     *
     *
     *
     *
     */

    //Order
    const order_status_ReceiveOrders = 1;
    const order_status_Unconfirmed = 2;
    const order_status_Confirmed= 3;
    const order_status_Paid = 4;
    const order_status_Processing = 5;
    const order_status_Shipping = 6;
    const order_status_Finish = 7;
    const order_status_Cancel = 8;

    public static $order_status = [
        self::order_status_ReceiveOrders => 'Receive Orders',
        self::order_status_Unconfirmed => 'Unconfirmed',
        self::order_status_Confirmed => 'Confirmed',
        self::order_status_Paid => 'Paid',
        self::order_status_Processing => 'Processing',
        self::order_status_Shipping => 'Shipping',
        self::order_status_Finish => 'Finish',
        self::order_status_Cancel => 'Cancel',
    ];

    //User
    const user_level_host = 0;
    const user_level_admin = 1;
    const user_level_client = 2;

    public static $user_level = [
        self::user_level_host => 'host',
        self::user_level_admin => 'admin',
        self::user_level_client => 'client',
    ];

    //Coupon
    const coupon_condition_percent = 1;
    const coupon_condition_price = 2;

    public static $coupon_condition = [
        self::coupon_condition_percent => 'Phần trăm',
        self::coupon_condition_price => 'Giá tiền',
    ];

    const coupon_status_due = "Còn hạn";
    const coupon_status_expired = "Hết hạn";

    public static $coupon_status = [
        self::coupon_status_due,
        self::coupon_status_expired,
    ];

}
