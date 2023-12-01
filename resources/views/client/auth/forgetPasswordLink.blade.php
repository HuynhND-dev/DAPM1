@extends('client.master')

@section('content')
    <section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border">
                        <h3 class="bg-gray p-4">Đặt lại mật khẩu</h3>
                        <form action="{{ route('reset.password.post') }}" method="Post" class="form-group pb-2">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            @csrf
                            <fieldset class="p-4">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Mật khẩu*" required autofocus>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu*" required autofocus>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary font-weight-bold mt-3 form-control mb-3">Đặt lại mật khẩu</button>
                            </fieldset>
                            <label for="registering"  class="px-2 pb-2 mb-2 pull-right">Đăng nhập bằng mật khẩu? <a class="text-primary font-weight-bold" href="login">Đăng nhập</a></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
