@extends('admin.master')
@section('head')


<link rel="stylesheet" href="{{asset('/css/cdnjs.cloudflare.com_ajax_libs_bootstrap-select_1.13.1_css_bootstrap-select.css')}}">
<script type="text/javascript" src="{{asset('/js/ajax.googleapis.com_ajax_libs_jquery_3.5.1_jquery.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('/custom/multiple_select.css')}}">


    <link rel="stylesheet" href="{{asset('css/bootstrap-multiselect.min.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-multiselect.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/bootstrap-multiselect.css')}}">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('/css/virtual-select.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/unpkg.com_multiple-select@1.6.0_dist_multiple-select.min.css')}}">
<script src="{{asset('/js/virtual-select.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('/custom/multiple_select.css')}}">
@endsection
@section('content')


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Chỉnh sửa thành viên</h4>
                    <form class="forms-sample" method="POST" action="{{route('update-user')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_ID" value="{{$user->user_ID}}">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" disabled value="{{$user->username}}" name="username" placeholder="Username" required>
                                <div id="check_username"></div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="province">Tỉnh/Thành</label>
                                <select class="form-control form-control-md" district="" ward="{{$address[0]->ward}}" id="province" required>
                                    <option value="">-- Chọn tỉnh/thành --</option>
                                    @foreach($provinces as $province)
                                        <option {{$address[0]->province == $province->province_ID ? 'selected' : ''}} value="{{$province->province_ID}}">{{$province->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="category">Ngành nghề</label>
                                <select id="category" name="category[]" class="multiple_select" title="Ngành nghề"  multiple data-live-search="true" placeholder="Ngành nghề">
                                    @foreach($allCategories as $category)
                                        @if(!empty($categories))
                                                <option
                                                    @foreach($categories as $selected)
                                                    {{$category->category_ID == $selected->category_ID ? 'selected': ''}}
                                                    @endforeach
                                                    value="{{$category->category_ID}}">{{$category->name}}
                                                </option>
                                        @else
                                            <option value="{{$category->category_ID}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-1">
                                <label for="exampleInputPassword3">Khác</label>
                                <input type="text" class="form-control" id="exampleInputPassword3" name="newCategory" placeholder="Ngành nghề">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="language">Ngoại ngữ</label>
                                <select id="language" name="language[]" class="multiple_select" title="Ngoại ngữ" multiple data-live-search="true" placeholder="Ngoại ngữ">
                                    @foreach($allLanguages as $language)
                                        @if(!empty($lang))
                                                <optgroup label="{{$language->name}}">
                                                    @foreach($allCertificates as $certificate)
                                                        @if($certificate->parent_ID == $language->language_ID)
                                                            <option
                                                                @foreach($lang as $selected)
                                                                {{$certificate->language_ID == $selected->language_ID ? 'selected' : ''}}
                                                                @endforeach
                                                                value="{{$certificate->language_ID}}">{{$certificate->name}}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </optgroup>
                                        @else
                                            <optgroup label="{{$language->name}}">
                                                @foreach($allCertificates as $certificate)
                                                    @if($certificate->parent_ID == $language->language_ID)
                                                        <option value="{{$certificate->language_ID}}">{{$certificate->name}}</option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="name">Họ Tên</label>
                                <input type="text" class="form-control" max="15" id="name" value="{{$user->name}}" name="name" placeholder="Họ tên" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="district">Quận/Huyện</label>
                                <select class="form-control form-control-md" id="district" required>
                                    @foreach($districts as $value)
                                        <option {{$address[0]->district == $value->district_id ? 'selected' : ''}} value="{{$value->district_id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="skill">Kỹ năng</label>

                                <select id="skill" name="skill[]" class="multiple_select" title="Kỹ năng" multiple data-live-search="true" placeholder="Kỹ năng">
                                    @foreach($allSkills as $skill)
                                        @if(!empty($skills))

                                                <option
                                                    @foreach($skills as $selected)
                                                    {{$selected->skill_ID == $skill->skill_ID ? 'selected' : ''}}
                                                    @endforeach
                                                    value="{{$skill->skill_ID}}">{{$skill->name}}
                                                </option>
                                        @else
                                            <option value="{{$skill->skill_ID}}">{{$skill->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-1">
                                <label for="newSkill">Khác</label>
                                <input type="text" class="form-control" id="newSkill" name="newSkill" placeholder="Kỹ năng">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="experience">Số dư</label>
                                <input type="number" min="0" step="1" value="{{$user->balance}}" class="form-control" id="balance" name="balance" placeholder="Số dư (VND)">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" value="{{$user->email}}" name="email" placeholder="Email" required>
                                <div id="check_email"></div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ward">Phường/Xã</label>
                                <select class="form-control form-control-md" id="ward" name="ward_ID" required>
                                    @foreach($wards as $value)
                                        <option {{$address[0]->ward == $value->ward_ID ? 'selected' : ''}} value="{{$value->ward_ID}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="experience">Kinh ngiệm</label>
                                <input type="number" min="0" max="60" step="1" class="form-control" value="{{$user->experience}}" id="experience" name="experience" placeholder="Kinh ngiệm (năm)" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="role">Vai trò</label>
                                <select class="form-control form-control-md" name="role_ID" id="role" required>
                                    <option value="">-- Chọn vai trò --</option>

                                    @foreach($allRoles as $role)
                                        <option {{$user->role_ID == $role->role_ID ? 'selected' : ''}} value="{{$role->role_ID}}">{{$role->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="phone">Số điện thoại</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+84</span>
                                    </div>
                                    <input type="number" minlength="10" class="form-control" max="999999999999999" value="{{$user->phone}}" id="phone" name="phone" placeholder="Số điện thoại" required>
                                </div>
                                <div id="check_phone"></div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="name">Đường, số nhà</label>
                                <input type="text" class="form-control" max="15" id="address" value="{{$user->address}}" name="address" placeholder="Địa chỉ cụ thể" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Giới tính</label>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label" for="gender">
                                                <input type="radio" {{$user->gender == 1 ? 'checked' : ''}} class="form-check-input" name="gender" value="1" required>
                                                Nam
                                                <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" {{$user->gender == 2 ? 'checked' : ''}} class="form-check-input" name="gender" value="2" required>
                                                Nữ
                                                <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Ảnh đại diện</label>
                                <input type="file" name="avata" accept="image/*" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Tải lên ảnh đại diện" required>
                                    <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-outline-primary" type="button"><i class="ti-upload btn-icon-prepend"></i> Tải lên</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <a href="/admin/user/change-password/{{$user->user_ID}}" class="btn btn-info mr-2 float-left">Đổi mật khẩu</a>
                            <button type="submit" class="btn btn-primary mr-2 float-right">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('/js/stackpath.bootstrapcdn.com_bootstrap_4.1.1_js_bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/cdnjs.cloudflare.com_ajax_libs_bootstrap-select_1.13.1_js_bootstrap-select.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('/js/file-upload.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/typeahead.js')}}"></script>
    <script type="text/javascript" src="{{asset('/custom/multiple_select.js')}}"></script>
    <script type="text/javascript" src="{{asset('/custom/ajax_address.js')}}"></script>
    <script type="text/javascript" src="{{asset('/custom/ajax_certificate.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var tokens = $("#token").attr("content");
            $("#username").on('keyup', function (){
                var username = this.value;
                console.log(username);
                $.ajax({
                    url: "/get-username",
                    type: "POST",
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
                        url: "/get-phone",
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
                        url: "/get-email",
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
                var confirmPassword = $("#ConfirmPassword").val();
                if (password != confirmPassword)
                    $("#CheckPasswordMatch").html("nhập lại không chính xác !").css("color","red");
                else
                    $("#CheckPasswordMatch").html("").css("color","green");
            });
        });

    </script>
@endsection
