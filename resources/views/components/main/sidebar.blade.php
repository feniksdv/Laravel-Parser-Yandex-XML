<div class="col-xl-3 col-lg-4 mb-7  offset-xl-1">
    <div class="widget-wrapper widget-wrapper-nl">
        <!-- sidebar-widget start -->
        <div class="sidebar-widget">
            <h3 class="widget-title">Search</h3>
            <div class="widget-content">
                <div class="widget-search">
                    <form action="#">
                        <input class="form-control" type="text" placeholder="Type your keyword..." />
                        <button class="widget-search-btn">
                            <i class="icofont-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- sidebar-widget end -->

        <!-- sidebar-widget start -->
        <div class="sidebar-widget">
            <h3 class="widget-title">Категории</h3>
            <div class="widget-list">
                <ul class="list-group list-group-flush">
                    @forelse ($listCategory as $category)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('category.show', ['id' => $category['id']]) }}">
                                {{ $category['title'] }}
                            </a>
                            <span>{{ count($listCategory) }}</span>
                        </li>
                    @empty
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Нет рубрик<span></span>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
        <!-- sidebar-widget end -->
        <!-- sidebar-widget start -->
        <div class="sidebar-widget">
            <h3 class="widget-title">popular post</h3>
            <!-- widget-post-list startrt -->
            <div class="widget-post-list">
                <a href="#" class="post-thumb">
                    <img src="{{ asset('front/images/blog/post/1.png') }}" alt="img" />
                </a>
                <div class="widget-post-content">
                    <h3 class="widget-sub-title">
                        <a href="#">Invesment policy for a Startup Business</a>
                    </h3>
                    <p class="post-meta">Septemer 10, 2021</p>
                </div>
            </div>
            <!-- widget-post-list startrt -->
            <!-- widget-post-list startrt -->
            <div class="widget-post-list">
                <a href="#" class="post-thumb">
                    <img src="{{ asset('front/images/blog/post/2.png') }}" alt="img" />
                </a>
                <div class="widget-post-content">
                    <h3 class="widget-sub-title">
                        <a href="#">Branding can play great role in Business</a>
                    </h3>
                    <p class="post-meta">September 05, 2021</p>
                </div>
            </div>
            <!-- widget-post-list startrt -->
            <!-- widget-post-list startrt -->
            <div class="widget-post-list">
                <a href="#" class="post-thumb">
                    <img src="{{ asset('front/images/blog/post/3.png') }}" alt="img" />
                </a>
                <div class="widget-post-content">
                    <h3 class="widget-sub-title">
                        <a href="#">Marketing training on new strategy </a>
                    </h3>
                    <p class="post-meta">September 02, 2021</p>
                </div>
            </div>
            <!-- widget-post-list startrt -->
        </div>
        <!-- sidebar-widget end -->

        <!-- sidebar-widget start -->
        <div class="sidebar-widget">
            <h3 class="widget-title">Tags</h3>
            <div class="widget-tags">
                <a class="widget-tag-link" href="JavaScript:Void(0);">Corporate</a>
                <a class="widget-tag-link" href="JavaScript:Void(0);">Creative</a>
                <a class="widget-tag-link" href="JavaScript:Void(0);">interrior</a>
                <a class="widget-tag-link" href="JavaScript:Void(0);">Marketing</a>
                <a class="widget-tag-link" href="JavaScript:Void(0);">Business</a>
                <a class="widget-tag-link" href="JavaScript:Void(0);">Invest</a>
                <a class="widget-tag-link" href="JavaScript:Void(0);">Branding</a>
                <a class="widget-tag-link" href="JavaScript:Void(0);">Consultancy</a>
            </div>
        </div>

        <!-- sidebar-widget end -->
    </div>
</div>
