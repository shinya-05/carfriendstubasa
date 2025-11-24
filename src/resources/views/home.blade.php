@extends('layout.app')

@section('title', 'Car Friends Tsubasa | 中古車販売・買取')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<style>
    :root {
        --cft-navy: #0B2C56;
        --cft-gold: #C9A14C;
        --cft-gray: #f6f6f6;
    }

    body {
        background-color: #ffffff;
    }

    /* HERO */
    .hero-title {
        font-size: 2.6rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-shadow: 0 4px 15px rgba(0,0,0,0.4);
    }

    .hero-sub {
        font-size: 1.1rem;
        font-weight: 400;
        text-shadow: 0 3px 10px rgba(0,0,0,0.4);
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: .4rem;
        padding: .35rem .9rem;
        border-radius: 999px;
        background: rgba(0, 0, 0, 0.45);
        font-size: 0.78rem;
    }

    /* セクションタイトル */
    .section-title {
        font-size: 1.8rem;
        font-weight: 700;
        border-left: 5px solid var(--cft-navy);
        padding-left: 12px;
        margin-bottom: 1.2rem;
    }

    .section-sub {
        color: #666;
        font-size: 0.95rem;
    }

    /* ボディタイプボタン */
    .category-btn {
        border-radius: 999px;
        padding: 10px 26px;
        font-weight: 600;
        font-size: 1rem;
        border-width: 2px;
    }

    .category-btn i {
        font-size: 1.1rem;
    }

    /* 車カード */
    .car-card {
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #e2e2e2;
        transition: transform .18s ease-out, box-shadow .18s ease-out;
    }

    .car-card img {
        height: 190px;
        object-fit: cover;
    }

    .car-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 26px rgba(0,0,0,0.18);
    }

    .price-tag {
        font-size: 1.4rem;
        font-weight: 700;
        color: #C6292F;
    }

    /* 店舗案内 */
    .shop-section {
        background: linear-gradient(90deg, #ffffff 0%, #f8f9fb 40%, #eef1f5 100%);
    }

    .shop-info-label {
        width: 90px;
        font-weight: 600;
        color: #555;
    }

    /* スタッフカード */
    .staff-card {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        border: none;
        overflow: hidden;
    }

    .staff-photo {
        width: 100%;
        height: 200px;
        object-fit: cover;
        background-color: #ddd;
    }

    /* 会社情報 */
    .company-section {
        background-color: var(--cft-navy);
        color: #f9fafb;
    }

    .company-section h3 {
        color: #ffffff;
    }

    .company-section .accent {
        color: var(--cft-gold);
        font-weight: 600;
    }

    .company-table th {
        width: 120px;
        color: #e5e7eb;
        font-weight: 600;
    }

    .company-table td {
        color: #f9fafb;
    }

    @media (max-width: 767px) {
        .hero-title {
            font-size: 2rem;
        }
    }
</style>
@endpush

@section('content')

{{-- =====================================
      ① HERO：BMW風スライダー
===================================== --}}
<div class="swiper heroSwiper mb-5">
    <div class="swiper-wrapper">

        {{-- Slide 1 --}}
        <div class="swiper-slide">
            <div style="
                height: 620px;
                background: url('/images/hero1.JPG') center/cover no-repeat;
                position: relative;">
                <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                    <div class="hero-badge mb-3">
                        <i class="fa-solid fa-award"></i>
                        厳選仕入れ × トータルサポート
                    </div>
                    <h1 class="hero-title mb-3">Car Friends Tsubasa</h1>
                    <p class="hero-sub">
                        中古車販売・買取・車検整備。<br>
                        つくばエリアで「一生付き合える」カーライフパートナーに。
                    </p>
                </div>
            </div>
        </div>

        {{-- Slide 2 --}}
        <div class="swiper-slide">
            <div style="
                height: 620px;
                background: url('/images/hero2.jpg') center/cover no-repeat;">
            </div>
        </div>

        {{-- Slide 3 --}}
        <div class="swiper-slide">
            <div style="
                height: 620px;
                background: url('/images/hero3.jpg') center/cover no-repeat;">
            </div>
        </div>

    </div>

    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>


{{-- =====================================
      ② ボディタイプから探す
===================================== --}}
<div class="container mb-5">
    <h2 class="section-title">ボディタイプから探す</h2>
    <p class="section-sub mb-4">
        ライフスタイルに合わせて、ぴったりの一台をお選びいただけます。
    </p>

    <div class="d-flex flex-wrap gap-3">
        <a href="{{ route('cars.index', ['body_type' => '軽自動車']) }}"
           class="btn btn-outline-primary category-btn">
            <i class="fa-solid fa-car-side me-2"></i> 軽自動車
        </a>
        <a href="{{ route('cars.index', ['body_type' => 'ミニバン']) }}"
           class="btn btn-outline-primary category-btn">
            <i class="fa-solid fa-van-shuttle me-2"></i> ミニバン
        </a>
        <a href="{{ route('cars.index', ['body_type' => 'SUV']) }}"
           class="btn btn-outline-primary category-btn">
            <i class="fa-solid fa-car me-2"></i> SUV
        </a>
        <a href="{{ route('cars.index') }}"
           class="btn btn-link ms-auto">
            すべての在庫を見る <i class="fa-solid fa-chevron-right ms-1"></i>
        </a>
    </div>
</div>


{{-- =====================================
      ③ 特選車（featuredCars）
===================================== --}}
<div class="container mb-5">
    <h2 class="section-title">特選車</h2>
    <p class="section-sub mb-4">
        走行距離・装備・状態ともにおすすめできる、厳選の特選車をご紹介します。
    </p>

    <div class="row g-4">
        @forelse($featuredCars as $car)
            <div class="col-md-4">
                <a href="{{ route('cars.show', $car) }}" class="text-decoration-none text-dark">
                    <div class="card car-card">
                        <img src="{{ asset($car->main_image ?? 'images/noimage.jpg') }}" class="card-img-top" alt="">

                        <div class="card-body">
                            <span class="badge bg-dark mb-2">
                                {{ $car->maker }}
                            </span>

                            <h5 class="fw-bold mb-1">
                                {{ $car->car_name }}
                            </h5>

                            <div class="d-flex justify-content-between small text-muted mb-2">
                                <span>{{ $car->model_year }}年式</span>
                                <span>{{ number_format($car->mileage) }} km</span>
                            </div>

                            <div class="price-tag mb-1">
                                {{ number_format($car->price) }} 万円
                            </div>
                            <div class="small text-muted">
                                支払総額：{{ number_format($car->total_price ?? $car->price) }} 万円
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


{{-- =====================================
      ④ お知らせ（Swiper）
===================================== --}}
<div class="container mb-5">
    <h2 class="section-title">お知らせ</h2>
    <p class="section-sub mb-3">キャンペーン・営業案内・新着情報などをお届けします。</p>

    <div class="swiper newsSwiper">
        <div class="swiper-wrapper">
            @foreach($news as $item)
                <div class="swiper-slide">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="text-muted small mb-1">
                                {{ optional($item->published_at)->format('Y/m/d') }}
                            </div>
                            <a href="{{ route('news.show', $item) }}" class="text-decoration-none text-dark">
                                <h6 class="fw-bold">{{ $item->title }}</h6>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="swiper-pagination mt-2"></div>
    </div>

    <div class="text-end mt-3">
        <a href="{{ route('news.index') }}" class="btn btn-outline-primary">
            お知らせ一覧を見る <i class="fa-solid fa-chevron-right ms-1"></i>
        </a>
    </div>
</div>


{{-- =====================================
      ⑤ 店舗案内（地図・営業時間）
===================================== --}}
<section class="py-5 shop-section">
    <div class="container">
        <h2 class="section-title">店舗案内</h2>
        <p class="section-sub mb-4">
            実際におクルマをご覧いただける展示場と、認証工場を併設しております。
        </p>

        <div class="row g-4 align-items-stretch">
            <div class="col-md-6">
                {{-- Googleマップ埋め込み（適宜差し替え） --}}
                <div class="ratio ratio-4x3 rounded shadow-sm">
                    <iframe
                        src="https://www.google.com/maps?q=茨城県つくば市大井1440-48&output=embed"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <div class="col-md-6">
                <h5 class="fw-bold mb-3">Car Friends Tsubasa 本店</h5>

                <dl class="row mb-3 small">
                    <dt class="col-3 shop-info-label">所在地</dt>
                    <dd class="col-9">
                        〒300-1243<br>
                        茨城県つくば市大井１４４０−４８
                    </dd>

                    <dt class="col-3 shop-info-label">電話</dt>
                    <dd class="col-9">
                        <a href="tel:0298799474" class="text-decoration-none text-dark fw-bold">
                            029-879-9474
                        </a>
                    </dd>

                    <dt class="col-3 shop-info-label">営業時間</dt>
                    <dd class="col-9">
                        10:00〜19:00
                    </dd>

                    <dt class="col-3 shop-info-label">定休日</dt>
                    <dd class="col-9">
                        水曜日（年末年始・GW・お盆は別途ご案内）
                    </dd>
                </dl>

                <div class="small text-muted">
                    お越しの際は、事前にお電話またはお問い合わせフォームからご来店予約をいただけますと
                    スムーズにご案内が可能です。
                </div>
            </div>
        </div>
    </div>
</section>


{{-- =====================================
      ⑥ スタッフ紹介
===================================== --}}
<section class="py-5">
    <div class="container">
        <h2 class="section-title">スタッフ紹介</h2>
        <p class="section-sub mb-4">
            お客様一人ひとりに寄り添う、Car Friends Tsubasa のスタッフです。
        </p>

        <div class="row g-4">
            {{-- スタッフ1 --}}
            <div class="col-md-4">
                <div class="card staff-card">
                    <div class="staff-photo" style="background-image:url('/images/staff1.jpg'); background-size:cover; background-position:center;"></div>
                    <div class="card-body">
                        <h6 class="fw-bold mb-1">山田 太郎</h6>
                        <div class="text-muted small mb-2">店長 / セールスアドバイザー</div>
                        <p class="small mb-0">
                            「安心してお乗りいただける一台」をモットーに、丁寧なご提案を心がけています。
                        </p>
                    </div>
                </div>
            </div>

            {{-- スタッフ2 --}}
            <div class="col-md-4">
                <div class="card staff-card">
                    <div class="staff-photo" style="background-image:url('/images/staff2.jpg'); background-size:cover; background-position:center;"></div>
                    <div class="card-body">
                        <h6 class="fw-bold mb-1">佐藤 花子</h6>
                        <div class="text-muted small mb-2">カーライフプランナー</div>
                        <p class="small mb-0">
                            初めてのお車選びや、子育て世代の方のカーライフもお気軽にご相談ください。
                        </p>
                    </div>
                </div>
            </div>

            {{-- スタッフ3 --}}
            <div class="col-md-4">
                <div class="card staff-card">
                    <div class="staff-photo" style="background-image:url('/images/staff3.jpg'); background-size:cover; background-position:center;"></div>
                    <div class="card-body">
                        <h6 class="fw-bold mb-1">鈴木 一郎</h6>
                        <div class="text-muted small mb-2">サービスエンジニア</div>
                        <p class="small mb-0">
                            ご購入後の点検・整備・車検まで、長く安心してお乗りいただけるようサポートします。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- =====================================
      ⑦ 会社情報（ブランドコンセプト）
===================================== --}}
<section class="py-5 company-section">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-md-6">
                <h3 class="fw-bold mb-3">
                    <span class="accent">株式会社カーフレンズツバサ</span> について
                </h3>
                <p class="mb-3">
                    私たちは、単に「車を販売する」だけではなく、<br>
                    お客様の人生に寄り添う「カーライフパートナー」でありたいと考えています。
                </p>
                <p class="mb-3">
                    ご購入前のご相談から、ご納車後のメンテナンス、<br>
                    そして次のお乗り換えまで、長く安心してお付き合いいただけるよう、
                    丁寧なご提案と確かな整備でサポートいたします。
                </p>
            </div>

            <div class="col-md-6">
                <table class="table table-borderless company-table small mb-0">
                    <tbody>
                    <tr>
                        <th>会社名</th>
                        <td>株式会社カーフレンズツバサ</td>
                    </tr>
                    <tr>
                        <th>所在地</th>
                        <td>
                            〒300-1243<br>
                            茨城県つくば市大井１４４０−４８
                        </td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td>029-879-9474</td>
                    </tr>
                    <tr>
                        <th>事業内容</th>
                        <td>
                            中古自動車販売 / 自動車買取 / 車検・点検・整備 / 自動車保険代理店業
                        </td>
                    </tr>
                    <tr>
                        <th>対応エリア</th>
                        <td>つくば市を中心に、茨城県全域・近隣エリア</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


