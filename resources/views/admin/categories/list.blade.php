@extends('admin.layouts.master')
@section('title')
    <title>Danh sách danh mục</title>
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Danh mục</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh mục</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="card-body">
        <form>
            <div class="input-group input-group-sm" style="width: 30%; margin-bottom: 10px;">
                <input type="text" value="{{request()->input('keyword')}}" name="keyword" class="form-control float-right mx-1" placeholder="Nhập tên để tìm kiếm">
                <button type="submit" class="btn btn-primary" style="height:32.5px; margin-left:5px;padding-top:3px;">
                    Lọc kết quả
                </button>
            </div>
        </form>
        <a href="{{route('admin.categories.list')}}" class="btn btn-primary" style="height:32.5px; margin-left:5px;padding-top:3px; color:#fff">
            Huỷ lọc
        </a>
        <a href="{{route('admin.categories.create')}}" class="btn-primary px-2 py-2 mb-3 border-0 float-right text-white " style="cursor: pointer">Thêm mới</a>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <thead>
            <tr>
                <th class="text-center" style="width: 10px">STT</th>
                <th class="text-center" style="width: 100px">Ảnh</th>
                <th style="min-width: 250px">Tên danh mục</th>
                <th>Mô tả</th>
                <th class="text-center" style="width: 150px">Hành động</th>
            </tr>
            </thead>
            <tbody>
            @if($categories->total() > 0)
                @foreach($categories as $key => $category)
            <tr>
                <td>{{$key}}</td>
                <td>
                    <img style="width: 90px;
                            object-fit: cover;
                            height: 50px;
                            background-size: cover;" src="{{url(Storage::url($category->image))}}" alt="">
                </td>
                <td style="width: 200px">{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td class="text-center">
                    <a href="{{route('admin.categories.edit',$category->id)}}" type="button" class= "btn-edit text-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{route('admin.categories.delete',$category->id)}}" method="POST" style="display: inline-block">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        <button id="delete" onclick="deleteBorder()" style="margin-left:10px; border: none" type="submit" class= "btn-delete text-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
                @endforeach
            @else
                <div class="text-danger">Chưa có danh mục nào để hiển thị, vui lòng thêm danh mục!!!</div>
            @endif
            </tbody>
        </table>
        <div style="float: right">{{ $categories->links() }}</div>
    </div>
    <style>
        #delete:focus{
            outline: unset;
        }
    </style>
@endsection

