<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Slider::all();
        return view('admin.pages.list_slider', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.pages.add_slider');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'location' => 'required',
            'link'=>'required',
        ]);

        

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $file_name = $imageFile->getClientOriginalName();
            $path = $imageFile->move('public/admin/images', $imageFile->getClientOriginalName());
            $name_image = 'admin/images/' . $file_name;
            $data['image'] = $name_image;
        }
        $data['created_by'] = 'Admin';

        Slider::create($data);
        return redirect()->route('slider.create')->with('status', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        //
    }
}
