@extends('admin.layouts.master')
@section('title')
    <title>Chỉnh sửa sản phẩm</title>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="card card-primary col-12">
                <!-- /.card-header -->
                <!-- form start -->
                <form class="" method="POST" action="{{route('admin.products.update',$product->id)}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" value="{{auth()->user()}}" name="user_id">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm<span style="color:red;"> *</span></label>
                            <input name="name" value="@if(!empty(old("name"))){{old("name")}}@else{{$product->name}}@endif" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm">

                        </div>
                        @error('name')
                        <div class="" style="color:red;margin-top:-17px;">{{$message}}</div>
                        @enderror
                        <div class="row">
                            <div class="form-group col-6">
                                <div class="">
                                    <label for="exampleInputEmail1">Mô tả</label>
                                    <textarea class="col-12 form-control" name="description" id="text_area" cols="30" rows="10">@if(!empty(old("description"))){{old("description")}}@else{{$product->description}}@endif</textarea>
                                </div>
                                @error('description')
                                <span class="" style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputFile">Hình ảnh sản phẩm<span style="color:red;"> *</span></label>
                                <div class="col-4 image__upload">
                                    <button type="button" id="up_image">Chọn ảnh</button>
                                    <input style="visibility: hidden; position: absolute" value="{{$product->image}}" type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);" name="image">
                                    <div class="preview mt-2">
                                        <img src="{{url(Storage::url($product->image))}}" width="300px" height="215px" id="file-ip-1-preview">
                                    </div>
                                    @error('image')
                                    <span class="error text-danger mt-2" >{{ $message }}</span>
                                    @enderror
                                    <style>
                                        .preview > img {
                                            object-fit: cover;
                                            background-size: cover;
                                        }
                                    </style>
                                </div>
                            </div>

                        </div>
                        <div class= "row">
                            <div class="form-group col-6">
                                <label for="exampleInputPassword1">Danh mục<span style="color:red;"> *</span></label>
                                <select name="category_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
{{--                                    <option data-select2-id="3" value="" @if(empty(old('category_id'))){{'selected'}}@endif disabled>--Chọn danh mục--</option>--}}
                                    @foreach($categories as $item)
                                        @php
                                            $selected="";
                                            if($product->category_id == $item->id){
                                              $selected = "selected";
                                            }
                                        @endphp
                                        <option value="{{$item->id}}" {{$selected}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="" style="color:red;">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputPassword1">Nhãn hiệu<span style="color:red;"> *</span></label>
                                <select name="brand_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    @foreach($brands as $item)
                                        @php
                                            $selected="";
                                            if($product->brand_id == $item->id){
                                              $selected = "selected";
                                            }
                                        @endphp
                                        <option value="{{$item->id}}" {{$selected}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                <div class="" style="color:red;">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="row col-12">
                                <div class="form-group col-3">
                                    <label for="exampleInputPassword1">Số lượng<span style="color:red;"> *</span></label>
                                    <input name="quantity" value="@if(!empty(old("quantity"))){{old("quantity")}}@else{{$product->quantity}}@endif" type="number" min="1" class="form-control" id="exampleInputEmail1" placeholder="Nhập số lượng">
                                    @error('quantity')
                                    <div class="" style="color:red;">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <label for="exampleInputPassword1">Giá nhập vào<span style="color:red;"> *</span></label>
                                    <input name="input_price" value="@if(!empty(old("input_price"))){{old("input_price")}}@else{{$product->input_price}}@endif" type="text" step=".01" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá mua vào">
                                    @error('input_price')
                                    <div class="" style="color:red;">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <label for="exampleInputPassword1">Giá bán ra<span style="color:red;"> *</span></label>
                                    <input name="output_price" value="@if(!empty(old("output_price"))){{old("output_price")}}@else{{$product->output_price}}@endif" type="text" step=".01" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá gốc">
                                    @error('output_price')
                                    <div class="" style="color:red;">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <label for="exampleInputPassword1">Giá khuyến mại</label>
                                    <input name="sale_price" value="@if(!empty(old("sale_price"))){{old("sale_price")}}@else{{$product->sale_price}}@endif" type="text" step=".01" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá khuyến mại">
                                    @error('sale_price')
                                    <div class="" style="color:red;">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputPassword1">Trạng Thái<span style="color:red;"> *</span></label>
                                <select name="status" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    @foreach (\App\Models\Product::$status_Arr as $item)
                                        <option value="{{$item}}" {{ ($product->status == $item) ? 'selected' : '' }}>
                                            @if($item == App\Models\Product::STILL_IN_BUSINESS) Đang kinh doanh
                                            @elseif($item == App\Models\Product::STOP_BUSINESS) Ngừng kinh doanh
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href= "{{route('admin.products.list')}}" type="button" class="btn btn-outline-secondary">Hủy</a>
                        <button style="float:right;" type="submit" class="btn btn-success">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>

    </div><!-- /.container-fluid -->
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
        $('#up_image').click(function() {
            $('#file-ip-1').click();
        });
    </script>
@endsection
