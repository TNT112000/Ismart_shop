@extends('admin.layouts.main')

@section('content')
    <div id="main-content-wp" class="list-product-page">
        <div class="wrap clearfix">
            @include('admin.layouts.sidebar')
            <div id="content" class="fl-right">
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                        <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
                    </div>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        
                        <div class="actions">
                            <form method="GET" action="{{route('product.status')}}" class="form-actions">
                                <select name="actions">
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Tạm dừng</option>
                                </select>
                                <input type="submit" name="sm_action" value="Áp dụng">
                            </form>
                        </div>
                        <div class="table-responsive">
                            {{-- class="table list-table-wp --}}
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
        });
    </script>
@endsection
