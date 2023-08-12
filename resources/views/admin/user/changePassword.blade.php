
@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Chỉnh sửa thành viên</h4>
                    <form class="forms-sample" method="POST" action="{{route('update-password')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" value="{{$user->user_ID}}" name="user_ID">
                            <div class="form-group col-md-3">
                                <label for="password">Tên đăng nhập</label>
                                <input type="text" value="{{$user->username}}" class="form-control" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="password">Mật khẩu</label>
                                <input type="password" minlength="6" class="form-control" name="password" id="password" placeholder="Mật khẩu" required>
                            </div>


                            <div class="form-group col-md-3">
                                <label for="ConfirmPassword">Nhập lại</label>
                                <input type="password" name="password_confirmation" minlength="6" class="form-control" id="ConfirmPassword" placeholder="Mật khẩu" required>
                                <div id="CheckPasswordMatch"></div>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary mr-2 float-right">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $("#ConfirmPassword").on('keyup', function(){
            var password = $("#password").val();
            var confirmPassword = $("#ConfirmPassword").val();
            if (password != confirmPassword)
                $("#CheckPasswordMatch").html("nhập lại không chính xác !").css("color","red");
            else
                $("#CheckPasswordMatch").html("").css("color","green");
        });
    </script>
@endsection
