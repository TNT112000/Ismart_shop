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