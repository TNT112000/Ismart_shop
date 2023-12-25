@extends('admin.layouts.main')

@section('content')
    <div id="main-content-wp" class="add-cat-page">
        <div class="wrap clearfix">
            @include('admin.layouts.sidebar')
            <div id="content" class="fl-right">
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Chỉnh sửa bài viết</h3>
                    </div>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form method="POST" action="{{route('post.update',['post'=>$data->id])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="request_input">
                                <label for="title">Tiêu đề</label>
                                <input type="text" name="title" id="title" value="{{$data->title}}">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="request_input">
                                <label for="desc">Mô tả</label>
                                <textarea name="content" id="desc" class="ckeditor">{{$data->content}}</textarea>
                                @error('content')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="request_input">
                                <label>Hình ảnh</label>
                                <div id="uploadFile">
                                    <input type="file" name="image" multiple id="upload-thumb"
                                        class="image_input image_input_main">
                                    {{-- <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb"> --}}

                                    <div class="image_product_box_main">
                                        <img id="image_main_add" class="image_main_add"
                                        src="{{ asset($data->image) }}">
                                    <div atr="{{ $data->id }}" class="delete-icon_main">X</div>
                                        {{-- <img src="{{ asset('admin/images/img-thumb.png') }}" id="image_main"
                                            class='image_main_add'> --}}
                                    </div>
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" name="btn-submit" id="btn-submit" class="btn_submit">Chỉnh sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script >
    
        $(document).ready(function() {
    
            $(document).on('click', '#image_main', function() {
                // Kích hoạt sự kiện click cho input file
                $('.image_input_main').click();
            });
    
            $('.image_input_main').change(function() {
                var newImages = this.files;
                // Lưu trữ các hình ảnh từ thứ 8 trở đi để xóa giá trị
                // Tạo một đối tượng DataTransfer mới
    
                if (newImages.length >= 1) {
    
                    var newImageElement = $('<img>');
    
                    // Gán thuộc tính id cho hình ảnh mới
                    newImageElement.attr('id', 'image_main_add');
                    newImageElement.attr('class', 'image_main_add');
    
                    // Gán đường dẫn của hình ảnh mới
                    var imageURL = URL.createObjectURL(newImages[0]);
                    newImageElement.attr('src', imageURL);
    
                    // Thêm hình ảnh mới vào DOM
                    $('.image_product_box_main').append(newImageElement);
                    $('.image_product_box_main').append('<div class="delete-icon_main">X</div>')
                    $('#image_main').remove();
    
                }
    
            });
    
            $(document).on('click', '.delete-icon_main', function() {
                // Kích hoạt sự kiện click cho input file
                $('#image_main_add').remove();
                $('.delete-icon_main').remove();
                var imgThumbPath = "{{ asset('admin/images/img-thumb.png') }}";
                $('.image_product_box_main').prepend("<img src=" + imgThumbPath +
                    " id='image_main' class='image_main_add'>");
            });
        })
    </script>
@endsection
