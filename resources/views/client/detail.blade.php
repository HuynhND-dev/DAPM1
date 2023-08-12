@extends('client.master')
@section('head')
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <section class="section bg-gray">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <!-- Left sidebar -->
                <div class="col-lg-8">
                    <div class="product-details">
                        <h1 class="product-title">{{$application[0]->name}}</h1>
                        <div class="product-meta">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-user-o"></i> By: <a href="user-profile.html">{{$employer[0]->name}}</a></li>
                                <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Ngành:
                                    @foreach($categories as $category)
                                    <a href="{{$category->name}}">
                                            {{$category->name}},
                                    </a>
                                    @endforeach
                                </li>
                                <li class="list-inline-item"><i class="fa fa-location-arrow"></i> Địa chỉ:<a href="category.html">
                                        {{$location[0]->district}},{{$location[0]->province}}
                                    </a></li>
                            </ul>
                        </div>

                        <!-- product slider -->
                        <div class="">
                            @if($application[0]->embed)
                                <iframe width="100%" height="400" src="{{$application[0]->embed}}"
                                        frameborder="0" allowfullscreen></iframe>
                            @endif
{{--                            <div class="product-slider-item my-4" data-image="images/products/products-1.jpg">--}}
{{--                                <img class="img-fluid w-100" src="images/products/products-1.jpg" alt="product-img">--}}
{{--                            </div>--}}
{{--                            <div class="product-slider-item my-4" data-image="images/products/products-2.jpg">--}}
{{--                                <img class="d-block img-fluid w-100" src="images/products/products-2.jpg" alt="Second slide">--}}
{{--                            </div>--}}
{{--                            <div class="product-slider-item my-4" data-image="images/products/products-3.jpg">--}}
{{--                                <img class="d-block img-fluid w-100" src="images/products/products-3.jpg" alt="Third slide">--}}
{{--                            </div>--}}
{{--                            <div class="product-slider-item my-4" data-image="images/products/products-1.jpg">--}}
{{--                                <img class="d-block img-fluid w-100" src="images/products/products-1.jpg" alt="Third slide">--}}
{{--                            </div>--}}
{{--                            <div class="product-slider-item my-4" data-image="images/products/products-2.jpg">--}}
{{--                                <img class="d-block img-fluid w-100" src="images/products/products-2.jpg" alt="Third slide">--}}
{{--                            </div>--}}
                        </div>
                        <!-- product slider -->

                        <div class="content mt-5 pt-5">
                            <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
                                       aria-selected="true">Chi tiết tuyển dụng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
                                       aria-selected="false">Phúc lợi công ty</a>
                                </li>
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"--}}
{{--                                       aria-selected="false">Reviews</a>--}}
{{--                                </li>--}}
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <h3 class="tab-title">MÔ TẢ CÔNG VIỆC</h3>
                                    {!!$application[0]->description!!}
                                    <p></p>
                                    <h3 class="tab-title">YÊU CẦU</h3>
                                    <p>{!! $application[0]->requirement !!}</p>
                                </div>

                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <h3 class="tab-title">Quyền lợi được hưởng</h3>

                                    {!! $application[0]->welfare !!}
                                </div>
{{--                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">--}}
{{--                                    <h3 class="tab-title">Product Review</h3>--}}
{{--                                    <div class="product-review">--}}
{{--                                        <div class="media">--}}
{{--                                            <!-- Avater -->--}}
{{--                                            <img src="images/user/user-thumb.jpg" alt="avater">--}}
{{--                                            <div class="media-body">--}}
{{--                                                <!-- Ratings -->--}}
{{--                                                <div class="ratings">--}}
{{--                                                    <ul class="list-inline">--}}
{{--                                                        <li class="list-inline-item">--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                        </li>--}}
{{--                                                        <li class="list-inline-item">--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                        </li>--}}
{{--                                                        <li class="list-inline-item">--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                        </li>--}}
{{--                                                        <li class="list-inline-item">--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                        </li>--}}
{{--                                                        <li class="list-inline-item">--}}
{{--                                                            <i class="fa fa-star"></i>--}}
{{--                                                        </li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                                <div class="name">--}}
{{--                                                    <h5>Jessica Brown</h5>--}}
{{--                                                </div>--}}
{{--                                                <div class="date">--}}
{{--                                                    <p>Mar 20, 2018</p>--}}
{{--                                                </div>--}}
{{--                                                <div class="review-comment">--}}
{{--                                                    <p>--}}
{{--                                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremqe laudant tota rem ape--}}
{{--                                                        riamipsa eaque.--}}
{{--                                                    </p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="review-submission">--}}
{{--                                            <h3 class="tab-title">Submit your review</h3>--}}
{{--                                            <!-- Rate -->--}}
{{--                                            <div class="rate">--}}
{{--                                                <div class="starrr"></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="review-submit">--}}
{{--                                                <form action="#" method="POST" class="row">--}}
{{--                                                    <div class="col-lg-6 mb-3">--}}
{{--                                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-lg-6 mb-3">--}}
{{--                                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-12 mb-3">--}}
{{--                                                        <textarea name="review" id="review" rows="6" class="form-control" placeholder="Message" required></textarea>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-12">--}}
{{--                                                        <button type="submit" class="btn btn-main">Sumbit</button>--}}
{{--                                                    </div>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="widget price text-center">
                            <h4>Mức lương (VND)</h4>
                            <p style="font-size: 25px">{{number_format($application[0]->salary_from)}} - {{number_format($application[0]->salary_to)}}</p>
                        </div>
                        <!-- User Profile widget -->
                        <div class="widget user text-center">
                            <img class="rounded-circle img-fluid mb-5 px-5" src="/images/{{$employer[0]->avata}}" alt="">
                            <h4><a href="user-profile.html">{{$employer[0]->name}}</a></h4>
                            <p class="member-time">Ngày tham gia
                                <?php
                                $date = $employer[0]->create_at;
                                $dateTime = new DateTime($date);
                                $formattedDateTime = $dateTime->format('d/m/Y');
                                echo $formattedDateTime;
                                ?>
                            </p>
                            <a href="single.html">See all ads</a>
                            <ul class="list-inline mt-20">
                                <li class="list-inline-item"><a href="contact-us.html" class="btn btn-contact d-inline-block  btn-primary px-lg-4 my-2 px-md-4">Liên hệ</a></li>
                                <li class="list-inline-item" id="btnApply">
                                    @if($applies[0])
                                    @if($applies[0]->stt_ID == 1)
                                    <button id="apply" stt="{{$applies[0]->stt_ID}}" candidate="{{$employer[0]->user_ID}}" job="{{$application[0]->application_ID}}" class="btn btn-offer d-inline-block btn-danger px-lg-4 my-2 px-md-3">Huỷ ứng tuyển</button>
                                    @elseif($applies[0]->stt_ID == 2)
                                        <button class="btn btn-offer d-inline-block btn-secondary px-lg-4 my-2 px-md-3" disabled>Đã được nhận</button>
                                    @endif
                                    @else
                                        <button id="apply" stt="0" candidate="{{$employer[0]->user_ID}}" job="{{$application[0]->application_ID}}" class="btn btn-offer d-inline-block btn-primary px-lg-4 my-2 px-md-3">Ứng tuyển</button>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <!-- Map Widget -->
                        <div class="widget map">
                            <div class="map">
                                <div id="map" data-latitude="16.078494" data-longitude="108.218649"></div>
                            </div>
                        </div>
                        <!-- Rate Widget -->
{{--                        <div class="widget rate">--}}
{{--                            <!-- Heading -->--}}
{{--                            <h5 class="widget-header text-center">Đánh giá--}}
{{--                                <br>--}}
{{--                                bài tuyển dụng</h5>--}}
{{--                            <!-- Rate -->--}}
{{--                            <div class="starrr"></div>--}}
{{--                        </div>--}}
                        <!-- Safety tips widget -->
{{--                        <div class="widget disclaimer">--}}
{{--                            <h5 class="widget-header">Safety Tips</h5>--}}
{{--                            <ul>--}}
{{--                                <li>Meet seller at a public place</li>--}}
{{--                                <li>Check the item before you buy</li>--}}
{{--                                <li>Pay only after collecting the item</li>--}}
{{--                                <li>Pay only after collecting the item</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <!-- Coupon Widget -->--}}

                    </div>
                </div>

            </div>
        </div>
        <!-- Container End -->
    </section>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('/custom/apply.js')}}"></script>
@endsection
