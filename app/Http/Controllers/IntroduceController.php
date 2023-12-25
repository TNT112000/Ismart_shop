<?php

namespace App\Http\Controllers;

use App\Models\Introduce;
use App\Http\Requests\StoreIntroduceRequest;
use App\Http\Requests\UpdateIntroduceRequest;
use App\Models\Product;
class IntroduceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.introduce');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
            $data=Introduce::all();
          
        return view('admin.pages.add_introduce',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIntroduceRequest $request)
    {
        
        $data=$request->validate([
            'mxh'=>'required',
            'email'=> 'required',
            'phone'=>'required',
            'address'=>'required',
            'title'=> 'required',
            'content'=> 'required',
        ]);

        Introduce::truncate();
        Introduce::create($data);
        

        return redirect()->route('introduce.create')->with('status','Thêm danh mục thành công');

    }

    /**
     * Display the specified resource.
     */
    public function show(Introduce $introduce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Introduce $introduce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIntroduceRequest $request, Introduce $introduce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Introduce $introduce)
    {
        //
    }

    public function showIntroduce(){
        $product_hot=Product::where('hot','1')->paginate(10);
        $introduce=Introduce::all()->first();
        return view('pages.introduce',['product_hot'=>$product_hot,'introduce'=>$introduce]);
    }
}
