<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(){
        $products = Product::all();
        return response()->json([
           'code' => 200,
            'data' => $products,
        ], 200);
    }
}
