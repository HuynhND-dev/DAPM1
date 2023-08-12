@extends('client.master')
@section('content')
    <section class="page-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 col-md-12 align-content-center">
                                    <form action="/search" method="get">
                                        <div class="form-row">
                                            <div class="form-group col-xl-4 col-lg-3 col-md-6">
                                                @if($reply->position)
                                                <input type="text" name="position" value="{{$reply->position}}" class="form-control my-2 my-lg-1" id="inputtext4"
                                                       placeholder="Vị trí tuyển dụng">
                                                @else
                                                    <input type="text" name="position" value="" class="form-control my-2 my-lg-1" id="inputtext4"
                                                           placeholder="Vị trí tuyển dụng">
                                                @endif
                                            </div>
                                            <div class="form-group col-lg-3 col-md-6">
                                                <select class="w-100 form-control mt-lg-1 mt-md-2" name="location">
                                                    <option value="">Toàn quốc</option>
                                                        @foreach($provinces as $province)
                                                            @if($reply->location)
                                                                @if($province->province_ID == $reply->location)
                                                                    <option selected value="{{$province->province_ID}}">{{$province->name}}</option>
                                                                @else
                                                                    <option value="{{$province->province_ID}}">{{$province->name}}</option>
                                                                @endif
                                                            @else
                                                                <option value="{{$province->province_ID}}">{{$province->name}}</option>
                                                            @endif
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3 col-md-6">
                                                <select class="w-100 form-control mt-lg-1 mt-md-2" name="salary">
                                                    <option {{$reply->salary == '' ? 'selected' : ''}} value="">Tất cả mức lương</option>
                                                    <option {{$reply->salary == '0,3000000' ? 'selected' : ''}} value="0,3000">Dưới 3 triệu</option>
                                                    <option {{$reply->salary == '3000000,5000000' ? 'selected' : ''}} value="3000,5000">3 - 5 triệu</option>
                                                    <option {{$reply->salary == '5000000,7000000' ? 'selected' : ''}} value="5000,7000">5 - 7 triệu</option>
                                                    <option {{$reply->salary == '7000000,1000000' ? 'selected' : ''}} value="7000,1000">7 - 10 triệu</option>
                                                    <option {{$reply->salary == '10000000,12000000' ? 'selected' : ''}} value="10000,12000">10 - 12 triệu</option>
                                                    <option {{$reply->salary == '12000000,15000000' ? 'selected' : ''}} value="12000,15000">12 - 15 triệu</option>
                                                    <option {{$reply->salary == '15000000,20000000' ? 'selected' : ''}} value="15000,20000">15 - 20 triệu</option>
                                                    <option {{$reply->salary == '20000000,25000000' ? 'selected' : ''}} value="20000,25000">20 - 25 triệu</option>
                                                    <option {{$reply->salary == '25000000,30000000' ? 'selected' : ''}} value="25000,30000">25 - 30 triệu</option>
                                                    <option {{$reply->salary == '30000000,9999999999' ? 'selected' : ''}} value="30000,9999999999">Trên 30 triệu</option>
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
    </section>
    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-result bg-gray">
                        @if($reply->position)
                            <h2>Kết quả tìm kiếm cho "{{$reply->position}}"</h2>
                        @else
                            <h2>Các công việc thịnh hành</h2>
                        @endif
                        <p>123 Results on 12 December, 2017</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="category-sidebar">
                        <form action="">
                        <div class="widget filter">
                            <h4 class="widget-header">Ngành nghề</h4>
                            <select id="field" name="field" class="multiple_select" title="Ngành nghề" multiple data-live-search="true" placeholder="Ngành nghề">
                                <option selected value="">Tất cả ngành nghề</option>
                                @foreach($fields as $field)
                                <option value="{{$field->field_ID}}">{{$field->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="widget filter">
                            <h4 class="widget-header">Trình độ</h4>
                            <select id="level" name="level" class="multiple_select" title="Trình độ" multiple data-live-search="true" placeholder="Trình độ">
                                <option selected value="">Tất cả trình độ</option>
                                @foreach($levels as $level)
                                    <option value="{{$level->level_ID}}">{{$level->name}}</option>
                                    @endforeach

                            </select>
                        </div>
                        <div class="widget filter">
                            <h4 class="widget-header">Giới tính</h4>
                            <select id="gender" name="gender" class="multiple_select" title="Giới tính" multiple data-live-search="true" placeholder="Giới tính">
                                <option selected value="">Tất cả giới tính</option>
                                <option value="0">Không yêu cầu</option>
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                            </select>
                        </div>
                        <div class="widget filter">
                            <h4 class="widget-header">Kinh nghiệm</h4>
                            <select id="gender" name="experience" class="multiple_select" title="Giới tính" multiple data-live-search="true" placeholder="Giới tính">
                                <option selected value="">Tất cả kinh nghiệm</option>
                                <option value="0">Không yêu cầu</option>
                                <option value="1">1 năm</option>
                                <option value="3">3 năm</option>
                                <option value="4">4 năm</option>
                                <option value="5">5 năm</option>
                                <option value="6">Trên 5 năm</option>
                            </select>
                        </div>

                        <div class="widget price-range w-100">
                            <h4 class="widget-header">Mức lương</h4>
                            <div class="block">
                                <input class="range-track w-100" name="salary" type="text" data-slider-min="0" data-slider-max="50000" data-slider-step="100"
                                       data-slider-value="[0,50000000]">
                                <div class="d-flex justify-content-between mt-2">
                                    <span class="value">0(k) - 50000(k)</span>
                                </div>
                            </div>
                        </div>
                            <input type="hidden" name="position" value="{{$reply->position}}">
                            <input type="hidden" name="location" value="{{$reply->location}}">
                        <button class="btn btn-main-sm btn-outline-primary pull-right" name="filter" value="1" type="submit">Lọc</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8">
{{--                    <div class="category-search-filter">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-6 text-center text-md-left">--}}
{{--                                <strong>Short</strong>--}}
{{--                                <select>--}}
{{--                                    <option>Most Recent</option>--}}
{{--                                    <option value="1">Most Popular</option>--}}
{{--                                    <option value="2">Lowest Price</option>--}}
{{--                                    <option value="4">Highest Price</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 text-center text-md-right mt-2 mt-md-0">--}}
{{--                                <div class="view">--}}
{{--                                    <strong>Views</strong>--}}
{{--                                    <ul class="list-inline view-switcher">--}}
{{--                                        <li class="list-inline-item">--}}
{{--                                            <a href="category.html"><i class="fa fa-th-large"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li class="list-inline-item">--}}
{{--                                            <a href="category.html" class="text-info"><i class="fa fa-reorder"></i></a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    @foreach($applications as $application)
                    <!-- ad listing list  -->
                    <div class="ad-listing-list mt-20">
                        <div class="row p-lg-3 p-sm-5 p-4">
                            <div class="col-lg-4 align-self-center">
                                <a href="detail/{{$application->application_ID}}">
                                    <img src="/images/{{$application->image}}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6 col-md-10">
                                        <div class="ad-listing-content">
                                            <div>
                                                <a href="single.html" class="font-weight-bold">{{$application->name}}</a>
                                            </div>
                                            <ul class="list-inline mt-2 mb-3">
                                                <li class="list-inline-item"><a href="category.html"> <i class="fa fa-folder-open-o"></i>{{$application->category}}</a></li>
                                                <li class="list-inline-item"><a href="category.htm"><i class="fa fa-calendar"></i>{{$application->deadline}}</a></li>
                                            </ul>
                                            <p class="pr-5">{{$application->district}} - {{$application->province}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 align-self-center">
                                        <div class="product-ratings float-lg-right pb-3">
                                            {{number_format($application->salary_from)}} - {{number_format($application->salary_to)}} (VND)
{{--                                            <ul class="list-inline">--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                            </ul>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach

{{--                    <div class="ad-listing-list mt-20">--}}
{{--                        <div class="row p-lg-3 p-sm-5 p-4">--}}
{{--                            <div class="col-lg-4 align-self-center">--}}
{{--                                <a href="single.html">--}}
{{--                                    <img src="images/products/products-2.jpg" class="img-fluid" alt="">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-8">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6 col-md-10">--}}
{{--                                        <div class="ad-listing-content">--}}
{{--                                            <div>--}}
{{--                                                <a href="single.html" class="font-weight-bold">Study Table Combo</a>--}}
{{--                                            </div>--}}
{{--                                            <ul class="list-inline mt-2 mb-3">--}}
{{--                                                <li class="list-inline-item"><a href="category.html"> <i class="fa fa-folder-open-o"></i> Electronics</a></li>--}}
{{--                                                <li class="list-inline-item"><a href="category.htm"><i class="fa fa-calendar"></i>26th December</a></li>--}}
{{--                                            </ul>--}}
{{--                                            <p class="pr-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6 align-self-center">--}}
{{--                                        <div class="product-ratings float-lg-right pb-3">--}}
{{--                                            <ul class="list-inline">--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="ad-listing-list mt-20">--}}
{{--                        <div class="row p-lg-3 p-sm-5 p-4">--}}
{{--                            <div class="col-lg-4 align-self-center">--}}
{{--                                <a href="single.html">--}}
{{--                                    <img src="images/products/products-3.jpg" class="img-fluid" alt="">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-8">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6 col-md-10">--}}
{{--                                        <div class="ad-listing-content">--}}
{{--                                            <div>--}}
{{--                                                <a href="single.html" class="font-weight-bold">11inch Macbook Air</a>--}}
{{--                                            </div>--}}
{{--                                            <ul class="list-inline mt-2 mb-3">--}}
{{--                                                <li class="list-inline-item"><a href="category.html"> <i class="fa fa-folder-open-o"></i> Electronics</a></li>--}}
{{--                                                <li class="list-inline-item"><a href="category.htm"><i class="fa fa-calendar"></i>26th December</a></li>--}}
{{--                                            </ul>--}}
{{--                                            <p class="pr-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6 align-self-center">--}}
{{--                                        <div class="product-ratings float-lg-right pb-3">--}}
{{--                                            <ul class="list-inline">--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="ad-listing-list mt-20">--}}
{{--                        <div class="row p-lg-3 p-sm-5 p-4">--}}
{{--                            <div class="col-lg-4 align-self-center">--}}
{{--                                <a href="single.html">--}}
{{--                                    <img src="images/products/products-4.jpg" class="img-fluid" alt="">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-8">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6 col-md-10">--}}
{{--                                        <div class="ad-listing-content">--}}
{{--                                            <div>--}}
{{--                                                <a href="single.html" class="font-weight-bold">Study Table Combo</a>--}}
{{--                                            </div>--}}
{{--                                            <ul class="list-inline mt-2 mb-3">--}}
{{--                                                <li class="list-inline-item"><a href="category.html"> <i class="fa fa-folder-open-o"></i> Electronics</a></li>--}}
{{--                                                <li class="list-inline-item"><a href="category.htm"><i class="fa fa-calendar"></i>26th December</a></li>--}}
{{--                                            </ul>--}}
{{--                                            <p class="pr-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6 align-self-center">--}}
{{--                                        <div class="product-ratings float-lg-right pb-3">--}}
{{--                                            <ul class="list-inline">--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="ad-listing-list mt-20">--}}
{{--                        <div class="row p-lg-3 p-sm-5 p-4">--}}
{{--                            <div class="col-lg-4 align-self-center">--}}
{{--                                <a href="single.html">--}}
{{--                                    <img src="images/products/products-1.jpg" class="img-fluid" alt="">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-8">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6 col-md-10">--}}
{{--                                        <div class="ad-listing-content">--}}
{{--                                            <div>--}}
{{--                                                <a href="single.html" class="font-weight-bold">11inch Macbook Air</a>--}}
{{--                                            </div>--}}
{{--                                            <ul class="list-inline mt-2 mb-3">--}}
{{--                                                <li class="list-inline-item"><a href="category.html"> <i class="fa fa-folder-open-o"></i> Electronics</a></li>--}}
{{--                                                <li class="list-inline-item"><a href="category.htm"><i class="fa fa-calendar"></i>26th December</a></li>--}}
{{--                                            </ul>--}}
{{--                                            <p class="pr-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6 align-self-center">--}}
{{--                                        <div class="product-ratings float-lg-right pb-3">--}}
{{--                                            <ul class="list-inline">--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>--}}
{{--                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- ad listing list  -->

<!-- pagination -->
                    <div class="pagination justify-content-center py-4">
                        <nav aria-label="Page navigation example">
                            {{$applications->links('pagination::bootstrap-4')}}

{{--                            <ul class="pagination">--}}
{{--                                <li class="page-item">--}}
{{--                                    <a class="page-link" href="search.blade.php" aria-label="Previous">--}}
{{--                                        <span aria-hidden="true">&laquo;</span>--}}
{{--                                        <span class="sr-only">Previous</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="page-item"><a class="page-link" href="search.blade.php">1</a></li>--}}
{{--                                <li class="page-item active"><a class="page-link" href="search.blade.php">2</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="search.blade.php">3</a></li>--}}
{{--                                <li class="page-item">--}}
{{--                                    <a class="page-link" href="search.blade.php" aria-label="Next">--}}
{{--                                        <span aria-hidden="true">&raquo;</span>--}}
{{--                                        <span class="sr-only">Next</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
                        </nav>
                    </div>
                    <!-- pagination -->
                </div>
            </div>
        </div>
    </section>
@endsection
