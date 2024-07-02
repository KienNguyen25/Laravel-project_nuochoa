@extends('admin.auth.auth_layouts')
@section('content')
    <div class="card-body login-card-body">
        <h2 class="text-success text-center">Nước hoa Hữu Kiên</h2>
        <p class="login-box-msg">Đăng nhập để bắt đầu làm việc</p>

        <form action="{{route('admin.login.authenticate')}}" method="post">
            @csrf

                <div>
                    <div class="input-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                <div class="input__err">
                    <div>{{ $message }}</div>
                </div>
                @enderror
            </div>

                <div>
                    <div class="input-group mt-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                <div class="input__err">
                    <div>{{ $message }}</div>
                </div>
                @enderror
            </div>
            <div class="row mt-3">
                <div class="col-8">
{{--                    <div class="icheck-primary">--}}
{{--                        <input type="checkbox" id="remember">--}}
{{--                        <label for="remember">--}}
{{--                            Remember Me--}}
{{--                        </label>--}}
{{--                    </div>--}}
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button style="width: 99px" type="submit" class="btn btn-success btn-block">Đăng nhập</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

{{--        <div class="social-auth-links text-center mb-3">--}}
{{--            <p>- OR -</p>--}}
{{--            <a href="#" class="btn btn-block btn-primary">--}}
{{--                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook--}}
{{--            </a>--}}
{{--            <a href="#" class="btn btn-block btn-danger">--}}
{{--                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+--}}
{{--            </a>--}}
{{--        </div>--}}
        <!-- /.social-auth-links -->

{{--        <p class="mb-1">--}}
{{--            <a href="forgot-password.html">I forgot my password</a>--}}
{{--        </p>--}}
{{--        <p class="mb-0">--}}
{{--            <a href="register.html" class="text-center">Register a new membership</a>--}}
{{--        </p>--}}
    </div>
    <style>
        .input__err{
            color: red;
            display: block;
        }
    </style>
    <!-- /.login-card-body -->
@endsection
@section('js')
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
@endsection
