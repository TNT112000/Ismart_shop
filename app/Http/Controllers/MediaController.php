<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Media::all();
        return view('admin.pages.list_media',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.add_media');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMediaRequest $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'location' => 'required',
            'link' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $file_name = $imageFile->getClientOriginalName();
            $path = $imageFile->move('public/admin/images', $imageFile->getClientOriginalName());
            $name_image = 'admin/images/' . $file_name;
            $data['image'] = $name_image;
        }
        $data['created_by'] = 'Admin';

        Media::create($data);
        return redirect()->route('media.create')->with('status', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMediaRequest $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        //
    }
}
