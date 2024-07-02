@extends('admin.layouts.master')
@section('title')
    <title>Sửa danh mục</title>
@endsection
@section('content')
    <div class="card card-primary">
        <form action="{{route('admin.categories.update', $category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4 image__upload">
                    <div class="view_image" id="view_image">
                        <img src="{{url(Storage::url($category->image))}}" alt="">
                    </div>
                    <div class="preview">
                        <img id="file-ip-1-preview">
                    </div>
                    <label for="file-ip-1">Upload ảnh</label>
                    <input type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);" name="image">
                    @error('image')
                    <span class="error" >{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-8 card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" name="name" value="@if(!empty(old("name"))){{old("name")}}@else {{$category->name}}@endif">
                        @error('name')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả</label>
                        <textarea type="text" class="form-control" id="exampleInputPassword1" placeholder="Mô tả" name="description">@if(!empty(old("description"))){{old("description")}}@else {{$category->description}}@endif</textarea>
                    </div>
                    <div class="float-right">
                        <a href="{{route('admin.categories.list')}}" type="" class="btn btn-secondary">Huỷ</a>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </div>
            </div>
        </form>
        <style>
            .error {
                color: red;
            }
            .preview{
                padding-top: 25px;
                width: 50%;
                margin: auto;
            }
            .view_image{
                padding-top: 25px;
                width: 50%;
                margin: auto;
            }
            .view_image img{
                width:100%;
                height: 165px;
                margin-bottom:30px;
                position: relative;
            }
            .preview img{
                width:100%;
                height: 165px;
                display:none;
                margin-bottom:30px;
                position: relative;
            }
            .image__upload > label{
                position: absolute;
                left: 0;
                right: 0;
                bottom: 14px;
                display:block;
                text-align:center;
                text-decoration: underline;
                color:#1172c2;
                font-size:15px;
                font-family:"Open Sans",sans-serif;
                font-weight:600;
                border-radius:5px;
                cursor:pointer;
                margin: auto;
            }
            #file-ip-1{
                display: none;
            }
            .image__upload{
                text-align: center;
            }
        </style>
    </div>
@endsection
@section('js')
    <script>
        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                var view_image = document.getElementById('view_image');
                view_image.style.display = 'none';
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection
