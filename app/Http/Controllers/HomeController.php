<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Introduce;
use App\Models\Line;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $introduce=Introduce::all()->first();
        $category=Category::paginate(8);
        $line=Line::all();
        $product_hot=Product::where('hot','1')->paginate(10);
        $product = Product::paginate(20);
        return view('pages.home',['product'=>$product,'category'=>$category,'line'=>$line,'product_hot'=>$product_hot,'introduce'=>$introduce]);
    }

    public function login(){
        return view('auth.login');
    }
    public function home(){
        return view('admin.pages.home');
    }
}
