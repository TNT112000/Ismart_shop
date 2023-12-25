<?php

namespace App\Http\Controllers;

use App\Models\Line;
use App\Models\Product;
use App\Models\Product_image;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function showListLine(Request $request)
    {
        $id = $request->input('id');
        $data_line = line::where('category_id', $id)->get();
        response()->json($data_line);
        return $data_line;
    }

    public function showProductCode(Request $request)
    {

        $value = $request->input('value');
        $data = Product::where('product_code', $value)->count();
        return $data;
    }

    public function addProductHot(Request $request)
    {
        $name = $request->input('id');
        $check = Product::where('name', $name)->where(['hot' => '1'])->first();
        if ($check) {
            $data['result'] = 1;
            return response()->json($data);
        } else {
            $check1 = Product::where('name', $name)->first();
            if ($check1) {
                Product::where('name', $name)->update(['hot' => '1']);


                $get = Product::where('name', $name)->get();
                $list = Product::where('hot', '<>', 1)->get();
                $count = Product::where('hot', '1')->count();
                // $get['count']=$count;
                // dd($get);
                $data['get'] = $get;
                $data['count'] = $count;
                $data['list'] = $list;
                $data['result'] = 0;
                response()->json($data);
                // $data=Product::all();
                return $data;
            } else {
                $data['result'] = 2;
                return response()->json($data);
            }
        }
    }

    public function removeProductImage(Request $request){
        $data1=$request->input('data1');
        $data2=$request->input('data2');
        Product_image::destroy($data1);

        $num=Product_image::where('product_id',$data2)->count();

        return response()->json($num);
    }


    // public function ProductHot_add(Request $request ){
    // $name=$request->input('id');
    // Product::where('name',$name)->update(['hot'=>'1'])->id();

    // // $data=Product::where('name',$name)->get();

    // // response()->json($data);
    // $data=Product::all();
    // return $data;
    // }


}
