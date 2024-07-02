@extends('admin.layouts.master')
@section('title')
    <title>Danh sách đơn hàng</title>
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Đơn hàng</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đơn hàng</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="card-body" style="overflow: auto">
        <form>
            <div class="input-group input-group-sm" style="width: 60%; margin-bottom: 10px;">
                <input type="text"  name="keyword" value="{{ request()->input('keyword') }}" class="form-control float-right mx-1" placeholder="Nhập tên để tìm kiếm" >
                <input type="text"  name="keyword1" value="{{ request()->input('keyword1') }}" class="form-control float-right mx-1" placeholder="Nhập mã đơn tìm kiếm" >
                <select style="border: 1px solid #ccc" name="status" id="">
                    @php
                        $selected="";
                    @endphp
                    <option value="" @php if(!request()->get('status')) {$selected = "selected";}@endphp {{$selected}} disabled>__Chọn trạng thái__</option>
                    <option value="{{\App\Models\Order::STATUS['DA_DAT_HANG']}}" @php if(\App\Models\Order::STATUS['DA_DAT_HANG'] === (int)request()->get('status')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>Đã đặt hàng</option>
                    <option value="{{\App\Models\Order::STATUS['DA_XAC_NHAN']}}" @php if(\App\Models\Order::STATUS['DA_XAC_NHAN'] === (int)request()->get('status')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>Đã xác nhận</option>
                    <option value="{{\App\Models\Order::STATUS['DANG_VAN_CHUYEN']}}" @php if(\App\Models\Order::STATUS['DANG_VAN_CHUYEN'] === (int)request()->get('status')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>Đang vận chuyển</option>
                    <option value="{{\App\Models\Order::STATUS['DA_GIAO_HANG']}}" @php if(\App\Models\Order::STATUS['DA_GIAO_HANG'] === (int)request()->get('status')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>Đã giao hàng</option>
                    <option value="{{\App\Models\Order::STATUS['YEU_CAU_HUY']}}" @php if(\App\Models\Order::STATUS['YEU_CAU_HUY'] === (int)request()->get('status')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>Yêu cầu huỷ</option>
                    <option value="{{\App\Models\Order::STATUS['DA_BI_HUY']}}" @php if(\App\Models\Order::STATUS['DA_BI_HUY'] === (int)request()->get('status')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>Đã huỷ</option>
                </select>

                <button type="submit" class="btn btn-primary" style="height:32.5px; margin-left:5px;padding-top:3px;">
                    Lọc kết quả
                </button>
            </div>
        </form>
        <a href="{{route('admin.orders.list')}}" class="btn btn-primary" style="height:32.5px; margin-left:5px;padding-top:3px; color:#fff">
            Huỷ lọc
        </a>
        <table class="table table-hover text-nowrap" style="width: 100%">
            <thead>
            <tr>
                <th>Stt</th>
                <th>Sản phẩm</th>
                <th>Mã đơn hàng</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thông tin thêm</th>
                <th>Tổng tiền</th>
                <th>Người mua</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @if($orders)
            @foreach($orders as $key => $order)
                <tr>
                    <td>@php echo $key + 1 @endphp</td>
                    <td ><a href="" class="text-danger">{{$order->order_id}}</a></td>
                    <td style= "color: blue"><a href =""></a>@foreach($order->products as $product)
                            {{$product->name}}</br>
                        @endforeach</td>
                    <td>
                        @foreach($order->products as $product)
                            {{$product->pivot->quantity}}</br>
                        @endforeach</td>
                    <td>
                        @foreach($order->products as $product)
                            {{number_format($product->pivot->price,0,'.',',')}}đ</br>
                        @endforeach</td>
                    <td>{{$order->note}}</td>
                    <td>{{number_format($order->total,0,'.',',')}}đ</td>
                    <td>{{$order->receiver_name}}</td>
                    <td>{{$order->user->email}}</td>
                    <td>{{$order->receiver_address}}</td>
                    <td>{{$order->user->phone}}</td>
                    <td style="@if($order->status==5) color:red;@endif ">
                        {{$order->status_text}}
                    </td>
                    <td>@php
                            $disabled1="";
                            $disabled2="";
                            $disabled3="";
                            $disabled4="";
                            $disabled5="";
                            if($order->status>=1){
                              $disabled1 = "disabled";
                            }
                            if($order->status>=2){
                              $disabled2 = "disabled";
                            }
                            if($order->status>=3){
                              $disabled3 = "disabled";
                            }
                            if($order->status>=4){
                              $disabled4 = "disabled";
                            }
                            if($order->status>=6 | $order->status==4){
                              $disabled5 = "disabled";
                            }
                        @endphp
                        <span><select name="forma" onchange="location = this.value;">
                            <option disabled selected>---Sửa trạng thái---</option>
                            <option value="" {{$disabled1}}>Đã đặt hàng</option>
                            <option value="{{route('admin.orders.confirmed',$order->id)}}" {{$disabled2}}>Đơn hàng đã được xác nhận</option>
                            <option value="{{route('admin.orders.shipping',$order->id)}}" {{$disabled3}}>Đang vận chuyển</option>
                            <option value="{{route('admin.orders.delivered',$order->id)}}" {{$disabled4}}>Đã giao hàng</option>
                            <option value="{{route('admin.orders.cancelled',$order->id)}}" {{$disabled5}}>Đơn hàng bị hủy</option>
                          </select></span>
                    </td>
                </tr>
            @endforeach
            @endif

            </tbody>
        </table>
        <div style="float: right">{{ $orders->links() }}</div>
    </div>
    <style>
        #delete:focus{
            outline: unset;
        }
    </style>
@endsection

