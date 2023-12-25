
    <div class="section" id="selling-wp">
        <div class="section-head">
            <h3 class="section-title">Sản phẩm bán chạy</h3>
        </div>
        <div class="section-detail">
            <ul class="list-item">
                @foreach($product_hot as $item)
                <li class="clearfix">
                    <a href="" title="" class="thumb fl-left">
                        <img src="{{asset($item->image_main)}}" alt="">
                    </a>
                    <div class="info fl-right">
                        <a href="" title="" class="product-name">{{$item->name}}</a>
                        <div class="price">
                            <span class="new">{{number_format($item->price, 0, '.', ',') }}đ</span>
                            <span class="old">7.190.000đ</span>
                        </div>
                        <a href="" title="" class="buy-now">Mua ngay</a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <a href="?page=detail_product" title="" class="thumb">
                <img src="{{asset('images/banner.png')}}" alt="">
            </a>
        </div>
    </div>
