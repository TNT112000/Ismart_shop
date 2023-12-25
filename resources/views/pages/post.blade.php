@extends('layouts.main')

@section('content')
    <div id="main-content-wp" class="clearfix blog-page">
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
                <div class="section" id="list-blog-wp">
                    <div class="section-head clearfix">
                        <h3 class="section-title">Blog</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            @foreach ($data as $item)
                                <li class="clearfix">
                                    <a href="?page=detail_blog" title="" class="thumb fl-left">
                                        <img src="{{ asset($item->image) }}" alt="" class="image_post">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="?page=detail_blog" title="" class="title">{{ $item->title }}</a>
                                        <span class="create-date"> {{ $item->created_at->format('d-m-Y') }}</span>
                                        <p class="desc">{{ $item->content }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="section" id="paging-wp">
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            @if ($data->lastPage() > 1)
                                <li>

                                    <a href="" title="">{{ $data->links() }}</a>

                                </li>
                            @endif
                            {{-- <li>
                                <a href="" title="">2</a>
                            </li>
                            <li>
                                <a href="" title="">3</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="sidebar fl-left">
                @include('layouts.hot_product')
            </div>
        </div>
    </div>
@endsection
