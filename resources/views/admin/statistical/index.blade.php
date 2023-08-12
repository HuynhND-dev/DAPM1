@extends('admin.master')
@section('head')
    <script type="text/javascript" href="{{asset('/js/jquery_latest_jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/cdn.jsdelivr.net_momentjs_latest_moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/cdn.jsdelivr.net_bootstrap.daterangepicker_2_daterangepicker.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/cdn.jsdelivr.net_bootstrap.daterangepicker_2_daterangepicker.css')}}" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div id="user" class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <h4 class="card-title">Thống kê thành viên</h4>
                    <label for="">Chọn ngày</label>
                        <input class="form-control col-md-6" id="daterange" name="chart_user" type="text" value="">
                <canvas id="chart_user" width="735" height="367" style="display: block; height: 357px; width: 714px;" class="chartjs-render-monitor"></canvas>
                <div id="data" employer="{{$employer}}" candidate="{{$candidate}}" userDeleted="{{$userDeleted}}" revenue="{{$revenue}}"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div id="revenue" class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <h4 class="card-title">Thống kê doanh thu</h4>
                <div class="row">
                    <div class="col-md-6" style="display: none">
                        <label for="">Thống kê theo</label>
                        <select class="form-control" id="filter">
                            <option value="1">Ngày</option>
                            <option value="2">Tháng</option>
                            <option value="3">Năm</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Thời điểm</label>
                        <input class="form-control" id="daterange" name="chart_revenue" type="text" value="">
                    </div>
                </div>
                <canvas id="chart_revenue" width="735" height="367" style="display: block; height: 357px; width: 714px;" class="chartjs-render-monitor"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/daterangepicker2.1.27.js')}}"></script>
{{--    <script type="text/javascript" src="{{asset('custom/date_range.js')}}"></script>--}}
    <script type="text/javascript" src="{{asset('/vendors/chart.js/Chart.min.js')}}"></script>
{{--    <script type="text/javascript" src="{{asset('/js/chart.js')}}"></script>--}}
    <script type="text/javascript" src="{{asset('/js/jquery.signalR.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/custom/statistical_user.js')}}"></script>
    <script type="text/javascript" src="{{asset('/custom/statistical_revenue.js')}}"></script>
@endsection

