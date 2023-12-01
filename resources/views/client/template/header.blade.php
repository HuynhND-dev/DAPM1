<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light navigation">
                    <a class="navbar-brand" href="/">
                        <img src="{{asset('/images/logo.png')}}" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto main-nav ">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item dropdown dropdown-slide @@dashboard">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#!">Thông tin thêm<span><i class="fa fa-angle-down"></i></span>
                                </a>

                                <!-- Dropdown list -->
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item @@dashboardPage" href="dashboard.html">Dashboard</a></li>
                                    <li><a class="dropdown-item @@dashboardMyAds" href="dashboard-my-ads.html">Dashboard My Ads</a></li>
                                    <li><a class="dropdown-item @@dashboardFavouriteAds" href="dashboard-favourite-ads.html">Dashboard Favourite Ads</a></li>
                                    <li><a class="dropdown-item @@das git remote add origin git@github.com:<username>/demo_app.githboardArchivedAds" href="dashboard-archived-ads.html">Dashboard Archived Ads</a></li>
                                    <li><a class="dropdown-item @@dashboardPendingAds" href="dashboard-pending-ads.html">Dashboard Pending Ads</a></li>

                                    <li class="dropdown dropdown-submenu dropright">
                                        <a class="dropdown-item dropdown-toggle" href="#" id="dropdown0501" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdown0501">
                                            <li><a class="dropdown-item" href="master.blade.php">Submenu 01</a></li>
                                            <li><a class="dropdown-item" href="master.blade.php">Submenu 02</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown dropdown-slide @@pages">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ABC <span><i class="fa fa-angle-down"></i></span>
                                </a>
                                <!-- Dropdown list -->
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item @@about" href="about-us.html">About Us</a></li>
                                    <li><a class="dropdown-item @@contact" href="contact-us.html">Contact Us</a></li>
                                    <li><a class="dropdown-item @@singleBlog" href="single-blog.html">Blog Details</a></li>
                                    <li><a class="dropdown-item @@terms" href="terms-condition.html">Terms &amp; Conditions</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown dropdown-slide @@listing">
                                <a class="nav-link dropdown-toggle" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Listing <span><i class="fa fa-angle-down"></i></span>
                                </a>
                                <!-- Dropdown list -->
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item @@category" href="category.html">Ad-Gird View</a></li>
                                    <li><a class="dropdown-item @@listView" href="ad-list-view.html">Ad-List View</a></li>

                                    <li class="dropdown dropdown-submenu dropleft">
                                        <a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0201" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdown0201">
                                            <li><a class="dropdown-item" href="master.blade.php">Submenu 01</a></li>
                                            <li><a class="dropdown-item" href="master.blade.php">Submenu 02</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        @if(\Illuminate\Support\Facades\Auth::user())
                            <ul class="navbar-nav navbar-nav-right">
                                <li class="">
                                    <img src="{{asset("/images/")}}/{{\Illuminate\Support\Facades\Auth::user()->avata}}" style="width: 40px" class="rounded-circle" alt="profile"/>
                                </li>
                                <li>

                                <li class="nav-item dropdown dropdown-slide @@listing">
                                    <a class="nav-link dropdown-toggle" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{\Illuminate\Support\Facades\Auth::user()->name}} <span></span>
                                    </a>
                                    <!-- Dropdown list -->
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item @@category" href="">Thông tin các nhân</a></li>
                                        <li><a class="dropdown-item @@listView" href="">Đơn ứng tuyển</a></li>
                                        <li><a class="dropdown-item @@listView" href="{{route('logout')}}">Đăng xuất</a></li>
                                    </ul>
                                </li>
                                </li>
                            </ul>
                        @else
                        <ul class="navbar-nav ml-auto mt-10">
                            <li class="nav-item">
                                <a class="nav-link login-button" href="{{route('register')}}">Đăng ký</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white add-button" href="{{route('login')}}">Đăng nhập</a>
                            </li>
                        </ul>
                        @endif
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
