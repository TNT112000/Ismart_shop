@extends('admin.layouts.main')

@section('content')
    <div id="main-content-wp" class="list-product-page">
        <div class="wrap clearfix">
            @include('admin.layouts.sidebar')
            <div id="content" class="fl-right">
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Sản phẩm tạm dừng</h3>
                        
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
                                    <option value="0">Tạm dừng</option>
                                    <option value="1">Hoạt động</option>
                                    
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

                                        <td><span class="tfoot-text">Khôi Phục</span></td>
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
                                            echo $status
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
                                                                
                                                    <li><a href="{{ route('product.destroy_trash', ['product' => $item->id]) }}"
                                                            title="Xóa" class="delete"><i class="fa fa-trash"
                                                                aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text">{{ $item->price }}</span></td>
                                            <td><span class="tbody-text">{{ $item->category_id }}</span></td>

                                            <td><span class="tbody-text">{{ $item->line_id }}</span></td>
                                            <td><span class="tbody-text status-text">{{ $status }}</span></td>
                                            <td><span class="tbody-text"><a href="{{route('product.restore',['product'=>$item->id])}}" class="">Khôi Phục</a></span>
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
                                        <td><span class="tfoot-text">Khôi Phục</span></td>
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
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
