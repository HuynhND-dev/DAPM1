@extends('client.master')
@section('style')
    <style>
        .img-custom {
            width: 100%;
            height: 300px;
        }
    </style>
@endsection
@section('content')
    <!--===============================
=            Hero Area            =
================================-->

    <section class="hero-area bg-1 text-center overly">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Header Contetnt -->
                    <div class="content-block">
                        <h1>Tìm & tuyển dụng việc làm</h1>
                        <p>Tiếp cận 40,000+ tin tuyển dụng việc làm mỗi ngày từ hàng nghìn doanh nghiệp uy tín tại Việt Nam</p>
                        <div class="short-popular-category-list text-center">
                            <h2>Uy tín tạo nên sức mạnh</h2>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="category.html"><i class="fa fa-bed"></i> Hotel</a></li>
                                <li class="list-inline-item">
                                    <a href="category.html"><i class="fa fa-grav"></i> Fitness</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="category.html"><i class="fa fa-car"></i> Cars</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="category.html"><i class="fa fa-cutlery"></i> Restaurants</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="category.html"><i class="fa fa-coffee"></i> Cafe</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 col-md-12 align-content-center">
                                    <form action="/search" method="get">
                                        <div class="form-row">
                                            <div class="form-group col-xl-4 col-lg-3 col-md-6">
                                                <input type="text" name="position" class="form-control my-2 my-lg-1" id="inputtext4"
                                                       placeholder="Vị trí tuyển dụng">
                                            </div>
                                            <div class="form-group col-lg-3 col-md-6">
                                                <select class="w-100 form-control mt-lg-1 mt-md-2" name="location">
                                                    <option value="">Toàn quốc</option>
                                                    @foreach($provinces as $province)
                                                        <option value="{{$province->province_ID}}">{{$province->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3 col-md-6">
                                                <select class="w-100 form-control mt-lg-1 mt-md-2" name="salary">
                                                    <option value="">Tất cả mức lương</option>
                                                    <option value="1,3000">Dưới 3 triệu</option>
                                                    <option value="3000,5000">3 - 5 triệu</option>
                                                    <option value="5000,7000">5 - 7 triệu</option>
                                                    <option value="7000,1000">7 - 10 triệu</option>
                                                    <option value="10000,12000">10 - 12 triệu</option>
                                                    <option value="12000,15000">12 - 15 triệu</option>
                                                    <option value="15000,20000">15 - 20 triệu</option>
                                                    <option value="20000,25000">20 - 25 triệu</option>
                                                    <option value="25000,30000">25 - 30 triệu</option>
                                                    <option value="30000,99999999">Trên 30 triệu</option>
                                                    <option value="0">Thoả thuận</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-xl-2 col-lg-3 col-md-6 align-self-center">
                                                <button type="submit" class="btn btn-primary active w-100">Tìm kiếm</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>


    <!--===========================================
    =            Popular deals section            =
    ============================================-->

    <section class="popular-deals section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Công việc thịnh hành</h2>
                        <p>Được tìm kiếm nhiều nhất hiện nay</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- offer 01 -->
                <div class="col-lg-12">
                    <div class="trending-ads-slide">
                        <div class="col-sm-12 col-lg-4">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="detail/22">
                                            <img class="card-img-top img-custom" src="images/vinFast.jpg" alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="single.html">Chuyên Viên Kinh Doanh Ô Tô</a></h4>
                                        <ul class="list-inline product-meta">
                                            <li class="list-inline-item">
                                                <a href="single.html"><i class="fa fa-folder-open-o"></i>Công Ty Cổ Phần Sản Xuất & Kinh Doanh Vinfast</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="category.html"><i class="fa fa-calendar"></i>20 tháng 8</a>
                                            </li>
                                        </ul>
                                        <p class="card-text">Hà Nội</p>
                                        <div class="product-ratings">
                                            <ul class="list-inline">
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="detail/23">
                                            <img class="card-img-top img-custom" src="images/vnPay.webp" alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="single.html">Nhân Viên Thiết Kế UI/UX </a></h4>
                                        <ul class="list-inline product-meta">
                                            <li class="list-inline-item">
                                                <a href="single.html"><i class="fa fa-folder-open-o"></i>Công ty CP Giải pháp Thanh toán Việt Nam (VNPAY)</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="category.html"><i class="fa fa-calendar"></i>26 tháng 8</a>
                                            </li>
                                        </ul>
                                        <p class="card-text">TP Hồ Chí Minh</p>
                                        <div class="product-ratings">
                                            <ul class="list-inline">
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="detail/24">
                                            <img class="card-img-top img-custom" src="images/thanhHuyen.webp" alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="single.html">Content Leader</a></h4>
                                        <ul class="list-inline product-meta">
                                            <li class="list-inline-item">
                                                <a href="single.html"><i class="fa fa-folder-open-o"></i>Công Ty TNHH Đầu Tư Thương Mại Dịch Vụ Thanh Huyền</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="category.html"><i class="fa fa-calendar"></i>8 tháng 9</a>
                                            </li>
                                        </ul>
                                        <p class="card-text">Quảng Nam</p>
                                        <div class="product-ratings">
                                            <ul class="list-inline">
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="detail/21">
                                            <img class="card-img-top img-custom" src="images/vietNhan.jpg" alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="single.html">Nhân viên Content Marketing</a></h4>
                                        <ul class="list-inline product-meta">
                                            <li class="list-inline-item">
                                                <a href="single.html"><i class="fa fa-folder-open-o"></i>Công Ty Cổ Phần Bất Động Sản Bắc Ninh Việt Nhân

                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="category.html"><i class="fa fa-calendar"></i>11 tháng 8</a>
                                            </li>
                                        </ul>
                                        <p class="card-text">Bắc Ninh</p>
                                        <div class="product-ratings">
                                            <ul class="list-inline">
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--==========================================
    =            All Category Section            =
    ===========================================-->

    <section class=" section">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section title -->
                    <div class="section-title">
                        <h2>Các ngành nghề nổi bật</h2>
                        <p>Đa dạng các ngành nghề có tại Việt Nam</p>
                    </div>
                    <div class="row">
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="	fas fa-code icon-bg-1"></i>
                                    <h4>IT Phần mềm</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="category.html">Back-End <span>14093</span></a></li>
                                    <li><a href="category.html">Front-End <span>9343</span></a></li>
                                    <li><a href="category.html">Tester <span>6834</span></a></li>
                                    <li><a href="category.html">DevOpp <span>3434</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="	fa fa-money icon-bg-2"></i>
                                    <h4>Kinh doanh</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="category.html">Marketing <span>3293</span></a></li>
                                    <li><a href="category.html">TeleSell <span>2331</span></a></li>
                                    <li><a href="category.html">Sales Logistics <span>1232</span></a></li>
                                    <li><a href="category.html">Trợ lý kinh doanh<span>746</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fas fa-user-graduate icon-bg-3"></i>
                                    <h4>Giáo dục</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="category.html">Tư vấn tuyển sinh <span>493</span></a></li>
                                    <li><a href="category.html">Giảng viên <span>323</span></a></li>
                                    <li><a href="category.html">Kiểm soát chất lượng <span>83</span></a></li>
                                    <li><a href="category.html">Quản lý khoá học <span>33</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="	far fa-comment-dots icon-bg-4"></i>
                                    <h4>Tư vấn</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="category.html">Nhập liệu <span>53</span></a></li>
                                    <li><a href="category.html">Tư vấn tài chính <span>212</span></a></li>
                                    <li><a href="category.html">Chăm sóc nhà bán hàng <span>133</span></a></li>
                                    <li><a href="category.html">Tư vấn khoá học <span>143</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fas fa-shipping-fast icon-bg-5"></i>
                                    <h4>Vận tải</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="category.html">Chứng từ <span>93</span></a></li>
                                    <li><a href="category.html">Nhân viên Kho <span>233</span></a></li>
                                    <li><a href="category.html">Shiper <span>3183</span></a></li>
                                    <li><a href="category.html">Điều phối <span>343</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-calculator icon-bg-6"></i>
                                    <h4>Kiểm toán</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="category.html">Kế toán tổng hợp <span>193</span></a></li>
                                    <li><a href="category.html">Kế toán trưởng <span>23</span></a></li>
                                    <li><a href="category.html">Kế toán khó <span>33</span></a></li>
                                    <li><a href="category.html">Kết toán <span>73</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                            <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-shopping-bag icon-bg-7"></i>
                                    <h4>Hành chính</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="category.html">Trưởng phòng hành chính <span>65</span></a></li>
                                    <li><a href="category.html">Tư vấn Data <span>23</span></a></li>
                                    <li><a href="category.html">Chăm sóc khách hàng <span>113</span></a></li>
                                    <li><a href="category.html">Trợ lý giám đốc <span>43</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                            <div class="category-block">

                                <div class="header">
                                    <i class="fa fa-handshake-o icon-bg-8"></i>
                                    <h4>Dịch vụ</h4>
                                </div>
                                <ul class="category-list">
                                    <li><a href="category.html">Cleaning <span>93</span></a></li>
                                    <li><a href="category.html">Car Washing <span>233</span></a></li>
                                    <li><a href="category.html">Clothing <span>183</span></a></li>
                                    <li><a href="category.html">Business <span>343</span></a></li>
                                </ul>
                            </div>
                        </div> <!-- /Category List -->


                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>


    <!--====================================
    =            Call to Action            =
    =====================================-->

{{--    <section class="call-to-action overly bg-3 section-sm">--}}
{{--        <!-- Container Start -->--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-md-center text-center">--}}
{{--                <div class="col-md-8">--}}
{{--                    <div class="content-holder">--}}
{{--                        <h2>Start today to get more exposure and--}}
{{--                            grow your business</h2>--}}
{{--                        <ul class="list-inline mt-30">--}}
{{--                            <li class="list-inline-item"><a class="btn btn-main" href="ad-listing.html">Add Listing</a></li>--}}
{{--                            <li class="list-inline-item"><a class="btn btn-secondary" href="category.html">Browser Listing</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- Container End -->--}}
{{--    </section>--}}
@endsection
