<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.template.head')
    @yield('head')
</head>
<body>
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
@include('admin.template.navbar')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
    @include('admin.template.sidebar')
    <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @include('admin.alert')
                @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
        @include('admin.template.footer')
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
@include('admin.template.script')
@yield('script')
</body>
</html>
