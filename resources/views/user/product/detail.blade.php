@extends('user.layouts.master')
@section('content')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                    class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>Chi tiết sản phẩm</h2>
                        <p>Hiển thị chi tết của 1 sản phẩm</p>
                    </div>
                    <div class="page_link">
                        <a href="index.html">Trang chủ</a>
                        <a href="single-product.html">Chi tiết sản phẩm</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_product_img">
                        <div
                            id="carouselExampleIndicators"
                            class="carousel slide"
                            data-ride="carousel"
                        >
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img
                                        class="d-block w-100"
                                        src="{{url(Storage::url($product->image))}}"
                                        alt="First slide"
                                    />
                                </div>
{{--                                <div class="carousel-item">--}}
{{--                                    <img--}}
{{--                                        class="d-block w-100"--}}
{{--                                        src="./user/img/demo.jpg"--}}
{{--                                        alt="Second slide"--}}
{{--                                    />--}}
{{--                                </div>--}}
{{--                                <div class="carousel-item">--}}
{{--                                    <img--}}
{{--                                        class="d-block w-100"--}}
{{--                                        src="./user/img/demo.jpg"--}}
{{--                                        alt="Third slide"--}}
{{--                                    />--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{$product->name}} </h3>
                        <h2>{{number_format($product->sale_price)}} đ</h2>
                        <ul class="list">
                            <li>
                                <a class="active" href="#">
                                    <span>Danh mục</span> : {{$product->category->name}}</a
                                >
                            </li>
                            <li>
                                <a href="#"> <span>Nhãn hiệu</span> : {{$product->brand->name}}</a>
                            </li>
                        </ul>
                        <p>
                            {{$product->description}}
                        </p>
                        <form action="{{route('user.carts.add', $product->id)}}" method="GET">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="hidden" name="name" value="{{$product->name}}">
                            <input type="hidden" name="quantity" value="{{$product->quantity}}">
                            <input type="hidden" name="sale_price" value="{{$product->sale_price}}">
                            <div class="product_count">
                                <label for="qty">Số lượng cần mua:</label>
                                <input
                                    type="text"
                                    name="qty"
                                    id="sst"
                                    maxlength="12"
                                    value="1"
                                    title="Quantity:"
                                    class="input-text qty"
                                />
                            </div>
                            <div class="card_area">
                                <button type="submit" class="main_btn" href="#">Thêm vào giỏ hàng</button>
{{--                                <a class="icon_btn" href="#">--}}
{{--                                    <i class="lnr lnr lnr-diamond"></i>--}}
{{--                                </a>--}}
{{--                                <a class="icon_btn" href="#">--}}
{{--                                    <i class="lnr lnr lnr-heart"></i>--}}
{{--                                </a>--}}
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
{{--            <ul class="nav nav-tabs" id="myTab" role="tablist">--}}
{{--                <li class="nav-item">--}}
{{--                    <a--}}
{{--                        class="nav-link"--}}
{{--                        id="home-tab"--}}
{{--                        data-toggle="tab"--}}
{{--                        href="#home"--}}
{{--                        role="tab"--}}
{{--                        aria-controls="home"--}}
{{--                        aria-selected="true"--}}
{{--                    >Mô tả</a--}}
{{--                    >--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a--}}
{{--                        class="nav-link"--}}
{{--                        id="profile-tab"--}}
{{--                        data-toggle="tab"--}}
{{--                        href="#profile"--}}
{{--                        role="tab"--}}
{{--                        aria-controls="profile"--}}
{{--                        aria-selected="false"--}}
{{--                    >Specification</a--}}
{{--                    >--}}
{{--                </li>--}}

{{--            </ul>--}}
{{--            <div class="tab-content" id="myTabContent">--}}
{{--                <div--}}
{{--                    class="tab-pane fade"--}}
{{--                    id="home"--}}
{{--                    role="tabpanel"--}}
{{--                    aria-labelledby="home-tab"--}}
{{--                >--}}
{{--                    <p>--}}
{{--                        Beryl Cook is one of Britain’s most talented and amusing artists--}}
{{--                        .Beryl’s pictures feature women of all shapes and sizes enjoying--}}
{{--                        themselves .Born between the two world wars, Beryl Cook eventually--}}
{{--                        left Kendrick School in Reading at the age of 15, where she went--}}
{{--                        to secretarial school and then into an insurance office. After--}}
{{--                        moving to London and then Hampton, she eventually married her next--}}
{{--                        door neighbour from Reading, John Cook. He was an officer in the--}}
{{--                        Merchant Navy and after he left the sea in 1956, they bought a pub--}}
{{--                        for a year before John took a job in Southern Rhodesia with a--}}
{{--                        motor company. Beryl bought their young son a box of watercolours,--}}
{{--                        and when showing him how to use it, she decided that she herself--}}
{{--                        quite enjoyed painting. John subsequently bought her a child’s--}}
{{--                        painting set for her birthday and it was with this that she--}}
{{--                        produced her first significant work, a half-length portrait of a--}}
{{--                        dark-skinned lady with a vacant expression and large drooping--}}
{{--                        breasts. It was aptly named ‘Hangover’ by Beryl’s husband and--}}
{{--                    </p>--}}
{{--                    <p>--}}
{{--                        It is often frustrating to attempt to plan meals that are designed--}}
{{--                        for one. Despite this fact, we are seeing more and more recipe--}}
{{--                        books and Internet websites that are dedicated to the act of--}}
{{--                        cooking for one. Divorce and the death of spouses or grown--}}
{{--                        children leaving for college are all reasons that someone--}}
{{--                        accustomed to cooking for more than one would suddenly need to--}}
{{--                        learn how to adjust all the cooking practices utilized before into--}}
{{--                        a streamlined plan of cooking that is more efficient for one--}}
{{--                        person creating less--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <div--}}
{{--                    class="tab-pane fade"--}}
{{--                    id="profile"--}}
{{--                    role="tabpanel"--}}
{{--                    aria-labelledby="profile-tab"--}}
{{--                >--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table">--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <h5>Width</h5>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <h5>128mm</h5>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <h5>Height</h5>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <h5>508mm</h5>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <h5>Depth</h5>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <h5>85mm</h5>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <h5>Weight</h5>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <h5>52gm</h5>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <h5>Quality checking</h5>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <h5>yes</h5>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <h5>Freshness Duration</h5>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <h5>03days</h5>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <h5>When packeting</h5>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <h5>Without touch of hand</h5>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <h5>Each Box contains</h5>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <h5>60pcs</h5>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div--}}
{{--                    class="tab-pane fade"--}}
{{--                    id="contact"--}}
{{--                    role="tabpanel"--}}
{{--                    aria-labelledby="contact-tab"--}}
{{--                >--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-6">--}}
{{--                            <div class="comment_list">--}}
{{--                                <div class="review_item">--}}
{{--                                    <div class="media">--}}
{{--                                        <div class="d-flex">--}}
{{--                                            <img--}}
{{--                                                src="img/product/single-product/review-1.png"--}}
{{--                                                alt=""--}}
{{--                                            />--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h4>Blake Ruiz</h4>--}}
{{--                                            <h5>12th Feb, 2017 at 05:56 pm</h5>--}}
{{--                                            <a class="reply_btn" href="#">Trả lời</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <p>--}}
{{--                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,--}}
{{--                                        sed do eiusmod tempor incididunt ut labore et dolore magna--}}
{{--                                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation--}}
{{--                                        ullamco laboris nisi ut aliquip ex ea commodo--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-6">--}}
{{--                            <div class="review_box">--}}
{{--                                <h4>Thêm bình luận</h4>--}}
{{--                                <form--}}
{{--                                    class="row contact_form"--}}
{{--                                    action="contact_process.php"--}}
{{--                                    method="post"--}}
{{--                                    id="contactForm"--}}
{{--                                    novalidate="novalidate"--}}
{{--                                >--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input--}}
{{--                                                type="text"--}}
{{--                                                class="form-control"--}}
{{--                                                id="name"--}}
{{--                                                name="name"--}}
{{--                                                placeholder="Your Full name"--}}
{{--                                            />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input--}}
{{--                                                type="email"--}}
{{--                                                class="form-control"--}}
{{--                                                id="email"--}}
{{--                                                name="email"--}}
{{--                                                placeholder="Email Address"--}}
{{--                                            />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input--}}
{{--                                                type="text"--}}
{{--                                                class="form-control"--}}
{{--                                                id="number"--}}
{{--                                                name="number"--}}
{{--                                                placeholder="Phone Number"--}}
{{--                                            />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                        <textarea--}}
{{--                            class="form-control"--}}
{{--                            name="message"--}}
{{--                            id="message"--}}
{{--                            rows="1"--}}
{{--                            placeholder="Message"--}}
{{--                        ></textarea>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12 text-right">--}}
{{--                                        <button--}}
{{--                                            type="submit"--}}
{{--                                            value="submit"--}}
{{--                                            class="btn submit_btn"--}}
{{--                                        >--}}
{{--                                            Đăng ngay--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div--}}
{{--                    class="tab-pane fade show active"--}}
{{--                    id="review"--}}
{{--                    role="tabpanel"--}}
{{--                    aria-labelledby="review-tab"--}}
{{--                >--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-6">--}}
{{--                            <div class="row total_rate">--}}
{{--                                <div class="col-6">--}}
{{--                                    <div class="box_total">--}}
{{--                                        <h5>Tổng</h5>--}}
{{--                                        <h4>4.0</h4>--}}
{{--                                        <h6>(03 đánh giá)</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-6">--}}
{{--                                    <div class="rating_list">--}}
{{--                                        <h3>Dựa trên 3 đánh giá</h3>--}}
{{--                                        <ul class="list">--}}
{{--                                            <li>--}}
{{--                                                <a href="#"--}}
{{--                                                >5 Star--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i> 01</a--}}
{{--                                                >--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#"--}}
{{--                                                >4 Star--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i> 01</a--}}
{{--                                                >--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#"--}}
{{--                                                >3 Star--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i> 01</a--}}
{{--                                                >--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#"--}}
{{--                                                >2 Star--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i> 01</a--}}
{{--                                                >--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a href="#"--}}
{{--                                                >1 Star--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i> 01</a--}}
{{--                                                >--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="review_list">--}}
{{--                                <div class="review_item">--}}
{{--                                    <div class="media">--}}
{{--                                        <div class="d-flex">--}}
{{--                                            <img--}}
{{--                                                src="img/product/single-product/review-1.png"--}}
{{--                                                alt=""--}}
{{--                                            />--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h4>Blake Ruiz</h4>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <p>--}}
{{--                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,--}}
{{--                                        sed do eiusmod tempor incididunt ut labore et dolore magna--}}
{{--                                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation--}}
{{--                                        ullamco laboris nisi ut aliquip ex ea commodo--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="review_item">--}}
{{--                                    <div class="media">--}}
{{--                                        <div class="d-flex">--}}
{{--                                            <img--}}
{{--                                                src="img/product/single-product/review-2.png"--}}
{{--                                                alt=""--}}
{{--                                            />--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h4>Blake Ruiz</h4>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <p>--}}
{{--                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,--}}
{{--                                        sed do eiusmod tempor incididunt ut labore et dolore magna--}}
{{--                                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation--}}
{{--                                        ullamco laboris nisi ut aliquip ex ea commodo--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="review_item">--}}
{{--                                    <div class="media">--}}
{{--                                        <div class="d-flex">--}}
{{--                                            <img--}}
{{--                                                src="img/product/single-product/review-3.png"--}}
{{--                                                alt=""--}}
{{--                                            />--}}
{{--                                        </div>--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h4>Blake Ruiz</h4>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <p>--}}
{{--                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,--}}
{{--                                        sed do eiusmod tempor incididunt ut labore et dolore magna--}}
{{--                                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation--}}
{{--                                        ullamco laboris nisi ut aliquip ex ea commodo--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-6">--}}
{{--                            <div class="review_box">--}}
{{--                                <h4>Thêm đánh giá</h4>--}}
{{--                                <p>Bình chọn của bạn:</p>--}}
{{--                                <ul class="list">--}}
{{--                                    <li>--}}
{{--                                        <a href="#">--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                                <p>Nổi bật</p>--}}
{{--                                <form--}}
{{--                                    class="row contact_form"--}}
{{--                                    action="contact_process.php"--}}
{{--                                    method="post"--}}
{{--                                    id="contactForm"--}}
{{--                                    novalidate="novalidate"--}}
{{--                                >--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input--}}
{{--                                                type="text"--}}
{{--                                                class="form-control"--}}
{{--                                                id="name"--}}
{{--                                                name="name"--}}
{{--                                                placeholder="Your Full name"--}}
{{--                                            />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input--}}
{{--                                                type="email"--}}
{{--                                                class="form-control"--}}
{{--                                                id="email"--}}
{{--                                                name="email"--}}
{{--                                                placeholder="Email Address"--}}
{{--                                            />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input--}}
{{--                                                type="text"--}}
{{--                                                class="form-control"--}}
{{--                                                id="number"--}}
{{--                                                name="number"--}}
{{--                                                placeholder="Phone Number"--}}
{{--                                            />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                        <textarea--}}
{{--                            class="form-control"--}}
{{--                            name="message"--}}
{{--                            id="message"--}}
{{--                            rows="1"--}}
{{--                            placeholder="Review"--}}
{{--                        ></textarea>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12 text-right">--}}
{{--                                        <button--}}
{{--                                            type="submit"--}}
{{--                                            value="submit"--}}
{{--                                            class="btn submit_btn"--}}
{{--                                        >--}}
{{--                                            Submit Now--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </section>
@endsection
