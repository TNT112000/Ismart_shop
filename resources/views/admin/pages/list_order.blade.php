@extends('admin.layouts.main')

@section('content')
    <div id="main-content-wp" class="list-product-page">
        <div class="wrap clearfix">
            @include('admin.layouts.sidebar')
            <div id="content" class="fl-right">
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                    </div>
                </div>
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <div class="filter-wp clearfix">
                            <ul class="post-status fl-left">
                                <li class="all"><a href="">Tất cả <span class="count">(69)</span></a> |</li>
                                <li class="publish"><a href="">Đã đăng <span class="count">(51)</span></a> |</li>
                                <li class="pending"><a href="">Chờ xét duyệt<span class="count">(0)</span> |</a>
                                </li>
                                <li class="pending"><a href="">Thùng rác<span class="count">(0)</span></a></li>
                            </ul>
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
                                        <td><span class="thead-text">Mã đơn hàng</span></td>
                                        <td><span class="thead-text">Họ và tên</span></td>
                                        <td><span class="thead-text">Số sản phẩm</span></td>
                                        <td><span class="thead-text">Tổng giá</span></td>
                                        <td><span class="thead-text">Trạng thái</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                        <td><span class="thead-text">Chi tiết</span></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                        <td><span class="tbody-text">1</h3></span>
                                        <td><span class="tbody-text">WEB00001</h3></span>
                                        <td>
                                            <div class="tb-title fl-left">
                                                <a href="" title="">Phan Văn Cương</a>
                                            </div>
                                            <ul class="list-operation fl-right">
                                                <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i></a></li>
                                                <li><a href="" title="Xóa" class="delete"><i class="fa fa-trash"
                                                            aria-hidden="true"></i></a></li>
                                            </ul>
                                        </td>
                                        <td><span class="tbody-text">5</span></td>
                                        <td><span class="tbody-text">1.500.000 VNĐ</span></td>
                                        <td><span class="tbody-text">Hoạt động</span></td>
                                        <td><span class="tbody-text">12-07-2016</span></td>
                                        <td><a href="?page=detail_order" title="" class="tbody-text">Chi tiết</a></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="tfoot-text">STT</span></td>
                                        <td><span class="tfoot-text">Mã đơn hàng</span></td>
                                        <td><span class="tfoot-text">Họ và tên</span></td>
                                        <td><span class="tfoot-text">Số sản phẩm</span></td>
                                        <td><span class="tfoot-text">Tổng giá</span></td>
                                        <td><span class="tfoot-text">Trạng thái</span></td>
                                        <td><span class="tfoot-text">Thời gian</span></td>
                                        <td><span class="tfoot-text">Chi tiết</span></td>
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
                            <!-- Trong Blade Template -->
                            <div class="pagination">
                                @if ($data->lastPage() > 1)
                                    
                                    <ul class="pagination-list">
                                        @php
                                            $maxPagesToShow = 5; // Số trang tối đa hiển thị
                                            $halfTotalLinks = floor($maxPagesToShow / 2);
                                            $startPage = max(1, $data->currentPage() - $halfTotalLinks);
                                            $endPage = min($data->lastPage(), $startPage + $maxPagesToShow - 1);
                                        @endphp

                                        @if ($startPage > 1)
                                            <li>
                                                <a href="{{ $data->url(1) }}">1</a>
                                            </li>
                                            @if ($startPage > 2)
                                                <li class="disabled">
                                                    <span>...</span>
                                                </li>
                                            @endif
                                        @endif

                                        @for ($i = $startPage; $i <= $endPage; $i++)
                                            <li class="{{ $i == $data->currentPage() ? 'active' : '' }}">
                                                <a href="{{ $data->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor

                                        @if ($endPage < $data->lastPage())
                                            @if ($endPage < $data->lastPage() - 1)
                                                <li class="disabled">
                                                    <span>...</span>
                                                </li>
                                            @endif
                                            <li>
                                                <a href="{{ $data->url($data->lastPage()) }}">{{ $data->lastPage() }}</a>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </div>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
