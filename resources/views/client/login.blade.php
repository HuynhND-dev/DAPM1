@extends('client.master')
@section('content')
<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
               @include('admin.alert')
                <div class="border">
                    <h3 class="bg-gray p-4">Đăng nhập</h3>
                    <form action="/login" method="Post" class="form-group pb-2">
                        @csrf
                        <fieldset class="p-4">
                            <input class="form-control mb-3" name="username" type="text" placeholder="Tên đăng nhập" required>
                            <input class="form-control mb-3" name="password" type="password" placeholder="Mật khẩu" required>
                            <button type="submit" class="btn btn-primary font-weight-bold mt-3 form-control mb-3">Đăng nhập</button>
                            <a class="mt-3 d-block text-primary" href="{{route('forget.password.get')}}">Quên mật khẩu?</a>

                        </fieldset>
                        <label for="registering"  class="px-2 pb-2 mb-2 pull-right">Chưa có tài khoản? <a class="text-primary font-weight-bold" href="register">Đăng ký</a></label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
