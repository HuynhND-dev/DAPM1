<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Bảng điều khiển</span>
            </a>
        </li>

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">--}}
{{--                <i class="icon-grid-2 menu-icon"></i>--}}
{{--                <span class="menu-title">Tables</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="tables">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="#">Basic table</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">--}}
{{--                <i class="icon-contract menu-icon"></i>--}}
{{--                <span class="menu-title">Icons</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="icons">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="#">Mdi icons</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Quản lý thành viên</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('employer-list')}}"> Nhà tuyển dụng </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('candidate-list')}}"> Ứng viên </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('deleted-list')}}"> vô hiệu </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('statistical-index')}}">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Thống kê</span>
            </a>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">--}}
{{--                <i class="icon-ban menu-icon"></i>--}}
{{--                <span class="menu-title">Error pages</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="error">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="#"> 404 </a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="#"> 500 </a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
