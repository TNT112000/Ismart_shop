@extends('admin.layouts.main')

@section('content')
    <div id="main-content-wp" class="list-product-page list-slider">
        <div class="wrap clearfix">
            @include('admin.layouts.sidebar')
            <div id="content" class="fl-right">
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Danh sách slider</h3>
                        <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
                    </div>
                </div>
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <div class="filter-wp clearfix">
                            <form method="GET" class="form-s fl-right">
                                <input type="text" name="s" id="s">
                                <input type="submit" name="sm_s" value="Tìm kiếm">
                            </form>
                        </div>
                        <div class="actions">
                            <form method="GET" action="" class="form-actions">
                                <select name="actions">
                                    <option value="0">Tác vụ</option>
                                    <option value="1">Công khai</option>
                                    <option value="1">Chờ duyệt</option>
                                    <option value="2">Bỏ vào thủng rác</option>
                                </select>
                                <input type="submit" name="sm_action" value="Áp dụng">
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table list-table-wp">
                                <thead>

                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Hình ảnh</span></td>
                                        <td><span class="thead-text">Link</span></td>
                                        <td><span class="thead-text">Thứ tự</span></td>
                                        <td><span class="thead-text">Trạng thái</span></td>
                                        <td><span class="thead-text">Người tạo</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
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
                                            <td>
                                                <div class="tbody-thumb">
                                                    <img src="{{asset($item->image)}}" alt="">
                                                </div>
                                            </td>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title="">{{ $item->link }}</a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="" title="Sửa" class="edit"><i
                                                                class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="" title="Xóa" class="delete"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text">{{ $item->location }}</span></td>
                                            <td><span class="tbody-text">{{ $item->deleted_at }}</span></td>
                                            <td><span class="tbody-text">{{ $item->created_at }}</span></td>
                                            <td><span class="tbody-text">{{ $item->created_by }}</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="tfoot-text">STT</span></td>
                                        <td><span class="tfoot-text">Hình ảnh</span></td>
                                        <td><span class="tfoot-text">Link</span></td>
                                        <td><span class="tfoot-text">Thứ tự</span></td>
                                        <td><span class="tfoot-text">Trạng thái</span></td>
                                        <td><span class="tfoot-text">Người tạo</span></td>
                                        <td><span class="tfoot-text">Thời gian</span></td>
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
