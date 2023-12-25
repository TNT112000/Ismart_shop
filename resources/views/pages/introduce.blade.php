@extends('layouts.main')

@section('content')
    <div id="main-content-wp" class="clearfix detail-blog-page">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-content fl-right">
                <div class="section" id="detail-blog-wp">
                    <div class="section-head clearfix">
                        <h3 class="section-title">{{$introduce->title}}
                        </h3>
                    </div>
                    <div class="section-detail">
                        <span class="create-date">{{ $introduce->created_at->format('d-m-Y') }}</span>
                        <div class="block menu-ft" id="info-shop">
                            <h3 class="title">Thông tin cửa hàng</h3>
                            <ul class="list-item">
                                <li>
                                    <p>{{$introduce->address}}</p>
                                </li>
                                <li>
                                    <p>{{$introduce->phone}}</p>
                                </li>
                                <li>
                                    <p>{{$introduce->email}}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="detail">
                            <p> {!! $introduce->content !!} </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="sidebar fl-left">
            @include('layouts.hot_product')
            </div>
        </div>
    </div>
@endsection
