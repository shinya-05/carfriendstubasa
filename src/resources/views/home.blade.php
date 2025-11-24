@extends('layout.app')

@section('title', 'Car Friends Tsubasa | 中古車販売・買取')

@push('styles')
<style>
    .hero-title {
        font-size: 2.8rem;
        font-weight: 700;
        text-shadow: 0 4px 15px rgba(0,0,0,0.4);
    }

    .hero-sub {
        font-size: 1.3rem;
        font-weight: 500;
        text-shadow: 0 3px 10px rgba(0,0,0,0.4);
    }

    .section-title {
        font-size: 1.8rem;
        font-weight: 700;
        border-left: 5px solid #1b4d8c;
        padding-left: 12px;
    }

    .car-card img {
        height: 180px;
        object-fit: cover;
    }

    .car-card:hover {
        transform: translateY(-4px);
        transition: 0.2s;
        box-shadow: 0 8px 22px rgba(0,0,0,0.15);
    }

    .category-btn {
        border-radius: 40px;
        padding: 12px 26px;
        font-weight: 600;
        font-size: 1.1rem;
    }
</style>
@endpush

@section('content')

{{-- ===============================
      ① HERO SWIPER
================================ --}}
<div class="swiper heroSwiper mb-5">
    <div class="swiper-wrapper">

        {{-- Hero Slide 1 --}}
        <div class="swiper-slide">
            <div style="
                height: 430px;
                background: url('/images/hero1.jpg') center/cover;
                position: relative;">
                <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
                    <h1 class="hero-title">安心と信頼の中古車販売</h1>
                    <p class="hero-sub mt-3">Car Friends Tsubasa があなたのカーライフをサポート</p>
                </div>
            </div>
        </div>

        {{-- Hero Slide 2 --}}
        <div class="swiper-slide">
            <div style="
                height: 430px;
                background: url('/images/hero2.jpg') center/cover;">
            </div>
        </div>

        {{-- Hero Slide 3 --}}
        <div class="swiper-slide">
            <div style="
                height: 430px;
                background: url('/images/hero3.jpg') center/cover;">
            </div>
        </div>

    </div>

    {{-- Swiper Pagination / Navigation --}}
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>


{{-- ===============================
      ② 在庫カテゴリー（軽・ミニバン・SUV）
================================ --}}
<div class="container text-center mb-5">
    <h2 class="section-title mb-4">ボディタイプから探す</h2>

    <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="{{ route('cars.index', ['body_type' => '軽']) }}" class="btn btn-outline-primary category-btn">
            <i class="fa-solid fa-car-side me-2"></i> 軽自動車
        </a>
        <a href="{{ route('cars.index', ['body_type' => 'ミニバン']) }}" class="btn btn-outline-primary category-btn">
            <i class="fa-solid fa-van-shuttle me-2"></i> ミニバン
        </a>
        <a href="{{ route('cars.index', ['body_type' => 'SUV']) }}" class="btn btn-outline-primary category-btn">
            <i class="fa-solid fa-car me-2"></i> SUV
        </a>
    </div>
</div>


{{-- ===============================
      ③ 特選車（featured）
================================ --}}
<div class="container mb-5">
    <h2 class="section-title mb-4">特選車</h2>

    <div class="row g-4">
        @forelse($featuredCars as $car)
        <div class="col-md-4">
            <a href="{{ route('cars.show', $car) }}" class="text-decoration-none text-dark">
                <div class="card shadow-sm car-card">
                    <img src="{{ asset($car->main_image) }}" class="card-img-top">

                    <div class="card-body">
                        <h5 class="fw-bold">{{ $car->maker }} {{ $car->car_name }}</h5>
                        <p class="text-muted small mb-1">
                            {{ $car->model_year }}年式 / {{ number_format($car->mileage) }}km
                        </p>
                        <div class="fw-bold text-danger fs-4">
                            {{ number_format($car->price) }}万円
                        </div>
                    </div>
                </div>
            </a>
        </div>

        @empty
            <p class="text-muted">現在、特選車はありません。</p>
        @endforelse
    </div>

    <div class="text-end mt-3">
        <a href="{{ route('cars.index') }}" class="btn btn-primary btn-lg">
            在庫一覧を見る <i class="fa-solid fa-chevron-right ms-1"></i>
        </a>
    </div>
</div>


{{-- ===============================
      ④ 最新お知らせ（Swiper 横スクロール）
================================ --}}
<div class="container mb-5">
    <h2 class="section-title mb-4">お知らせ</h2>

    <div class="swiper newsSwiper">
        <div class="swiper-wrapper">

            @foreach($news as $item)
            <div class="swiper-slide">
                <div class="card shadow-sm p-3 h-100">
                    <a href="{{ route('news.show', $item) }}" class="text-decoration-none text-dark">
                        <h5 class="fw-bold">{{ $item->title }}</h5>
                        <div class="text-muted small">
                            {{ $item->published_at->format('Y/m/d') }}
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

        </div>

        <div class="swiper-pagination mt-3"></div>
    </div>

    <div class="text-end mt-3">
        <a href="{{ route('news.index') }}" class="btn btn-outline-primary">
            お知らせ一覧を見る
        </a>
    </div>
</div>


{{-- ===============================
      ⑤ 会社案内（コンセプト）
================================ --}}
<div class="container py-5">
    <div class="p-4 bg-white shadow rounded text-center">
        <h3 class="fw-bold mb-3">Car Friends Tsubasa の想い</h3>
        <p class="text-muted fs-5">
            お客様に安心して乗っていただける1台を、  
            長く付き合える「カーライフパートナー」としてご提供します。
        </p>
    </div>
</div>


{{-- ===============================
      ⑥ CTA
================================ --}}
<div class="container text-center py-5">
    <h3 class="fw-bold mb-3">お気軽にお問い合わせください</h3>
    <a href="{{ route('contact.form') }}" class="btn btn-primary btn-lg px-5">
        お問い合わせはこちら
    </a>
</div>

@endsection


@push('scripts')
<script>
    // Hero Swiper
    var heroSwiper = new Swiper(".heroSwiper", {
        loop: true,
        effect: "fade",
        autoplay: { delay: 3500 },
        pagination: { el: ".swiper-pagination", clickable: true },
        navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
    });

    // News Swiper
    var newsSwiper = new Swiper(".newsSwiper", {
        slidesPerView: 1.3,
        spaceBetween: 15,
        loop: true,
        breakpoints: {
            768: { slidesPerView: 3 },
            992: { slidesPerView: 4 },
        },
        autoplay: { delay: 3000 },
        pagination: { el: ".swiper-pagination", clickable: true },
    });
</script>
@endpush
