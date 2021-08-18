@extends('layouts.main')
@section('content')
<!-- Blog Section Start -->
<section class="blog-section section-py">
    <div class="container">
        <div class="row mb-n7">
            <div class="col-xl-8 col-lg-8 mb-7">
                <div class="row mb-n7 row-cols-1 row-cols-sm-2">
                    <!-- single blog start -->
                    @forelse($listCategory as $category)
                    <div class="col mb-7">
                        <div class="blog-card">
                            <div class="thumb bg-light p-0 text-center">
                                <a href="{{ route('category.show', ['category' => $category->id]) }}">
                                    <img src="{{ asset('front/images/blog/4.png') }}" alt="img" />
                                </a>
                            </div>
                            <div class="blog-content">
                                <a href="{{ route('category.show', ['category' => $category->id]) }}">
                                    <span class="blog-meta">Admin - {{ now()->format('d-m-Y, H:m') }}</span>
                                </a>
                                <h3 class="title">
                                    <a href="{{ route('category.show', ['category' => $category->id]) }}">{{ $category->title }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col mb-7">
                            <div class="blog-card">
                                <div class="blog-content">
                                    <p>Данных нет</p>
                                </div>
                            </div>
                        </div>
                    @endforelse
                    <!-- single blog end -->
                </div>
                <div class="row mt-10">
                    <div class="col-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{ $listCategory->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <x-main.sidebar :listCategory="$sidebarCategory" :countNewsInCategory="$countNewsInCategory"/>
        </div>
    </div>
</section>
<!-- Blog Section ENd -->
@endsection

