@extends('layouts.main')

@section('content')
    <div id="main-content-wp" class="home-page clearfix">
        <div class="wp-inner">
            <div class="main-content fl-right">
                <div class="section" id="slider-wp">
                    <div class="section-detail">
                        <div class="item">
                            <img src="{{asset('images/slider-01.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('images/slider-02.png')}}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{asset('images/slider-03.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="section" id="support-wp">
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('images/icon-1.png')}}">
                                </div>
                                <h3 class="title">Miễn phí vận chuyển</h3>
                                <p class="desc">Tới tận tay khách hàng</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('images/icon-2.png')}}">
                                </div>
                                <h3 class="title">Tư vấn 24/7</h3>
                                <p class="desc">1900.9999</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('images/icon-3.png')}}">
                                </div>
                                <h3 class="title">Tiết kiệm hơn</h3>
                                <p class="desc">Với nhiều ưu đãi cực lớn</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('images/icon-4.png')}}">
                                </div>
                                <h3 class="title">Thanh toán nhanh</h3>
                                <p class="desc">Hỗ trợ nhiều hình thức</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{asset('mages/icon-5.png')}}">
                                </div>
                                <h3 class="title">Đặt hàng online</h3>
                                <p class="desc">Thao tác đơn giản</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="section" id="list-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm</h3>
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

            </div>
            <div class="sidebar fl-left">
                <div class="section" id="category-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Danh mục sản phẩm</h3>
                    </div>
                    <div class="secion-detail">
                        <ul class="list-item">
                            @foreach ($category as $item)
                                <li>
                                    <a href="{{route('product.category',['id'=>$item->id])}}" title="">{{ $item->name }}</a>
                                    <ul class="sub-menu">
                                        @foreach ($line as $data)
                                            @if ($item->id == $data->category_id)
                                                <li>
                                                    <a href="{{route('product.line',['id'=>$data->id])}}" title="">{{ $data->name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                @include('layouts.hot_product', ['product_hot' => $product_hot]);
            </div>
        </div>
    </div>
@endsection
