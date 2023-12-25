<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Carbon;
use App\Http\Controllers\UtilitiesController;
use Illuminate\Http\Request;
use App\Models\Line;
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=category::paginate(10); 
        // $date = $data->created_at->format('d-m-Y');
        // $data=UtilitiesController::FormatDatetime($data);
        return view('admin.pages.list_category',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.pages.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data=$request->validate([
            'name' => 'required|string|max:40',
            'url'=> 'required|string|max:100',
        ]
        );

        $num = Category::count();
        $data['created_by'] = 'Admin';
        $data['stt']= $num + 1 ;

        Category::create($data);

        return redirect()->route('category.create')->with('status','Thêm danh mục thành công');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=Category::where('id',$id)->first();
        return view('admin.pages.edit_category',['data'=>$data]);
    }

    public function update(request $request,$id){
        $data=$request->validate([
            'name' => 'required|string|max:40',
            'url'=> 'required|string|max:100',
        ]
        );
        $data = $request->input();
        $data = $request->except('_token', 'btn-submit');

        Category::where('id',$id)->update($data);

        return redirect()->route('category.edit',['category'=> $id])->with('status','Chỉnh sửa thành công');
    }

    /**
     * Update the specified resource in storage.
     */
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        $data1=line::with('category')->where('category_id',$id)->count();
        $data2=Product::with('category')->where('category_id',$id)->count();
        $data=$data1+$data2;
        // dd($data2);
        
        if($data <1){
            category::destroy($id);
            return redirect()->route('category.index')->with('status','Xóa thành công');
        }
        else{
            return redirect()->route('category.index')->with('error','Xóa thất bại , line và product đang sử dụng');
        }
    }
}
