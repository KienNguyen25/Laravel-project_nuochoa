@extends('user.layouts.master')
@section('content')
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                    class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>Đơn hàng</h2>
                        <p>Danh sách các đơn hàng của bạn</p>
                    </div>
                    <div class="page_link">
                        <a href="">Trang chủ</a>
                        <a href="">Đơn hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($orders)
    @foreach($orders as $key => $order)
        <div class="order_details_table" style="width:90%; margin:80px auto;">

            <h2>Chi tiết đơn hàng @php echo $key + 1 @endphp</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Sản Phẩm</th>
                        <th scope="col">Số Lượng</th>
                        <!-- <th scope="col">Chú ý</th> -->
                        <th scope="col">Giá tiền</th>
                        <th scope="col">Tổng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products as $product)
                        <tr>

                            <td>
                                <p>{{$product->name}}</p>
                            </td>
                            <td>
                                <h5>x {{$product->pivot->quantity}}</h5>
                            </td>

                            <td><p>{{number_format($product->pivot->price)}}đ</p></td>
                            <td>
                                <p>{{number_format($product->pivot->quantity * $product->pivot->price)}}đ</p>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            <h4>Chú ý về sản phẩm</h4>
                        </td>
                        <td>
                            <p>{{$order->note}}</p>
                        </td>
                        <td>
                            <h5></h5>
                        </td>
                        <td>
                            <p></p>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h4>Tổng thanh toán</h4>
                        </td>
                        <td>
                            <h5></h5>
                        </td>
                        <td>
                            <h5></h5>
                        </td>
                        <td>
                            <p>{{number_format((int)$order->total)}}đ</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Trạng thái đơn hàng</h4>
                        </td>
                        <td>
                            <h5></h5>
                        </td>
                        <td>
                            <h5></h5>
                        </td>
                        <td>
                            <p style="color:red;">{{$order->status_text}}</p>
                        </td>
                    </tr>

                    </tbody>
                </table>
                @if($order->status != 5 && $order->status !=6 && $order->status != 4)
                    <button class="btn btn-danger ml-2"><a style="color: #ffffff;" href="{{ route('admin.orders.cancelled', ['id' =>$order->id]) }}">Hủy đơn hàng</a></button>
                @endif
            </div>
        </div>
    @endforeach
    @endif
@endsection
