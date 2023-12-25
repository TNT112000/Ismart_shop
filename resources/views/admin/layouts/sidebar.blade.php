<div id="sidebar" class="fl-left">
    <ul id="sidebar-menu">
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <span class="fa fa-map icon"></span>
                <span class="title">Quản lý chung</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="?page=add_page" title="" class="nav-link">Doanh số</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('introduce.create')}}" title="" class="nav-link">Giới Thiệu</a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <span class="fa fa-pencil-square-o icon"></span>
                <span class="title">Bài viết</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{ route('post.create') }}" title="" class="nav-link">Thêm mới</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('post.index') }}" title="" class="nav-link">Danh sách bài viết</a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <span class="fa fa-product-hunt icon"></span>
                <span class="title">Sản phẩm</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{ route('product.create') }}" title="" class="nav-link">Thêm mới</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('product.index') }}" title="" class="nav-link">Danh sách sản phẩm</a>
                </li>
               
                <li class="nav-item">
                    <a href="{{ route('product.hot') }}" title="" class="nav-link">Nổi bật</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <span class="fa fa-database icon"></span>
                <span class="title">Bán hàng</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{ route('order.index') }}" title="" class="nav-link">Danh sách đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" title="" class="nav-link">Danh sách khách hàng</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <span class="fa fa-cubes icon"></span>
                <span class="title">Danh mục</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{ route('category.create') }}" title="" class="nav-link">Thêm danh mục</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('line.create') }}" title="" class="nav-link">Thêm thương hiệu</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" title="" class="nav-link">Danh sách danh mục</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('line.index') }}" title="" class="nav-link">Danh sách thương hiệu</a>
                </li>
            </ul>
        </li>
        
    </ul>
</div>
