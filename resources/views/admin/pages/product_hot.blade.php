@extends('admin.layouts.main')

@section('content')
    <div id="main-content-wp" class="list-product-page">
        <div class="wrap clearfix">
            @include('admin.layouts.sidebar')
            <div id="content" class="fl-right">
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Sản phẩm nổi bật</h3>
                    </div>
                </div>
                <div class="result"></div>
                
                <div class="section" id="detail-page">
                    <div class="section-detail">

                        <div class="actions">
                            {{-- <form id="add_hot" class="form-actions"> --}}
                            <input list="browsers" name="chosen-browser" id="browser" style="width:250px">
                            <datalist id="browsers">
                                @foreach ($data1 as $item)
                                    <option id="add_hot_option" value="{{ $item->name }}">
                                @endforeach
                            </datalist>
                            <button id='add_hot' name="add_hot" value="Thêm mới">Thêm mới</button>
                            {{-- </form> --}}
                        </div>
                        <div class="table-responsive">
                            <table id="myTable" class="table list-table-wp">
                                <thead class="thead_color">

                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="tfoot-text">STT</span></td>
                                        <td><span class="tfoot-text">Mã sản phẩm</span></td>
                                        <td><span class="tfoot-text">Hình ảnh</span></td>
                                        <td><span class="tfoot-text">Tên sản phẩm</span></td>
                                        <td><span class="tfoot-text">Giá</span></td>
                                        <td><span class="tfoot-text">Danh mục</span></td>
                                        <td><span class="tfoot-text">Thương hiệu</span></td>
                                        <td><span class="tfoot-text">Trạng thái</span></td>

                                        <td><span class="tfoot-text">Thời gian</span></td>
                                    </tr>

                                </thead>
                                <tbody>
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach ($data as $item)
                                        @php
                                            if ($item->deleted_at === null) {
                                                $status = 'Hoạt động';
                                            } else {
                                                $status = 'Tạm dừng';
                                            }
                                        @endphp
                                        <tr>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text">{{ $stt }}</h3></span>
                                            <td><span class="tbody-text">{{ $item->product_code }}</h3></span>
                                            <td>
                                                <div class="tbody-thumb">
                                                    <img src="{{ asset($item->image_main) }}" alt="">
                                                </div>
                                            </td>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title="">{{ $item->name }}</a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="{{ route('product.edit', ['product' => $item->id]) }}"
                                                            title="Sửa" class="edit"><i class="fa fa-pencil"
                                                                aria-hidden="true"></i></a></li>
                                                                
                                                    <li><a href="{{ route('product.destroy', ['product' => $item->id]) }}"
                                                            title="Xóa" class="delete"><i class="fa fa-trash"
                                                                aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text">{{ $item->price }}</span></td>
                                            <td><span class="tbody-text">{{ $item->category_id }}</span></td>

                                            <td><span class="tbody-text">{{ $item->line_id }}</span></td>
                                            <td><span class="tbody-text status-text">{{ $status }}</span></td>
                                            <td><span class="tbody-text">{{ $item->created_at->format('d-m-Y') }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="thead_color">
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="tfoot-text">STT</span></td>
                                        <td><span class="tfoot-text">Mã sản phẩm</span></td>
                                        <td><span class="tfoot-text">Hình ảnh</span></td>
                                        <td><span class="tfoot-text">Tên sản phẩm</span></td>
                                        <td><span class="tfoot-text">Giá</span></td>
                                        <td><span class="tfoot-text">Danh mục</span></td>
                                        <td><span class="tfoot-text">Trạng thái</span></td>
                                        <td><span class="tfoot-text">Người tạo</span></td>
                                        <td><span class="tfoot-text">Thời gian</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('#add_hot').click(function() {
                var url = "{{ route('ajax.addProductHot') }}"
                var id = $('#browser').val();
                var formData = new FormData();
                formData.append('id', id);
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                $.ajax({
                    method: 'post',
                    url: url,
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.result == 0) {
                            $('#browser').val('');
                            $('#browsers').empty();
                            $.each(data.list, function(index, data) {
                                $('#browsers').append(
                                    `<option id="add_hot_option" value="${data.name}">`
                                    )
                            })
                            // console.log(data);
                            $.each(data.get, function(index, get) {

                                // var time = moment(get.created_at).format('DD-MM-YYYY');
                                var time = new Date(get.created_at);
                                var datetime = time.toLocaleDateString('en-GB');
                                $('#tbody_product_hot').append(`
     <tr>
         <td><input type="checkbox" name="checkItem" class="checkItem"></td>
         <td><span class="tbody-text"></h3></span>${data.count}</td>
         <td><span class="tbody-text">${get.product_code}</h3></span></td>
         <td>
             <div class="tbody-thumb">
                 <img src="{{ asset('${get.image_main}') }}" alt="">
             </div>
         </td>
         <td class="clearfix">
             <div class="tb-title fl-left">
                 <a href="" title="">${get.name}</a>
             </div>
             <ul class="list-operation fl-right">
                 <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                 <li><a href="" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
             </ul>
         </td>
         <td><span class="tbody-text">${get.price}</span></td>
         <td><span class="tbody-text">${get.category_id}</span></td>
         <td><span class="tbody-text">${get.line_id}</span></td>
         <td><span class="tbody-text status-text">Hoạt động</span></td>
         <td><span class="tbody-text">${datetime} </span></td>
     </tr>`);
                            });
                            $('.alert').remove();
                            $('.result').append(`<div class="alert alert-success">
                       Thêm dữ liệu thành công
                    </div>`)
                        }
                        else if(data.result==1){
                            $('.alert').remove();
                            $('.result').append(`<div class="alert alert-danger">
                       Dữ liệu đã tồn tại
                    </div>`)
                        }
                        else{
                            $('.alert').remove();
                            $('.result').append(`<div class="alert alert-danger">
                       Dữ liệu không tồn tại
                    </div>`)
                        }
                    }
                });
            });
        })
    </script>
@endsection
