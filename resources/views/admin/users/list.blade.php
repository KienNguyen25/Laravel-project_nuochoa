@extends('admin.layouts.master')
@section('title')
    <title>Danh sách người dùng</title>
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Người dùng</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Người dùng</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="card-body">
        <form>
            <div class="input-group input-group-sm" style="width: 40%; margin-bottom: 10px;">
                @php
                        $selected = '';
                 @endphp
                <input type="text" value="{{request()->get('email')}}" name="email" class="form-control float-right mx-1" placeholder="Nhập email để tìm kiếm">
                <select name="status" style="border: 1px solid #ccc" id="">
                    <option value="" disabled @php if(!request()->get('status')) {$selected = "selected";}@endphp {{$selected}}>__Chọn trạng thái__</option>
                    <option value="{{\App\Models\User::STATUS['ACTIVE']}}"  @php if(\App\Models\User::STATUS['ACTIVE'] === (int)request()->get('status')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>Đang hoạt động</option>
                    <option value="{{\App\Models\User::STATUS['DE_ACTIVE']}}" @php if(\App\Models\User::STATUS['DE_ACTIVE'] === (int)request()->get('status')) {$selected = "selected";}else{$selected = '';}@endphp {{$selected}}>Đã bị khoá</option>
                </select>
                <button type="submit" class="btn btn-primary" style="height:32.5px; margin-left:5px;padding-top:3px;">
                    Lọc kết quả
                </button>
            </div>
        </form>
        <a href="{{route('admin.users.list')}}" class="btn btn-primary mb-3" style="height:32.5px; margin-left:5px;padding-top:3px; color:#fff">
            Huỷ lọc
        </a>
{{--        <a href="{{route('admin.brands.create')}}" class="btn-primary px-2 py-2 mb-3 border-0 float-right text-white " style="cursor: pointer">Thêm mới</a>--}}
        <table class="table table-bordered" style="margin-bottom: 10px">
            <thead>
            <tr>
                <th class="text-center" style="width: 10px">STT</th>
                <th class="text-center" style="width: 300px">Tên</th>
                <th style="width: 300px">Email</th>
                <th style="width: 300px">Số điện thoại</th>
                <th class="text-center">Giới tính</th>
                <th>Trạng thái</th>
                <th class="text-center" style="width: 150px">Hành động</th>
            </tr>
            </thead>
            <tbody>
            @if(count($users) > 0)
                @foreach($users as $key => $user)
                    <tr>
                        <td>{{$key}}</td>
                        <td>
                            {{$user->name}}
                        </td>
                        <td style="width: 200px">{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td class="text-center">{{$user->gender_text}}</td>
                        @if($user->status == \App\Models\User::STATUS['ACTIVE'])
                        <td class="text-success">{{$user->status_text}}</td>
                        @else
                            <td class="text-danger">{{$user->status_text}}</td>
                        @endif
                        <td class="text-center">
                            @if($user->status == \App\Models\User::STATUS['ACTIVE'])
                            <form action="{{route('admin.users.lock', $user->id)}}" method="POST" style="display: inline-block">
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <button id="delete" onclick="deleteBorder()" style="margin-left:10px; border: none" type="submit" class= "btn-delete text-warning"><i class="fa-solid fa-lock"></i></button>
                            </form>
                            @else
                            <form action="{{route('admin.users.unLock', $user->id)}}" method="POST" style="display: inline-block">
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <button id="delete" onclick="deleteBorder()" style="margin-left:10px; border: none" type="submit" class= "btn-delete text-primary"><i class="fa-solid fa-lock-open"></i></button>
                            </form>
                            @endif
{{--                            <form action="{{route('admin.users.delete',$user->id)}}" method="POST" style="display: inline-block">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" name="_method" value="delete">--}}
{{--                                <button id="delete" onclick="deleteBorder()" style="margin-left:10px; border: none" type="submit" class= "btn-delete text-danger"><i class="fa-solid fa-trash"></i></button>--}}
{{--                            </form>--}}
                        </td>
                    </tr>
                @endforeach
            @else
                <div class="text-danger">Chưa có khách hàng nào để hiển thị!!!</div>
            @endif
            </tbody>
        </table>
        <div style="float: right">{{ $users->links() }}</div>
    </div>
    <style>
        #delete:focus{
            outline: unset;
        }
    </style>
@endsection

