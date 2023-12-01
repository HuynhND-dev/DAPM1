@extends('client.master')

@section('content')
    <section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border">
                        <h3 class="bg-gray p-4">Đặt lại mật khẩu</h3>
                        <form action="{{ route('forget.password.post') }}" method="Post" class="form-group pb-2">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            @csrf
                            <fieldset class="p-4">
                                <input class="form-control mb-3" name="username" type="text" placeholder="Tên đăng nhập*" required>
                                @if ($errors->has('username'))
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                                <button type="submit" class="btn btn-primary font-weight-bold mt-3 form-control mb-3">Gửi email xác nhận</button>
                            </fieldset>
                            <label for="registering"  class="px-2 pb-2 mb-2 pull-right">Đăng nhập bằng mật khẩu? <a class="text-primary font-weight-bold" href="login">Đăng nhập</a></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
