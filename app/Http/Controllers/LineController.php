<?php

namespace App\Http\Controllers;

use App\Models\Line;
use App\Http\Requests\StoreLineRequest;
use App\Http\Requests\UpdateLineRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class LineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data=line::all();
        $data = Line::with('category')->paginate(10);
        return view('admin.pages.list_line',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=category::all();
        return view('admin.pages.add_line',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLineRequest $request)
    {

        $data=$request->validate([
            'name' => 'required|string|max:40',
            'category_id'=> 'required',
        ]
        );

        $data['created_by'] = 'Admin';

        Line::create($data);

        return redirect()->route('line.create')->with('status','Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Line $line)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data1=Line::with('category')->where('id',$id)->first();
        $data=category::all();
        return view('admin.pages.edit_line',['data1'=>$data1,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        $data=$request->validate([
            'name' => 'required|string|max:40',
            'category_id'=> 'required',
        ]
        );

        Line::where('id', $id)->update($data);

        return redirect()->route('line.edit',['line'=>$id])->with('status','Chỉnh sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $data=Product::with('line')->where('line_id',$id)->count();
        
        // dd($data2);
        
        if($data <1){
            line::destroy($id);
            return redirect()->route('line.index')->with('status','Xóa thành công');
        }
        else{
            return redirect()->route('line.index')->with('error','Xóa thất bại , line và product đang sử dụng');
        }

       
    }
}
