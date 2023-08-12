@extends('admin.master')
@section('head')
    <link rel="stylesheet" href="{{asset('/css/cdn.datatables.net_1.13.4_css_dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/cdnjs.cloudflare.com_ajax_libs_twitter-bootstrap_5.3.0-alpha3_css_bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/custom/data_table.js')}}">

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách {{$role}}</h4>
                    <p class="card-description">
                        <a href="{{route('create-user')}}" class="btn btn-outline-primary m-3 float-right">Thêm mới</a>
{{--                        <a href="{{ route('deleted-list') }}" class="btn btn-outline-danger m-3 float-right">Thành viên bị vô hiệu hoá</a>--}}
                    </p>
                    <div class="table-responsive pt-3">
                        <table id="table-user" class="table table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>Tên người dùng</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    @if(isset($user->delete_at))
                                    <td>đã khoá</td>
                                    @else
                                        <td>hoạt động</td>
                                    @endif
                                    <td>
                                        <?php
                                        $date = $user->create_at;
                                        $dateTime = new DateTime($date);
                                        $formattedDateTime = $dateTime->format('H:i d/m/Y');
                                        echo $formattedDateTime;
                                        ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-info btn-sm">Chi tiết</button>
                                        <a href="edit/{{$user->user_ID}}" class="btn btn-outline-primary btn-sm">Chỉnh sửa</a>
                                        <button type="button" id="user_disable" value="{{$user->user_ID}}" class="btn btn-outline-danger btn-sm userDisable">Xoá</button>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="toast-container position-fixed bottom-0 end-0 p-3">

                            <div  id="success" class="toast align-items-center opacity-50 text-bg-success border-opacity-10" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="d-flex">
                                    <div class="toast-body">
                                        Thao tác thành công!
                                    </div>
                                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                            </div>

                    </div>

                </div>
            </div>
        </div>




    </div>
@endsection
@section('script')
    <script src="{{asset('/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('/custom/data_table.js')}}"></script>
    <script src="{{asset('/js/cdn.jsdelivr.net_npm_bootstrap@5.2.3_dist_js_bootstrap.bundle.min.js')}}" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="{{asset('/custom/ajax_disable.js')}}"></script>

@endsection
