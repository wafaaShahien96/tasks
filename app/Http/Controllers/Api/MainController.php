<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


class MainController extends Controller
{
    public function products(Request $request)
    {
        $products = Product::all();
        return response()->json([1, 'Successful Data', $products]);
    }
    public function product_category(Request $request)
    {
        $product = Product::where(function($query)use($request){

            if($request->has($key='category_id'))
            {
              $query->where('category_id',$request->category_id);
            }
         })->get();
        return response()->json([1, 'Successful Data',
        'product' => $product]);

    }
    public function name(Request $request)
    {
        $product = Product::where(function($query)use($request){

            if($request->has($key='name'))
            {
              $query->where('name',$request->name);
            }
         })->get();
        return response()->json([1, 'Successful Data',
        'product' => $product]);

    }
    public function desc(Request $request)
    {
        $product = Product::where(function($query)use($request){

            if($request->has($key='desc'))
            {
              $query->where('desc',$request->desc);
            }
         })->get();
        return response()->json([1, 'Successful Data',
        'product' => $product]);

    }
    public function tag(Request $request)
    {
        $product = Product::where(function($query)use($request){

            if($request->has($key='desc'))
            {
              $query->where('desc',$request->desc);
            }
         })->get();
        return response()->json([1, 'Successful Data',
        'product' => $product]);

    }
}
