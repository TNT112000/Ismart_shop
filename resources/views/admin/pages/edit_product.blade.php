@extends('admin.layouts.main')

@section('content')
    <div id="main-content-wp" class="add-cat-page">
        <div class="wrap clearfix">
            @include('admin.layouts.sidebar')
            <div id="content" class="fl-right">
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Chỉnh sửa sản phẩm</h3>
                    </div>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form method="post" action="{{ route('product.update', ['id' => $data->id]) }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="request_input">
                                <label for="product-code">Mã sản phẩm</label>
                                <input type="text" name="product_code" id="product-code"
                                    value="{{ $data->product_code }}">
                                @error('product_code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="request_input">
                                <label for="product-name">Tên sản phẩm</label>
                                <input type="text" name="name" id="product-name" value="{{ $data->name }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="request_input">
                                <label for="product-qty">Số lượng</label>
                                <input type="number" name="qty" id="product-qty" value="{{ $data->qty }}">
                                @error('qty')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="request_input">
                                <label>Danh mục sản phẩm</label>
                                <select name="category_id" id="category_id">
                                    <option value="{{ $data->category_id }}">{{ $data->category->name }}</option>
                                    @foreach ($data1 as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="request_input">
                                <label>Thương hiệu sản phẩm</label>
                                <select name="line_id" id="line_id">
                                    <option value="{{ $data->line_id }}">{{ $data->line->name }}</option>
                                    @isset($data_line)
                                        @foreach ($data_line as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    @endisset

                                </select>
                                @error('line_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="request_input">
                                <label for="price">Giá sản phẩm</label>
                                <input type="text" name="price" id="price" value="{{ $data->price }}">
                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="request_input">
                                <label for="product-code">Phí vận chuyển</label>
                                <input type="text" name="transport" id="price" value="{{ $data->transport }}">
                                @error('transport')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="request_input">
                                <label>Hình hiển thị </label>
                                <div id="uploadFile">
                                    <input type="file" name="image_main" multiple id="upload-thumb"
                                        class="image_input image_input_main">
                                    {{-- <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb"> --}}
                                    <div class="image_product_box_main">

                                        <img id="image_main_add" class="image_main_add"
                                            src="{{ asset($data->image_main) }}">
                                        <div atr="{{ $data->id }}" class="delete-icon_main">X</div>
                                    </div>


                                    {{-- <img src="{{ asset('admin/images/img-thumb.png') }}" id="image_main"
                                            class='image_main_add'> --}}

                                    @error('image_main')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="request_input">
                                <label>Thêm hình ảnh </label>
                                <label>Chọn tối đa 7 hình ảnh</label>
                                <div id="uploadFile">
                                    <input type="file" name="image_product[]" multiple id="upload-thumb"
                                        class="image_input image_input_thumb">
                                    {{-- <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb"> --}}

                                    <div id="selectedImagesContainer">
                                        @foreach ($data2 as $item)
                                            <div class="image_product_box image_product_hibe">
                                                <img src="{{ asset($item->name) }}" class="image_product">
                                                <div class="delete-icon delete-icon-item" img_id="{{ $item->product_id }}"
                                                    atr="{{ $item->id }}">X</div>
                                            </div>
                                        @endforeach
                                        @if ($data3 < 7)
                                            <img src="{{ asset('admin/images/img-thumb.png') }}" id="image_add">
                                        @endif
                                    </div>

                                </div>
                                @error('image_product.*')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="request_input">
                                <label for="desc">Mô tả ngắn</label>
                                <textarea name="describe" id="mytextarea">{{ $data->describe }}</textarea>
                                @error('describ')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <button type="submit" name="btn-submit" id="btn-submit" class="btn_submit">Chỉnh sửa</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            var url1 = "{{ route('ajax.showListLine') }}";
            var url2 = "{{ route('ajax.showProductCode') }}";

            $('#category_id').change(function() {
                var id = $(this).val();
                var formData = new FormData();
                formData.append('id', id);
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                $.ajax({
                    url: url1,
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#line_id').empty();
                        $('#line_id').append(
                            '<option value="">--- Chọn thương hiệu ---</option>'
                        );
                        // Thêm tùy chọn mới từ dữ liệu trả về
                        $.each(data, function(index, value) {
                            $('#line_id').append('<option value="' + value
                                .id + '">' +
                                value.name + '</option>');
                        });
                    }
                })
            })

            var maxImages1 = $('#selectedImagesContainer .image_product_hibe').length;
            var maxImages = 7 - maxImages1;

            $('.delete-icon-item').click(function() {
                $(this).parent().remove();
                var data1 = $(this).attr('atr');

                var data2 = $(this).attr('img_id');

                var formData = new FormData();
                formData.append('data1', data1);
                formData.append('data2', data2);
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                $.ajax({
                    method: 'post',
                    url: "{{ route('ajax.removeProductImage') }}",
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        maxImages = 7-data;

                    }
                })
                var num = dataTransfer.items.length
                // alert(num)
                if (num >= maxImages) {
                    $('#image_add').remove();
                    var imgThumbPath = "{{ asset('admin/images/img-thumb.png') }}";
                    $('#selectedImagesContainer').append("<img src=" + imgThumbPath + " id='image_add'>");
                }
            })

            // var maxImages = 7;
            var dataTransfer = new DataTransfer();

            $('.image_input_thumb').change(function() {

                // alert(maxImages)
                var numberOfItems = dataTransfer.items.length;
                var newImages = this.files;

                var imagesToRemove = Array.from(newImages).slice(maxImages);
                var selectedImages = Array.from(newImages).slice(0, maxImages);


                if (numberOfItems <= maxImages) {
                    var image_stt = maxImages - numberOfItems;
                    // Thêm các phần tử từ mảng mới vào DataTransfer

                    if (newImages.length <= image_stt) {
                        for (var i = 0; i < selectedImages.length; i++) {
                            dataTransfer.items.add(selectedImages[i]);
                        }
                    } else {
                        for (var i = 0; i < image_stt; i++) {
                            dataTransfer.items.add(selectedImages[i]);
                        }
                        alert('Chọn tối đa 7 hình ảnh');
                    }
                }

                this.files = dataTransfer.files;

                // Hiển thị các hình ảnh đã chọn
                displaySelectedImages(dataTransfer.files);
            });

            // Hiển thị các hình ảnh đã chọn
            function displaySelectedImages(images) {
                $('#selectedImagesContainer').children().not('.image_product_hibe').remove();
                for (let i = 0; i < images.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#selectedImagesContainer').prepend(
                            "<div class='image_product_box'><img src ='" + e
                            .target.result +
                            "' class= 'image_product'/><div class='delete-icon' atr=" + i +
                            ">X</div></div >");
                    };
                    reader.readAsDataURL(images[i]);
                }

                var imgThumbPath = "{{ asset('admin/images/img-thumb.png') }}";
                $('#selectedImagesContainer').append("<img src=" + imgThumbPath + " id='image_add'>");

                var numberOfItems = dataTransfer.items.length;

                // Số lượng tối đa mà bạn muốn giữ lại

                // Nếu số lượng hình ảnh nhiều hơn số lượng tối đa, xóa img-thumb.png
                if (numberOfItems >= maxImages) {
                    
                    // Xóa img-thumb.png
                    $('#image_add').remove();
                }

            }


            $('#selectedImagesContainer').on('click', '.delete-icon', function() {

                var number = $(this).attr('atr');
                dataTransfer.items.remove(number);
                // Gọi hàm để cập nhật hiển thị
                displaySelectedImages(dataTransfer.files);
            });


            $(document).on('click', '#image_add', function() {
                // Kích hoạt sự kiện click cho input file
                $('.image_input_thumb').click();
            });

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
