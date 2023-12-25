<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Line;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product_image;
use App\Models\Introduce;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::paginate(5);
        return view('admin.pages.list_product', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data1 = Category::all();
        // dd($data1);
        $data2 = Line::all();
        return view('admin.pages.add_product', ['data1' => $data1]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->input());
        $value = $request->input('product_code');
        $data_set = Product::where('product_code', $value)->count();
        // dd($request->input('image_main'));


        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:40',
            'price' => 'required',
            'qty' => 'required',
            'image_main' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'describe' => 'required',
            'product_code' => 'required',
            'transport' => 'required',
            'category_id' => 'required',
            'line_id' => 'required',
            'image_product.*' => 'required',
        ]);
        if ($data_set > 0) {
            $validator->errors()->add('product_code', 'Mã sản phẩm đã tồn tại');
        };

        // Thêm điều kiện kiểm tra tùy chỉnh cho trường product_code

        $errors = $validator->errors();

        if ($errors->count() > 0) {
            return redirect()->route('product.create')
                ->withErrors($errors)
                ->withInput();
        }

        $data = $request->input();

        $imageFile = $request->file('image_main');
        $file_name = $imageFile->getClientOriginalName();
        $path = $imageFile->move('public/admin/images', $imageFile->getClientOriginalName());
        $name_image = 'admin/images/' . $file_name;
        $data['image_main'] = $name_image;

        $productId = Product::create($data)->id;
        $i = 0;

        $imageProduct = $request->file('image_product');
        foreach ($imageProduct as $imageFile) {
            $file_name = $imageFile->getClientOriginalName();
            $i++;
            $imageProduct = $imageFile->move('public/admin/images', $imageFile->getClientOriginalName());
            $name_image = 'admin/images/' . $file_name;
            Product_image::create([
                'name' => $name_image,
                'product_id' => $productId,
            ]);
            // $image_product[$i]['name']=$imageProduct;
            // $image_product[$i]['product_id']=$productId;
        }


        return redirect()->route('product.create')->with('status', 'Thêm dữ liệu thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    public function product_detail()
    {
        return view('pages.product_detail');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data2 = Product_image::with(['product'])->where('product_id', $id)->get();
        $data3 = Product_image::where('product_id', $id)->count();
        $data1 = Category::all();
        $data = Product::with(['category', 'line'])
            ->where('id', $id)
            ->first();

        return view('admin.pages.edit_product', ['data' => $data, 'data1' => $data1, 'data2' => $data2, 'data3' => $data3]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->input());

        $value = $request->input('product_code');
        $check = Product::where('id', $id)->value('product_code');
        $data_set = Product::where('product_code', $value)->count();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:40',
            'price' => 'required',
            'qty' => 'required',

            // 'image_main' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'describe' => 'required',
            'product_code' => 'required',
            'transport' => 'required',
            'category_id' => 'required',
            'line_id' => 'required',

            // 'image_product.*' => 'required',
        ]);
        if (!($value == $check)) {
            if ($data_set > 0) {
                $validator->errors()->add('product_code', 'Mã sản phẩm đã tồn tại');
            }
        };

        // Thêm điều kiện kiểm tra tùy chỉnh cho trường product_code

        $errors = $validator->errors();

        if ($errors->count() > 0) {
            return redirect()->route('product.edit', ['product' => $id])
                ->withErrors($errors)
                ->withInput();
        }

        $data = $request->input();
        $data = $request->except('_token', 'btn-submit', 'image_product');

        if ($request->hasFile('image_main')) {

            $imageFile = $request->file('image_main');
            $file_name = $imageFile->getClientOriginalName();
            $path = $imageFile->move('public/admin/images', $imageFile->getClientOriginalName());
            $name_image = 'admin/images/' . $file_name;
            $data['image_main'] = $name_image;
        }



        // dd($data);
        Product::where('id', $id)->update($data);

        $i = 0;

        if ($request->hasFile('image_product')) {
            $imageProduct = $request->file('image_product');
            foreach ($imageProduct as $imageFile) {
                $file_name = $imageFile->getClientOriginalName();
                $i++;
                $imageProduct = $imageFile->move('public/admin/images', $imageFile->getClientOriginalName());
                $name_image = 'admin/images/' . $file_name;
                Product_image::create([
                    'name' => $name_image,
                    'product_id' => $id,
                ]);
            }
        }

        return redirect()->route('product.edit', ['product' => $id])->with(['status' => 'Chỉnh sửa thành thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $product = Product::find($id);
        
        $product->product_image()->delete();
        $product->delete();
        
        return redirect()->route('product.index')->with(['status' => 'Xóa thành công']);
    }
    public function restore($id){
        $product = Product::onlyTrashed()->find($id);
        $product->restore();
        $product->product_image()->withTrashed()->restore();
        return redirect()->route('product.status')->with(['status' => 'Khôi phục thành công']);
    }

    public function destroy_trash($id)
    {
      
        $product = Product::onlyTrashed()->find($id);
        $product->forceDelete();
        Product_image::where('product_id',$id)->delete();
       
        return redirect()->route('product.status')->with(['status' => 'Xóa thành công']);
    }

    public function status(Request $request)
    {
        $data = $request->input('actions');
        
        if ($data == 1) {
            return redirect()->route('product.index');
            
        }
        else{
            $data = Product::onlyTrashed()->paginate(5);
           
            return view('admin.pages.list_product_trash', ['data' => $data]);
        }
        
    }

    


    public function showProduct()
    {
        $introduce=Introduce::all()->first();
        $category=Category::paginate(8);
        $line=Line::all();
        $product_hot=Product::where('hot','1')->paginate(10);
        $product = Product::paginate(20);
        return view('pages.product', ['product' => $product,'line'=>$line,'category'=>$category,'product_hot'=>$product_hot,'introduce'=>$introduce]);
    }

    public function ProductHot()
    {
        $data1 = Product::where('hot', '<>', 1)->get();
        $data = Product::where('hot', '1')->get();
        return view('admin.pages.product_hot', ['data1' => $data1, 'data' => $data]);
    }


    public function ProductSell()
    {
        $data = Product::all();
        return view('admin.pages.product_sell', ['data' => $data]);
    }
    

    public function ProductSearch(Request $request)
    {
        $introduce=Introduce::all()->first();
        $value=$request->input('search');
        $category=Category::paginate(8);
        $line=Line::all();
        $product_hot=Product::where('hot','1')->paginate(10);
        
        $data = Product::where('name', 'LIKE', '%' . $value . '%')->paginate(10);
        
        return view('pages.search', ['data' => $data,'line'=>$line,'category'=>$category,'product_hot'=>$product_hot,'introduce'=>$introduce]);
    }

    public function ProductCategory($id)
    {
        $introduce=Introduce::all()->first();
        // $value=$request->input('category');
        $category=Category::paginate(8);
        $line=Line::all();
        $product_hot=Product::where('hot','1')->paginate(10);
        
        $product = Product::where('category_id',$id)->paginate(10);
        
        return view('pages.category', ['product' => $product,'line'=>$line,'category'=>$category,'product_hot'=>$product_hot,'introduce'=>$introduce]);
    }


    public function ProductLine($id)
    {
        $introduce=Introduce::all()->first();
        // $value=$request->input('line');
        $category=Category::paginate(8);
        $line=Line::all();
        $product_hot=Product::where('hot','1')->paginate(10);
        
        $product = Product::where('line_id', $id)->paginate(10);
        
        return view('pages.line', ['product' => $product,'line'=>$line,'category'=>$category,'product_hot'=>$product_hot,'introduce'=>$introduce]);
    }
}
