@extends('layouts.main')

@section('content')
    <div id="main-content-wp" class="clearfix category-product-page">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Sản phẩm</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content fl-right">
                <div class="section" id="list-product-wp">
                    <div class="section-head clearfix">
                        <h3 class="section-title fl-left">Sản Phẩm</h3>
                        <div class="filter-wp fl-right">
                            <div class="form-filter">
                                <form method="POST" action="">
                                    <select name="select">
                                        <option value="0">Tất cả</option>
                                        <option value="1"> -- 5m</option>
                                        <option value="2"> 5m -- 7m </option>
                                        <option value="3">7m -- 10 m</option>
                                        <option value="3">10m -- 15m</option>
                                    </select>
                                    <button type="submit">Lọc</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            @foreach ($product as $item)
                                <li>
                                    <a href="?page=detail_product" title="" class="thumb">
                                        <img src="{{ asset($item->image_main) }}" class='image_product'>
                                    </a>
                                    <a href="?page=detail_product" title=""
                                        class="product-name">{{ $item->name }}</a>
                                    <div class="price">
                                        <span class="new">{{ number_format($item->price, 0, '.', ',') }}đ</span>
                                        <span class="old">8.990.000đđ</span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ
                                            hàng</a>
                                        <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>

                </div>
                <div class="section" id="paging-wp">
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            @if ($product->lastPage() > 1)
                                <li>

                                    <a href="" title="">{{ $product->links() }}</a>

                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="sidebar fl-left">
                @include('layouts.category')
                @include('layouts.hot_product')

            </div>

        </div>
    </div>
@endsection
