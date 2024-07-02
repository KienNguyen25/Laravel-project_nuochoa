@extends('admin.layouts.master')
@section('title')
    <title>Danh sách sản phẩm</title>
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sản phẩm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="card-body">
        <form>
            <div class="input-group input-group-sm" style="width: 70%; margin-bottom: 10px;">
                <input type="text" value="{{request()->get('name')}}" name="name" class="form-control float-right mx-1" placeholder="Nhập tên để tìm kiếm">
                <select name="category" style="border: 1px solid #ccc" id="" class="mr-1">
                    <option value="" disabled selected>__Chọn danh mục__</option>
                    @if($categories)
                        @foreach($categories as $category)
                            @php
                                $selected="";
                                if($category->id == request()->get('category')){
                                  $selected = "selected";
                                }
                            @endphp
                    <option value="{{$category->id}}" {{$selected}}>{{$category->name}}</option>
                        @endforeach
                    @endif
                </select>
                <select name="brand" style="border: 1px solid #ccc" id="" class="mr-1">
                    <option value="" disabled selected>__Chọn nhãn hiệu__</option>
                    @if($brands)
                        @foreach($brands as $brand)
                            @php
                                $selected="";
                                if($brand->id == request()->get('brand')){
                                  $selected = "selected";
                                }
                            @endphp
                            <option value="{{$brand->id}}" {{$selected}}>{{$brand->name}}</option>
                        @endforeach
                    @endif
                </select>
                <select style="border: 1px solid #ccc" name="price" id="">
                    @php
                        $selected="";
                    @endphp
                    <option value="" @php if(!request()->get('price')) {$selected = "selected";}@endphp {{$selected}} disabled>__Chọn giá bán__</option>
                    <option value="{{\App\Models\Product::KHOANG_GIA['100-500']}}" @php if(\App\Models\Product::KHOANG_GIA['100-500'] === (int)request()->get('price')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>100.000đ - 500.000đ</option>
                    <option value="{{\App\Models\Product::KHOANG_GIA['500-1tr']}}" @php if(\App\Models\Product::KHOANG_GIA['500-1tr'] === (int)request()->get('price')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>500.000đ - 1.000.000đ</option>
                    <option value="{{\App\Models\Product::KHOANG_GIA['1tr-3tr']}}" @php if(\App\Models\Product::KHOANG_GIA['1tr-3tr'] === (int)request()->get('price')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>1.000.000đ - 3.000.000đ</option>
                    <option value="{{\App\Models\Product::KHOANG_GIA['3tr-5tr']}}" @php if(\App\Models\Product::KHOANG_GIA['3tr-5tr'] === (int)request()->get('price')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>3.000.000đ - 5.000.000đ</option>
                    <option value="{{\App\Models\Product::KHOANG_GIA['tren_5tr']}}" @php if(\App\Models\Product::KHOANG_GIA['tren_5tr'] === (int)request()->get('price')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>Trên 5.000.000đ</option>
                </select>
                <button type="submit" class="btn btn-primary" style="height:32.5px; margin-left:5px;padding-top:3px;">
                    Lọc kết quả
                </button>
            </div>
        </form>
        <a href="{{route('admin.products.list')}}" class="btn btn-primary" style="height:32.5px; margin-left:5px;padding-top:3px; color:#fff">
            Huỷ lọc
        </a>
        <a href="{{route('admin.products.create')}}" class="btn-primary px-2 py-2 mb-3 border-0 float-right text-white " style="cursor: pointer">Thêm mới</a>
        <table class="table text-nowrap">
            <thead>
            <tr>
                <th>Stt</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Danh mục</th>
                <th>Nhãn Hiệu</th>
                <th>Số lượng</th>
                <th>Giá nhập vào</th>
                <th>Giá bán</th>
                <th>% giảm giá</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @if(count($products) > 0)
                @php
                    $key= 0;
                @endphp
                @foreach($products as $key => $product)
                  @php
                      $key ++;
                  @endphp
                <tr>
                    {{-- <td>{{$key}}</td> --}}
                    <td>{{$key}}</td>
                    <td style= "color: blue"><a href ="{{route('user.product.detail', $product->id)}}" target="_blank">{{$product->name}}</a></td>
                    <td>
                        <img style="width: 100px;
                            object-fit: cover;
                            height: 50px;
                            background-size: cover;" src="{{url(Storage::url($product->image))}}">
                    </td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->brand->name}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{number_format($product->input_price)}}đ</td>
                    <td>{{number_format($product->output_price)}}đ</td>
                    <td>{{number_format((($product->output_price - $product->sale_price)/$product->output_price)*100 , 2)}}%</td>
                    <td>{{$product->status_text}}</td>
                    <td class="text-center">
                        <a href="{{route('admin.products.edit',$product->id)}}" type="button" class= "btn-edit text-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{route('admin.products.delete',$product->id)}}" method="POST" style="display: inline-block">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button id="delete" onclick="deleteBorder()" style="margin-left:10px; border: none" type="submit" class= "btn-delete text-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @else
                <div class="text-danger">Chưa có sản phẩm nào để hiển thị, vui lòng thêm sản phẩm!!!</div>
            @endif
            </tbody>
        </table>
    </div>
{{$products->links() }}
    <style>
        #delete:focus{
            outline: unset;
        }
    </style>
@endsection
@section('js')
    <script>
        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection
