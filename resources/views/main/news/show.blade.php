@extends('layouts.main')
@section('content')


<!-- Blog Section Start -->
<section class="blog-section section-py">
    <div class="container">
        <div class="row mb-n7">
            <!-- blog-details-content -->
            <div class="col-xl-8 col-lg-8 mb-7">
                <div class="blog-details-content">
                    <!-- blog-details-thumb -->
                    <div class="blog-details-thumb">
                        <img src="{{ asset('front/images/blog-details/1.png') }}" alt="img" />
                    </div>
                    <!-- blog-details-thumb -->
                    <p class="blog-details-meta">
                        {{ $listNews->users->name }}
                        -
                        @if($listNews->updated_at) {{ $listNews->updated_at }} @else {{ now()->format('d-m-Y, H:m') }} @endif
                    </p>
                    <h3 class="blog-details-title">
                        {{ $listNews->title }}
                    </h3>
                    <p class="pb-2">
                        {{ $listNews->content }}
                    </p>
                    <h2>ОБРАЗЕЦ</h2>
                    <!-- blog-details-list start -->
                    <div class="blog-details-list">
                        <p>
                            <i class="fa fa-angle-double-right"></i>

                            Quisquam est qui dolorem ipsum quia dolor sit amet consectetur
                        </p>
                        <p>
                            <i class="fa fa-angle-double-right"></i>
                            These cases are perfectly simple and easy to distinguish
                        </p>
                    </div>
                    <!-- blog-details-list end -->
                    <!-- blog-qutation start -->
                    <div class="blog-qutation">
                        <p>
                            Pleasure rationally encounter consequences that are extremely
                            painful there who loves or pursues or desires to obtain
                            voluptas sit aspernatur aut odit sed consequuntur magni
                            dolores eos qui ratione voluptatem sequi nesciunt
                        </p>
                        <i class="icofont-quote-right"></i>
                    </div>
                    <!-- blog-qutation end -->
                    <!-- blog-details-grid start -->
                    <div class="blog-details-grid">
                        <div class="row mb-n7">
                            <div class="col mb-7">
                                <p>
                                    Pleasure rationally service are extremely are anyone who
                                    loves or pursues These cases are perfectly simple and easy
                                    to a distinguish. In a free hour, when our power of choice
                                    is untrammelled a circumstances and owing to the claims of
                                    duty some of the maintain detials for the Business
                                </p>
                            </div>
                            <div class="col mb-7 text-end">
                                <img class="d-block mx-auto mx-lg-0" src="{{ asset('front/images/blog-details/2.png') }}" alt="img" />
                            </div>
                            <div class="col-12 mb-7">
                                <p class="pt-2">
                                    Pleasure rationally encounter consequences that are
                                    extremely painful. Nor again there who loves or pursues or
                                    desires to obtain voluptas sit aspernatur aut odit aut
                                    fugit, sed consequuntur magni dolores eos qui ratione
                                    voluptatem sequi nesciunt.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- blog-details-grid end -->
                    <!-- social-tags start -->
                    <div class="social-tags d-sm-flex justify-content-between align-items-center">
                        <p class="mb-4 mb-sm-0">
                            <i class="fa fa-tags"></i> Corporate, Business, Investment
                        </p>

                        <!-- social links start-->
                        <ul class="social-links d-flex">
                            <li class="share"><span>Share</span></li>
                            <li>
                                <a href="#"><i class="icofont-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="icofont-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="icofont-instagram"></i></a>
                            </li>
                        </ul>

                        <!-- social links end-->
                    </div>
                    <!-- social-tags end -->
                    <!-- blog-comments start -->
                    <div class="blog-comments">
                        <h3 class="blog-comment-title">Comments(03)</h3>
                        <p class="pb-1">
                            Top rated construction packages we pleasure rationally
                            encounter consequences interesting who loves or pursue or
                            desires to obtain These cases are perfectly simple and easy
                        </p>
                    </div>
                    <!-- blog-comments end -->
                    <!-- authors -->
                    <div class="authors">
                        <!-- author-list start -->
                        <div class="author-list d-flex flex-wrap">
                            <img src="{{ asset('front/images/blog-details/profile.png') }}" alt="profile" class="author-profile align-self-start" />
                            <div class="author-info">
                                <h3 class="author-title">Robin Smith</h3>
                                <p class="author-meta">20 September, 2020 - 4 pm</p>
                                <p>
                                    Construction of itself, because it is pain obtain pain of
                                    itself, because it is pain we circumstances occur in which
                                    can procure some great pleasure to customer
                                </p>
                                <p class="replay"><i class="fa fa-reply"></i> Reply</p>
                            </div>
                        </div>
                        <!-- author-list end -->
                        <!-- author-list start -->
                        <div class="author-list d-flex flex-wrap">
                            <img src="{{ asset('front/images/blog-details/profile2.png') }}" alt="profile" class="author-profile align-self-start" />
                            <div class="author-info">
                                <h3 class="author-title">Marlon Ethan</h3>
                                <p class="author-meta">20 September, 2020 - 9 pm</p>
                                <p>
                                    Construction of itself, because it is pain obtain pain of
                                    itself, because it is pain we circumstances occur in which
                                    can procure some great pleasure to customer
                                </p>
                                <p class="replay"><i class="fa fa-reply"></i> Reply</p>
                            </div>
                        </div>
                        <!-- author-list end -->
                        <!-- author-list start -->
                        <div class="author-list d-flex flex-wrap">
                            <img src="{{ asset('front/images/blog-details/profile3.png') }}" alt="profile" class="author-profile align-self-start" />
                            <div class="author-info">
                                <h3 class="author-title">Lusi Williams</h3>
                                <p class="author-meta">20 September, 2020 - 12 pm</p>
                                <p>
                                    Construction of itself, because it is pain obtain pain of
                                    itself, because it is pain we circumstances occur in which
                                    can procure some great pleasure to customer
                                </p>
                                <p class="replay"><i class="fa fa-reply"></i> Reply</p>
                            </div>
                        </div>
                        <!-- author-list end -->
                    </div>
                    <!-- authors -->
                    <!-- blog-comments start -->
                    <div class="blog-comments blog-pt-55">
                        <h3 class="blog-comment-title">Leave a Reply or Comment</h3>
                        <p>
                            Top rated construction packages we pleasure rationally
                            encounter consequences interesting who loves or pursue or
                            desires to obtain These cases are perfectly simple and easy
                        </p>
                    </div>
                    <!-- blog-comments end -->

                    <!-- form start -->
                    <form id="contactForm" action="assets/php/contact.php" method="POST" class="row">
                        <!-- assets/php/contact.php -->
                        <div class="col-12 col-sm-6 col-md-4 mb-7">
                            <input type="text" class="form-control" id="name" placeholder="Your Name*" name="name" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 mb-7">
                            <input type="text" class="form-control" id="email" placeholder="Your Email*" name="email" />
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 mb-7">
                            <input type="text" class="form-control" id="number" placeholder="Phone number" name="number" />
                        </div>

                        <div class="col-12 mb-9">
                            <textarea class="form-control massage-control" name="massage" id="massage" cols="30" rows="10" placeholder="Message"></textarea>
                        </div>
                        <div class="col-12">
                            <button id="contactSubmit" type="submit" class="btn btn-lg btn-dark btn-hover-dark" data-complete-text="Well Done!">
                                Submit
                            </button>
                            <p class="form-message mt-3"></p>
                        </div>
                    </form>

                    <!-- form end -->
                </div>
            </div>
            <!-- blog-details-content -->
            <x-main.sidebar :listCategory="$listCategory" :countNewsInCategory="$countNewsInCategory"/>
        </div>
    </div>
</section>
<!-- Blog Section ENd -->

@endsection
