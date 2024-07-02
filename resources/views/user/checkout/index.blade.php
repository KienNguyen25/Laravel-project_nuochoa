@extends('user.layouts.master')
@section('content')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                    class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>Thanh toán</h2>
                        <p></p>
                    </div>
                    <div class="page_link">
                        <a href="index.html">Trang chủ</a>
                        <a href="checkout.html">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
{{--            <div class="returning_customer">--}}
{{--                <div class="check_title">--}}
{{--                    <h2>--}}
{{--                        Returning Customer?--}}
{{--                        <a href="#">Click here to login</a>--}}
{{--                    </h2>--}}
{{--                </div>--}}
{{--                <p>--}}
{{--                    If you have shopped with us before, please enter your details in the--}}
{{--                    boxes below. If you are a new customer, please proceed to the--}}
{{--                    Billing & Shipping section.--}}
{{--                </p>--}}
{{--                <form--}}
{{--                    class="row contact_form"--}}
{{--                    action="#"--}}
{{--                    method="post"--}}
{{--                    novalidate="novalidate"--}}
{{--                >--}}
{{--                    <div class="col-md-6 form-group p_star">--}}
{{--                        <input--}}
{{--                            type="text"--}}
{{--                            class="form-control"--}}
{{--                            id="name"--}}
{{--                            name="name"--}}
{{--                            value=" "--}}
{{--                        />--}}
{{--                        <span--}}
{{--                            class="placeholder"--}}
{{--                            data-placeholder="Username or Email"--}}
{{--                        ></span>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 form-group p_star">--}}
{{--                        <input--}}
{{--                            type="password"--}}
{{--                            class="form-control"--}}
{{--                            id="password"--}}
{{--                            name="password"--}}
{{--                            value=""--}}
{{--                        />--}}
{{--                        <span class="placeholder" data-placeholder="Password"></span>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-12 form-group">--}}
{{--                        <button type="submit" value="submit" class="btn submit_btn">--}}
{{--                            Send Message--}}
{{--                        </button>--}}
{{--                        <div class="creat_account">--}}
{{--                            <input type="checkbox" id="f-option" name="selector" />--}}
{{--                            <label for="f-option">Remember me</label>--}}
{{--                        </div>--}}
{{--                        <a class="lost_pass" href="#">Lost your password?</a>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            <div class="cupon_area">--}}
{{--                <div class="check_title">--}}
{{--                    <h2>--}}
{{--                        Have a coupon?--}}
{{--                        <a href="#">Click here to enter your code</a>--}}
{{--                    </h2>--}}
{{--                </div>--}}
{{--                <input type="text" placeholder="Enter coupon code" />--}}
{{--                <a class="tp_btn" href="#">Apply Coupon</a>--}}
{{--            </div>--}}
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-5">
                        <h3>Hoá đơn chi tiết</h3>
                        <form
                            class="row contact_form"
                            action="{{route('user.orders.store')}}"
                            method="post"
                            novalidate="novalidate"
                        >
                            @csrf
                            <div class="col-md-12 form-group p_star">
                                <div class="d-flex justify-content-between">
                                    <label for="email" class="form-label">Tên người nhận<span class="text-danger">*</span></label>

                                </div>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="first"
                                    value="{{auth()->guard('web')->user()->name}}"
                                    name="name" placeholder="Tên khách hàng"
                                />
                                @error('name')
                                <span class="error" >{{ $message }}</span>
                                @enderror
                            </div>
{{--                            <div class="col-md-12 form-group">--}}
{{--                                <input--}}
{{--                                    type="text"--}}
{{--                                    class="form-control"--}}
{{--                                    id="company"--}}
{{--                                    name="company"--}}
{{--                                    placeholder="Company name"--}}
{{--                                />--}}
{{--                            </div>--}}
                            <div class="col-md-6 form-group p_star">
                                <div class="d-flex justify-content-between">
                                    <label for="email" class="form-label">Số điện thoại<span class="text-danger">*</span></label>

                                </div>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="number"
                                    name="phone"
                                    value="{{auth()->guard('web')->user()->phone}}"
                                    disabled
                                />

                            </div>
                            <div class="col-md-6 form-group p_star">
                                <div class="d-flex justify-content-between">
                                    <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                </div>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    value="{{auth()->guard('web')->user()->email}}"
                                    disabled
                                />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <div class="d-flex justify-content-between">
                                    <label for="email" class="form-label">Địa chỉ<span class="text-danger">*</span></label>
                                </div>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="add1"
                                    name="address"
                                    placeholder="Nhập địa chỉ"
                                    value="@if(auth()->guard('web')->user()->address) {{auth()->guard('web')->user()->address}}@endif"
                                />
                                @error('address')
                                <span class="error" >{{ $message }}</span>
                                @enderror
                            </div>
{{--                            <div class="col-md-12 form-group p_star">--}}
{{--                                <input--}}
{{--                                    type="text"--}}
{{--                                    class="form-control"--}}
{{--                                    id="add2"--}}
{{--                                    name="add2"--}}
{{--                                />--}}
{{--                                <span--}}
{{--                                    class="placeholder"--}}
{{--                                    data-placeholder="Address line 02"--}}
{{--                                ></span>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12 form-group p_star">--}}
{{--                                <input--}}
{{--                                    type="text"--}}
{{--                                    class="form-control"--}}
{{--                                    id="city"--}}
{{--                                    name="city"--}}
{{--                                />--}}
{{--                                <span class="placeholder" data-placeholder="Town/City"></span>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12 form-group p_star">--}}
{{--                                <select class="country_select">--}}
{{--                                    <option value="1">District</option>--}}
{{--                                    <option value="2">District</option>--}}
{{--                                    <option value="4">District</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12 form-group">--}}
{{--                                <input--}}
{{--                                    type="text"--}}
{{--                                    class="form-control"--}}
{{--                                    id="zip"--}}
{{--                                    name="zip"--}}
{{--                                    placeholder="Postcode/ZIP"--}}
{{--                                />--}}
{{--                            </div>--}}
                            <div class="col-md-12 form-group">
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea
                                    class="form-control"
                                    name="note"
                                    id="message"
                                    rows="1"
                                    placeholder="Chú ý khi giao hàng"
                                ></textarea>
                            </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="order_box">
                            <h2>Đơn hàng của bạn</h2>
                            <ul class="list">
                                <li>
                                    <a href=""
                                    >Sản phẩm
                                        <span>Tổng</span>
                                    </a>
                                </li>
                                @if($carts)
                                    @foreach($carts as $cart)
                                <li>
                                    <a href="#"
                                    >{{$cart->name}}
                                        <span class="middle">x {{$cart->qty}}</span>
                                        <span class="last">{{number_format($cart->subtotal)}}đ</span>
                                    </a>
                                </li>
                                    @endforeach
                                @endif
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#"
                                    >Tổng tiền
                                        <span>{{Cart::subtotal()}}đ</span>
                                    </a>
                                </li>
                            </ul>
{{--                            <div class="payment_item">--}}
{{--                                <div class="radion_btn">--}}
{{--                                    <input type="radio" id="f-option5" name="selector" />--}}
{{--                                    <label for="f-option5">Check payments</label>--}}
{{--                                    <div class="check"></div>--}}
{{--                                </div>--}}
{{--                                <p>--}}
{{--                                    Please send a check to Store Name, Store Street, Store Town,--}}
{{--                                    Store State / County, Store Postcode.--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <div class="payment_item active">--}}
{{--                                <div class="radion_btn">--}}
{{--                                    <input type="radio" id="f-option6" name="selector" />--}}
{{--                                    <label for="f-option6">Paypal </label>--}}
{{--                                    <img src="img/product/single-product/card.jpg" alt="" />--}}
{{--                                    <div class="check"></div>--}}
{{--                                </div>--}}
{{--                                <p>--}}
{{--                                    Please send a check to Store Name, Store Street, Store Town,--}}
{{--                                    Store State / County, Store Postcode.--}}
{{--                                </p>--}}
{{--                            </div>--}}
                            <button class="btn btn-success mt-2" type="submit">Tiến hành thanh toán</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .error {
            color: red;
        }
    </style>
@endsection
