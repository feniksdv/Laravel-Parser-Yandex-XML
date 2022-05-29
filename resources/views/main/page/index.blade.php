@extends('layouts.main')
@section('content')
    <section class="service-section section-py">
        <div class="container">
            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 mb-n7">
                <!-- single team start -->
                @forelse($listPage as $page)
                <div class="col col-md-6 col-lg-4 col-xl-3 text-center mb-7">
                    <div class="team-card">
                        <div class="thumb">
                            <a href="{{ route('page.show', ['page' => $page->id]) }}"><img src="{{asset('front/images/team/1.png')}}" alt="img"></a>
                        </div>
                        <div class="content">
                            <h3 class="title"><a href="{{ route('page.show', ['page' => $page->id]) }}">{{ $page->title }}</a></h3>
                            <span>{{ mb_substr($page->content,0, 50).'...' }}</span>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col mb-12">
                        <div class="blog-card">
                            <div class="blog-content">
                                <p>Данных нет</p>
                            </div>
                        </div>
                    </div>
                @endforelse
                <!-- single team end -->
            </div>
        </div>
        <div class="row mt-10">
            <div class="col-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{ $listPage->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </section>
@endsection