{{-- =====================================
      ⑧ CTA
===================================== --}}
<section class="py-5 text-center">
    <div class="container">
        <h3 class="fw-bold mb-3">気になるお車やご相談がございましたら、お気軽にお問い合わせください。</h3>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('contact.form') }}" class="btn btn-primary btn-lg px-4">
                お問い合わせフォーム
            </a>
            <a href="tel:0298799474" class="btn btn-outline-primary btn-lg px-4">
                <i class="fa-solid fa-phone me-1"></i> 029-879-9474 に電話する
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    const heroSwiper = new Swiper(".heroSwiper", {
        loop: true,
        effect: "fade",
        autoplay: { delay: 4000, disableOnInteraction: false },
        pagination: { el: ".heroSwiper .swiper-pagination", clickable: true },
        navigation: {
            nextEl: ".heroSwiper .swiper-button-next",
            prevEl: ".heroSwiper .swiper-button-prev"
        },
    });

    const newsSwiper = new Swiper(".newsSwiper", {
        loop: true,
        slidesPerView: 1.2,
        spaceBetween: 16,
        autoplay: { delay: 3500, disableOnInteraction: false },
        pagination: { el: ".newsSwiper .swiper-pagination", clickable: true },
        breakpoints: {
            768: { slidesPerView: 2.5 },
            992: { slidesPerView: 3.5 }
        }
    });
</script>
@endpush
