@extends('user.layouts.master')
@section('content')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Cửa hàng sản phẩm</h2>
                        <p>Rất hân hạnh được chào đón bạn</p>
                    </div>
                    <div class="page_link">
                        <a href="index.html">Trang chủ</a>
                        <a href="category.html">Cửa hàng</a>
{{--                        <a href="category.html">Women Fashion</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_gap">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
{{--                    <div class="product_top_bar">--}}
{{--                        <div class="left_dorp">--}}
{{--                            <select class="sorting">--}}
{{--                                <option value="1">Default sorting</option>--}}
{{--                                <option value="2">Default sorting 01</option>--}}
{{--                                <option value="4">Default sorting 02</option>--}}
{{--                            </select>--}}
{{--                            <select class="show">--}}
{{--                                <option value="1">Show 12</option>--}}
{{--                                <option value="2">Show 14</option>--}}
{{--                                <option value="4">Show 16</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="latest_product_inner">
                        <div class="row">
                            @if($products)
                                @foreach($products as $product)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <div class="product-img">
                                        <img
                                            class="card-img"
                                            src="{{url(Storage::url($product->image))}}"
                                            alt=""
                                        />
                                        <div class="p_icon">
                                            <a href="{{route('user.product.detail', $product->id)}}">
                                                <i class="ti-eye"></i>
                                            </a>
                                            <a href="{{route('user.carts.add', $product->id)}}">
                                                <i class="ti-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-btm">
                                        <a href="#" class="d-block">
                                            <h4>{{$product->name}}</h4>
                                        </a>
                                        <div class="mt-3">
                                            <span class="mr-4">{{number_format($product->sale_price)}}đ</span>
                                            @if($product->sale_price < $product->output_price)
                                                <del>{{number_format($product->output_price)}}đ</del>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <form action="{{route('user.category')}}" method="GET">
                            <aside class="left_widgets p_filter_widgets">
                                <div class="l_w_title">
                                    <h3>Danh mục</h3>
                                </div>
                                <div class="widgets_inner">
                                    <ul class="list" style="list-style: none">
                                        <style>
                                            .p_filter_widgets .list li a:before {
                                                display: none;
                                            }
                                            .p_filter_widgets .list li a {
                                                padding-left: 10px !important;
                                            }
                                        </style>
                                        @if($categories)
                                            @foreach($categories as $category)
                                                @php
                                                    $checked="";
                                                    if($category->id == (int)request()->get('category')){
                                                      $checked = "checked";
                                                    }
                                                @endphp
                                                <li>
                                                    <input type="radio" id="html" name="category" value="{{$category->id}}" {{$checked}}><a href="#">{{$category->name}}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </aside>

                            <aside class="left_widgets p_filter_widgets">
                                <div class="l_w_title">
                                    <h3>Nhãn hiệu</h3>
                                </div>
                                <div class="widgets_inner">
                                    <ul class="list">
                                        @if($brands)
                                            @foreach($brands as $brand)
                                                @php
                                                    $checked="";
                                                    if($brand->id == (int)request()->get('brand')){
                                                      $checked = "checked";
                                                    }
                                                @endphp
                                                <li>
                                                    <input type="radio" id="html" name="brand" value="{{$brand->id}}" {{$checked}}><a href="#">{{$brand->name}}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </aside>

                            <aside class="left_widgets p_filter_widgets">
                                <div class="l_w_title">
                                    <h3>Giá sản phẩm</h3>
                                </div>
                                <div class="widgets_inner">
                                    <select style="border: 1px solid #ccc" name="price" id="cars">
                                        @php
                                            $selected="";
                                        @endphp
                                        <option value="" @php if(!request()->get('price')) {$selected = "selected";}@endphp {{$selected}} disabled>__Chọn giá bán__</option>
                                        <option value="{{\App\Models\Product::KHOANG_GIA['100-500']}}" @php if(\App\Models\Product::KHOANG_GIA['100-500'] === (int)request()->get('price')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>100.000đ - 500.000đ</option>
                                        <option value="{{\App\Models\Product::KHOANG_GIA['500-1tr']}}" @php if(\App\Models\Product::KHOANG_GIA['500-1tr'] === (int)request()->get('price')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>500.000đ - 1.000.000đ</option>
                                        <option value="{{\App\Models\Product::KHOANG_GIA['1tr-3tr']}}" @php if(\App\Models\Product::KHOANG_GIA['1tr-3tr'] === (int)request()->get('price')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>1.000.000đ - 3.000.000đ</option>
                                        <option value="{{\App\Models\Product::KHOANG_GIA['3tr-5tr']}}" @php if(\App\Models\Product::KHOANG_GIA['3tr-5tr'] === (int)request()->get('price')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>3.000.000đ - 5.000.000đ</option>
                                        <option value="{{\App\Models\Product::KHOANG_GIA['tren_5tr']}}" @php if(\App\Models\Product::KHOANG_GIA['tren_5tr'] === (int)request()->get('price')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>Trên 5.000.000đ</option>
                                        <option value="{{\App\Models\Product::KHOANG_GIA['5tr-10tr']}}" @php if(\App\Models\Product::KHOANG_GIA['5tr-10tr'] === (int)request()->get('price')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>5.000.000 - 10.000.000</option>
                                    </select>
                                </div>
                            </aside>
                            <button class="btn btn-success" type="submit">Áp dụng</button>
                            <a href="{{route('user.category')}}" class="btn btn-primary ml-2">Huỷ lọc</a>
                        </form>


{{--                        <aside class="left_widgets p_filter_widgets">--}}
{{--                            <div class="l_w_title">--}}
{{--                                <h3>Color Filter</h3>--}}
{{--                            </div>--}}
{{--                            <div class="widgets_inner">--}}
{{--                                <ul class="list">--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Black</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Black Leather</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="active">--}}
{{--                                        <a href="#">Black with red</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Gold</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Spacegrey</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </aside>--}}

{{--                        <aside class="left_widgets p_filter_widgets">--}}
{{--                            <div class="l_w_title">--}}
{{--                                <h3>Lọc theo giá</h3>--}}
{{--                            </div>--}}
{{--                            <div class="widgets_inner">--}}
{{--                                <div class="range_item">--}}
{{--                                    <div id="slider-range"></div>--}}
{{--                                    <div class="">--}}
{{--                                        <label for="amount">Giá : </label>--}}
{{--                                        <input type="text" id="amount" readonly />--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </aside>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
