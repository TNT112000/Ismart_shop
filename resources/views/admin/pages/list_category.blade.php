@extends('admin.layouts.main')

@section('content')
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        @include('admin.layouts.sidebar')
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                    <a href="{{route('category.create')}}" title="" id="add-new" class="fl-left">Thêm mới</a>
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
                    <div class="table-responsive">
                        <table id='myTable' class="table list-table-wp">
                            <thead class="thead_color">
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Thứ tự</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                   $stt=1; 
                                @endphp
                                @foreach($data as $item)
                                
                                @php
                                if($item->deleted_at === null){
                                    $item->deleted_at='Hoạt động';
                                }else{
                                    $item->deleted_at='Tạm dừng';
                                }
                                @endphp
                                
                                <tr>
                                    
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text">{{$stt++}}</h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title="">{{$item->name}}</a>
                                        </div> 
                                        <ul class="list-operation fl-right">
                                            <li><a href="{{route('category.edit',['category'=>$item->id])}}" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="{{route('category.destroy',['category'=>$item->id])}}" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text">{{$item->stt}}</span></td>
                                    <td><span class="tbody-text status-text" >{{$item->deleted_at}}</span></td>
                                    <td><span class="tbody-text">{{$item->created_by}}</span></td>
                                    <td><span class="tbody-text">{{$item->created_at->format('d-m-Y')}}</span></td>
                                </tr>
                                @endforeach
                                
                                
                            </tbody>
                            <tfoot class="thead_color">
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text-text">Tiêu đề</span></td>
                                    <td><span class="tfoot-text">Thứ tự</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
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