@extends('admin.layouts.main')

@section('content')
    <div id="main-content-wp" class="add-cat-page slider-page">
        <div class="wrap clearfix">
            @include('admin.layouts.sidebar')
            <div id="content" class="fl-right">
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Thêm Slider</h3>
                    </div>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form method="POST" action="{{ route('media.store') }}" enctype="multipart/form-data">

                            @csrf
                            <div class="request_input">
                                <label for="title">Tên Media</label>
                                <input type="text" name="name" id="title">

                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="request_input">
                                <label for="title">Link Liên kết</label>
                                <input type="text" name="link" id="title">

                                @error('link')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="request_input">
                                <label for="title">Thứ tự</label>
                                <input type="number" name="location" id="num-order">
                                @error('location')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="request_input">
                                <label>Hình hiển thị </label>
                                <div id="uploadFile">
                                    <input type="file" name="image" multiple id="upload-thumb"
                                        class="image_input image_input_main">
                                    <div class="image_product_box_main">
                                        <img src="{{ asset('admin/images/img-thumb.png') }}" id="image_main"
                                            class='image_main_add'>
                                    </div>
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
