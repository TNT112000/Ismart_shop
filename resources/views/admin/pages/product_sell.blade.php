@extends('admin.layouts.main')

@section('content')
    <div id="main-content-wp" class="list-product-page">
        <div class="wrap clearfix">
            @include('admin.layouts.sidebar')
            <div id="content" class="fl-right">
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Sản phẩm giảm giá</h3>
                    </div>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="section" id="detail-page">
                    <div class="section-detail">

                        <div class="actions">
                            <form method="GET" action="" class="form-actions">
                                <input list="browsers" name="chosen-browser" id="browser" style="width:250px">
                                <datalist id="browsers">
                                    @foreach ($data as $item)
                                    <option value="{{$item->name}}">
                                    @endforeach
                                </datalist>
                                <input type="submit" name="sm_action" value="Thêm mới" >
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table list-table-wp">
                                <thead>

                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="tfoot-text">STT</span></td>
                                        <td><span class="tfoot-text">Mã sản phẩm</span></td>
                                        <td><span class="tfoot-text">Hình ảnh</span></td>
                                        <td><span class="tfoot-text">Tên sản phẩm</span></td>
                                        <td><span class="tfoot-text">Giá mới</span></td>
                                        <td><span class="tfoot-text">Giá cũ</span></td>
                                        <td><span class="tfoot-text">Danh mục</span></td>
                                        <td><span class="tfoot-text">Trạng thái</span></td>
                                        <td><span class="tfoot-text">Giảm giá</span></td>
                                    </tr>

                                </thead>
                                <tbody>
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach ($data as $item)
                                        @php
                                            if ($item->deleted_at === null) {
                                                $item->deleted_at = 'Hoạt động';
                                            } else {
                                                $item->deleted_at = 'Tạm dừng';
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
                                                    <li><a href="" title="Sửa" class="edit"><i
                                                                class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="" title="Xóa" class="delete"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text">{{ $item->price }}</span></td>
                                            <td><span class="tbody-text">{{ $item->category_id }}</span></td>
                                            <td><span class="tbody-text">{{ $item->line_id }}</span></td>
                                            <td><span class="tbody-text">{{ $item->deleted_at }}</span></td>
                                            <td><span class="tbody-text">{{ $item->created_at }}</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="tfoot-text">STT</span></td>
                                        <td><span class="tfoot-text">Mã sản phẩm</span></td>
                                        <td><span class="tfoot-text">Hình ảnh</span></td>
                                        <td><span class="tfoot-text">Tên sản phẩm</span></td>
                                        <td><span class="tfoot-text">Giá mới</span></td>
                                        <td><span class="tfoot-text">Giá cũ</span></td>
                                        <td><span class="tfoot-text">Danh mục</span></td>
                                        <td><span class="tfoot-text">Trạng thái</span></td>
                                        <td><span class="tfoot-text">Giảm giá</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="section" id="paging-wp">
                    <div class="section-detail clearfix">
                        <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                        <ul id="list-paging" class="fl-right">
                            <li>
                                <a href="" title="">
                                    << /a>
                            </li>
                            <li>
                                <a href="" title="">1</a>
                            </li>
                            <li>
                                <a href="" title="">2</a>
                            </li>
                            <li>
                                <a href="" title="">3</a>
                            </li>
                            <li>
                                <a href="" title="">></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
