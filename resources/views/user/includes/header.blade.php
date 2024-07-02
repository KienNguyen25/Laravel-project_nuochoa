<header class="header_area">
    <div class="top_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="float-left">
                        <p>Phone: +01 256 25 235</p>
                        <p>Email: info@eiser.com</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="float-right">
                        <ul class="right_side">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light w-100">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html">
                    <img src="img/logo.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                    <div class="row w-100 mr-0">
                        <div class="col-lg-7 pr-0">
                            <ul class="nav navbar-nav center_nav pull-right">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('user.home')}}">Trang chủ</a>
                                </li>
                                <li class="nav-item submenu dropdown">
                                    <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                       aria-expanded="false">Cửa hàng</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('user.category')}}">Tất cả sản phẩm</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('user.cart')}}">Giỏ hàng</a>
                                        </li>
                                    </ul>
                                </li>
                                @if(auth()->guard('web')->check())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.orders.list', auth()->guard('web')->user()->id)}}">Đơn hàng</a>
                                </li>
                                @endif
{{--                                <li class="nav-item submenu dropdown">--}}
{{--                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"--}}
{{--                                       aria-expanded="false">Blog</a>--}}
{{--                                    <ul class="dropdown-menu">--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link" href="blog.html">Blog</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link" href="single-blog.html">Blog Details</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item submenu dropdown">--}}
{{--                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"--}}
{{--                                       aria-expanded="false">Pages</a>--}}
{{--                                    <ul class="dropdown-menu">--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link" href="tracking.html">Tracking</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link" href="elements.html">Elements</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.contact')}}">Liên hệ</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-5 pr-0">
                            <ul class="nav navbar-nav navbar-right right_nav pull-right">
                                @if(!auth()->guard('web')->check())
                                <li class="nav-item">
                                    <a href="{{route('user.carts.list')}}" class="icons">
                                        <i class="ti-shopping-cart"></i><span style="right: 29px;
                                                                                    width: 13px;
                                                                                    position: absolute;
                                                                                    font-size: 10px;
                                                                                    border-radius: 50%;
                                                                                    background-color: red;
                                                                                    color: #fff;
                                                                                    height: 13px;
                                                                                    top: 24px;
                                                                                    line-height: 11px;">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}</span>
                                    </a>
                                </li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{route('user.carts.list')}}" class="icons">
                                            <i class="ti-shopping-cart"></i><span style="right: 65px;
                                                                                    width: 13px;
                                                                                    position: absolute;
                                                                                    font-size: 10px;
                                                                                    border-radius: 50%;
                                                                                    background-color: red;
                                                                                    color: #fff;
                                                                                    height: 13px;
                                                                                    top: 24px;
                                                                                    line-height: 11px;">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}</span>
                                        </a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a href="{{route('user.login')}}" class="icons">
                                        <i class="ti-user" aria-hidden="true"></i>
                                    </a>
                                </li>
                                @if(auth()->guard('web')->check())
                                <li class="nav-item">
                                    <a href="{{route('user.logout')}}" class="icons">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
