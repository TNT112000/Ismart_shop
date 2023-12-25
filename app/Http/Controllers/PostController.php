<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Introduce;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = post::paginate(10);
        return view('admin.pages.list_post', ['data' => $data]);
    }

    public function listPostAdmin()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.pages.add_post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'image' => 'required',
            'content' => 'required',
        ]);

        $imageFile = $request->file('image');
        $file_name = $imageFile->getClientOriginalName();
        $path = $imageFile->move('public/admin/images', $imageFile->getClientOriginalName());
        $name_image = 'admin/images/' . $file_name;
        $data['image'] = $name_image;
        $data['created_by'] = 'Admin';

        post::create($data);
        return redirect()->route('post.create')->with('status', 'Thêm danh mục thành công');
    }
    public function showPost()
    {
        $introduce=Introduce::all()->first();
        $product_hot=Product::where('hot','1')->paginate(10);
        $data=Post::paginate(5);
        return view('pages.post',['product_hot'=>$product_hot,'data'=>$data,'introduce'=>$introduce]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = post::where('id', $id)->first();
        return view('admin.pages.edit_post', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $data = $request->input();
        $data = $request->except('_token', 'btn-submit');

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $file_name = $imageFile->getClientOriginalName();
            $path = $imageFile->move('public/admin/images', $imageFile->getClientOriginalName());
            $name_image = 'admin/images/' . $file_name;
            $data['image'] = $name_image;
           
        }

        Post::where('id', $id)->update($data);

        return redirect()->route('post.edit', ['post' => $id])->with(['status' => 'Chỉnh sửa thành thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        $post->delete();
        
        return redirect()->route('post.index')->with(['status' => 'Xóa thành công']);
    }
    public function restore($id){
        $post = post::onlyTrashed()->find($id);
        $post->restore();
        return redirect()->route('post.status')->with(['status' => 'Khôi phục thành công']);
    }

    public function destroy_trash($id)
    {
      
        $post = post::onlyTrashed()->find($id);
        $post->forceDelete();
        return redirect()->route('post.status')->with(['status' => 'Xóa thành công']);
    }

    public function status(Request $request)
    {
        $data = $request->input('actions');
        
        if ($data == 1) {
            return redirect()->route('post.index');
            
        }
        else{
            $data = post::onlyTrashed()->paginate(5);
            return view('admin.pages.list_post_trash', ['data' => $data]);
        }
        
    }

    

}
