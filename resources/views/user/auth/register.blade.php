<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper" style="max-width: 1000px">
    <div class="logo">
        <img src="https://collagenbeauty.vn/uploads/fckfinder/pdung/images/nuoc-hoa-cao-cap/nuoc-hoa-ainn/nuoc-hoa-ainn-xanh.jpg" alt="">
    </div>
    <div class="text-center mt-4 name text-success">
        Hữu Kiên
    </div>
    <form action="{{ route('user.register.authenticate') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên đầy đủ<span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
            @error('name')
            <div class="text-danger text-left" style="font-size:14px;">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <div class="d-flex justify-content-between">
                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>

            </div>
            <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">
            @error('email')
            <div class="text-danger text-left" style="font-size:14px;">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="password" class="form-label">Mật khẩu<span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
                @error('password')
                <div class="text-danger text-left" style="font-size:14px;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-6">
                <label for="password1" class="form-label">Nhập lại mật khẩu<span class="text-danger">*</span></label>
                <input type="password" name="re-password" class="form-control" id="password1" value="{{ old('re-password') }}">
                @error('re-password')
                <div class="text-danger text-left" style="font-size:14px;">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="address" class="form-label">Địa chỉ</label>
                <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}">
                @error('address')
                <div class="text-danger text-left" style="font-size:14px;">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-6">
                <label for="phone" class="form-label">Số điện thoại<span class="text-danger">*</span></label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
                @error('phone')
                <div class="text-danger text-left" style="font-size:14px;">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <div class="d-flex justify-content-between">
                <label for="gender" class="form-label">Giới tính<span class="text-danger">*</span></label>
            </div>
            <select class="form-select" name="gender" id="gender">
                @foreach (\App\Models\User::$genderArr as $item)
                    <option value="{{$item}}" {{ (old("gender") == $item) ? 'selected' : '' }}>
                        @if($item==App\Models\User::GENDER_MALE) Nam
                        @elseif($item==App\Models\User::GENDER_FEMALE) Nữ
                        @endif
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="mb-4 btn btn-success text-white font-weght-bold" style="background-color:#00c054!important;">Đăng ký</button>
    </form>
    <div class="text-center fs-6">
        <a class="text-success" href="{{route('user.login')}}">Đăng nhập</a>
    </div>
</div>

<style>
    /* Importing fonts from Google */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    /* Reseting */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background: #ecf0f3;
    }

    .wrapper {
        max-width: 350px;
        min-height: 500px;
        margin: 80px auto;
        padding: 40px 30px 30px 30px;
        background-color: #ecf0f3;
        border-radius: 15px;
        box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
    }

    .logo {
        width: 80px;
        margin: auto;
    }

    .logo img {
        width: 100%;
        height: 80px;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: 0px 0px 3px #5f5f5f,
        0px 0px 0px 5px #ecf0f3,
        8px 8px 15px #a7aaa7,
        -8px -8px 15px #fff;
    }

    .wrapper .name {
        font-weight: 600;
        font-size: 1.4rem;
        letter-spacing: 1.3px;
        padding-left: 10px;
        color: #555;
    }

    .wrapper .form-field input {
        width: 100%;
        display: block;
        border: none;
        outline: none;
        background: none;
        font-size: 1.2rem;
        color: #666;
        padding: 10px 15px 10px 10px;
        /* border: 1px solid red; */
    }

    .wrapper .form-field {
        padding-left: 10px;
        margin-bottom: 20px;
        border-radius: 20px;
        box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
    }

    .wrapper .form-field .fas {
        color: #555;
    }

    .wrapper .btn {
        box-shadow: none;
        width: 100%;
        height: 40px;
        background-color: #03A9F4;
        color: #fff;
        border-radius: 25px;
        box-shadow: 3px 3px 3px #b1b1b1,
        -3px -3px 3px #fff;
        letter-spacing: 1.3px;
    }

    .wrapper .btn:hover {
        background-color: #039BE5;
    }

    .wrapper a {
        text-decoration: none;
        font-size: 0.8rem;
        color: #03A9F4;
    }

    .wrapper a:hover {
        color: #039BE5;
    }

    @media(max-width: 380px) {
        .wrapper {
            margin: 30px 20px;
            padding: 40px 15px 15px 15px;
        }
    }
</style>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/adminlte.min.js"></script>

<link rel="stylesheet" href="/admin/dist/js/toastr/toastr.min.js">
<script type="text/javascript" src="/admin/dist/js/toastr.js"></script>
<link media="screen" rel="stylesheet" type="text/css" href="/admin/dist/css/toastr.css"/>
@error('login')
<script>
    toastr.error("{{$message}}");
</script>
@enderror
@if(Session::has('success'))
    <script>
        toastr.success("{!! session()->get('success') !!}");
    </script>
@elseif(Session::has('error'))
    <script>
        toastr.error("{!! session()->get('error') !!}");
    </script>
@endif
</body>
</html>
