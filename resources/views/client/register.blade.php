@extends('client.master')
@section('head')
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    @include('admin.alert')
                    <div class="border border">
                        <h3 class="bg-gray p-4">Đăng ký</h3>
                        <form action="/register" method="post" class="form-group pb-2">
                            @csrf
                            <fieldset class="p-4">
                                <input class="form-control mb-3" id="username" name="username" type="text" placeholder="Tên đăng nhập*" required>
                                <div id="check_username">
                                    @if ($errors->has('username'))
                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                <input class="form-control mb-3" id="password" name="password" type="password" placeholder="Mật khẩu*" required>
                                <input class="form-control mb-3" id="ConfirmPassword" name="password_confirmation" type="password" placeholder="Xác nhận mật khẩu*" required>
                                <div id="CheckPasswordMatch">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <input class="form-control mb-3" name="name" type="text" placeholder="Họ tên*" required>
                                <input class="form-control mb-3" id="email" name="email" type="email" placeholder="Email*" required>
                                <div id="check_email">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <input class="form-control mb-3" id="phone" name="phone" type="text" placeholder="Số điện thoại*" required>
                                <div id="check_phone">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="loggedin-forgot d-inline-flex ">
                                    <input type="checkbox" id="registering" class="" required>
                                    <label for="registering" class="px-2 mt-2">Đồng ý tất cả <a class="text-primary font-weight-bold" href="#">điểu khoản</a></label>
                                </div>

                                <button type="submit" class="btn btn-primary font-weight-bold mt-3 form-control mb-3">Đăng ký</button>
                            </fieldset>
                            <label for="registering"  class="px-2 pb-4 mb-4 pull-right">Đã có tài khoản? <a class="text-primary font-weight-bold" href="login">Đăng nhập</a></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            var tokens = $("#token").attr("content");
            $("#username").on('keyup', function (){
                var username = this.value;
                $.ajax({
                    url: "/get-username",
                    type: "post",
                    data: {
                        username: username,
                        _token: tokens,
                    },
                    dataType: 'json',
                    success: function (result) {
                        if(result)
                            $('#check_username').html('Tên đăng nhập đã tồn tại').css("color","red");
                        else
                            $('#check_username').html('').css("color","red");
                    },
                    error: function (xhr) {
                        console.log('ajax error');

                    }
                });
            });
            $(document).ready(function () {
                var tokens = $("#token").attr("content");
                $("#phone").on('keyup', function () {
                    var phone = this.value;
                    $.ajax({
                        url: "get-phone",
                        type: "POST",
                        data: {
                            phone: phone,
                            _token: tokens,
                        },
                        dataType: 'json',
                        success: function (result) {
                            if (result)
                                $('#check_phone').html('Số điện đã tồn tại').css("color", "red");
                            else
                                $('#check_phone').html('').css("color", "red");
                        },
                        error: function (xhr) {
                            console.log('ajax error');

                        }
                    });
                });
            });

            $(document).ready(function () {
                var tokens = $("#token").attr("content");
                $("#email").on('keyup', function () {
                    var email = this.value;
                    $.ajax({
                        url: "get-email",
                        type: "POST",
                        data: {
                            email: email,
                            _token: tokens,
                        },
                        dataType: 'json',
                        success: function (result) {
                            if (result)
                                $('#check_email').html('Email đã tồn tại').css("color", "red");
                            else
                                $('#check_email').html('').css("color", "red");
                        },
                        error: function (xhr) {
                            console.log('ajax error');

                        }
                    });
                });
            });
            $("#ConfirmPassword").on('keyup', function(){
                var password = $("#password").val();
                console.log(password)
                var confirmPassword = $("#ConfirmPassword").val();
                if (password != confirmPassword)
                    $("#CheckPasswordMatch").html("nhập lại không chính xác !").css("color","red");
                else
                    $("#CheckPasswordMatch").html("").css("color","green");
            });
        });
    </script>
@endsection
