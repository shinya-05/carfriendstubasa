@extends('layout.app')

@section('title', 'カーフレンズツバサ')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<style>
/* ---------------------------------------------
   0. 全体ブランドテーマ
--------------------------------------------- */
:root {
    --cft-navy: #0B2C56;
    --cft-gold: #C9A14C;
    --cft-gray: #f6f6f6;
}

body {
    background: linear-gradient(180deg, #ffffff 0%, #f7f9fc 40%, #eef1f5 100%);
}


/* ---------------------------------------------
   1. HERO（Ken Burns ＋ overlay + BMW矢印）
--------------------------------------------- */
/* HERO wrapper（文字は動かさない） */
.heroSwiper .swiper-slide{
  position: relative;
}

/* 画像＆文字の土台 */
.hero-frame{
  position: relative;
  overflow: hidden;
  height: 1000px;
}

/* 画像だけ動かすレイヤー */
.hero-media{
  position: absolute;
  inset: 0;
  background-size: cover !important;
  background-position: center !important;
  transform: scale(1.08); /* 初期少し拡大 */
  will-change: transform, filter;
}

/* オーバーレイ（画像の上・文字の下） */
.hero-frame::before{
  content:"";
  position:absolute;
  inset:0;
  background: rgba(0,0,0,0.45);
  z-index: 1;
}

/* 文字は常に最前面で固定 */
.hero-copy{
  position: absolute;
  left: clamp(18px, 6vw, 70px);
  top: 55%;
  transform: translateY(-50%);
  z-index: 2;
  color:#fff;
  text-align:left;
  max-width: min(980px, 88vw);
}

/* Ken Burns：画像だけ */
@keyframes kenburns-media {
  0%   { transform: scale(1.08) translate3d(0,0,0); filter: blur(0px); }
  100% { transform: scale(1.18) translate3d(-1.5%, -1.0%, 0); filter: blur(1.5px); }
}

/* アクティブスライドの画像だけアニメ */
.heroSwiper .swiper-slide-active .hero-media{
  animation: kenburns-media 5s ease-out both;
}

/* SP調整 */
@media (max-width: 767px){
  .hero-frame{ height: 780px; }
  .hero-copy{ top: 58%; }
}


/* BMW風矢印 */
.heroSwiper .swiper-button-next,
.heroSwiper .swiper-button-prev {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: rgba(255,255,255,0.35);
    backdrop-filter: blur(6px);
    box-shadow: 0 4px 14px rgba(0,0,0,0.15);
    transition: all .3s ease;
}

.heroSwiper .swiper-button-next:hover,
.heroSwiper .swiper-button-prev:hover {
    background: rgba(255,255,255,0.55);
    transform: scale(1.1);
}

.heroSwiper .swiper-button-next::after,
.heroSwiper .swiper-button-prev::after {
    color: var(--cft-navy);
    font-size: 1.3rem;
}

/* ===============================
   HERO Copy（buddica風：左寄せ・大きい文字）
================================ */
.hero-copy{
  position: absolute;
  left: clamp(18px, 6vw, 70px);
  top: 55%;
  transform: translateY(-50%);
  z-index: 4;                 /* overlayより上 */
  color: #fff;
  text-align: left;
  max-width: min(980px, 88vw);
}

.hero-kicker{
  display: inline-flex;
  align-items: center;
  gap: .6rem;
  font-weight: 900;
  letter-spacing: .12em;
  font-size: clamp(1.2rem, 2.4vw, 2.2rem);
  margin-bottom: 14px;
  text-shadow: 0 8px 22px rgba(0,0,0,.45);
}

.hero-kicker::before{
  content: "—";
  opacity: .9;
}
.hero-kicker::after{
  content: "—";
  opacity: .9;
}

.hero-headline{
  font-weight: 900;
  letter-spacing: .02em;
  line-height: 1.18;
  font-size: clamp(1.8rem, 4.2vw, 3.6rem);
  text-shadow: 0 10px 28px rgba(0,0,0,.55);
  margin: 0;
}

/* 追加のサブ説明（任意） */
.hero-note{
  margin-top: 14px;
  font-size: clamp(.95rem, 1.4vw, 1.1rem);
  color: rgba(255,255,255,.88);
  line-height: 1.9;
  text-shadow: 0 6px 18px rgba(0,0,0,.45);
}

/* 画面が狭いときは少し上げる */
@media (max-width: 767px){
  .hero-copy{ top: 58%; }
}


/* ===============================
   フル幅・超強調 購入ボタン
================================ */

.buy-cta {
    display: block;
    width: 100%;
    padding: 22px 30px;
    font-size: 1.3rem;
    font-weight: 800;
    border-radius: 14px;
    text-align: center;
    text-decoration: none;
    transition: all .3s ease;
    box-shadow: 0 10px 30px rgba(0,0,0,.25);
}

/* グーネット（ゴールド×ネイビー） */
.buy-cta-goo {
    background: linear-gradient(135deg, #c40000, #ff3b3b);
    color: #fff;
}

.buy-cta-goo:hover {
    transform: translateY(-5px);
    box-shadow: 0 18px 45px rgba(196,0,0,.45);
    color: #fff;
}

/* カーセンサー（オレンジ系で差別化） */
.buy-cta-cs {
    background: linear-gradient(135deg, #ff7a00, #ffb347);
    color: #fff;
}

.buy-cta-cs:hover {
    transform: translateY(-5px);
    box-shadow: 0 18px 45px rgba(255,122,0,.45);
    color: #fff;
}

/* 上に置く強調テキスト */
.buy-lead {
    font-size: 1.5rem;
    font-weight: 900;
    margin-bottom: 18px;
}

/* ---------------------------------------------
   2. セクションタイトル
--------------------------------------------- */
.section-title {
    font-size: 2.0rem;
    font-weight: 700;
    border-left: 5px solid var(--cft-navy);
    padding-left: 12px;
    margin: 1.2rem 0px;
    text-align:center;
    border-left: none; 
}

.section-sub {
    color: #666;
    font-size: 0.95rem;
}


/* ---------------------------------------------
   3. ボディタイプボタン（かわいく丸型）
--------------------------------------------- */

.category-btn {
    border-radius: 999px;
    padding: 12px 30px;
    font-weight: 600;
    font-size: 1rem;
    border-width: 2px;
    border-color: var(--cft-navy);
    background: #ffffff;
    color: var(--cft-navy);
    transition: all .25s ease;
}

.category-btn:hover {
    background: var(--cft-navy);
    color: #ffffff;
    transform: translateY(-3px);
    box-shadow: 0 6px 16px rgba(0,0,0,0.12);
}

.category-btn i {
    font-size: 1.2rem;
}

/* ---- Why choose style cards ---- */
.feature-card {
    display: block;
    padding: 32px 20px;
    background: #fff;
    border-radius: 14px;
    text-decoration: none;
    color: inherit;
    box-shadow: 0 4px 15px rgba(0,0,0,0.06);
    transition: transform .2s ease, box-shadow .2s ease;
}

.feature-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 24px rgba(0,0,0,0.12);
}

.feature-icon i {
    font-size: 42px;
    color: var(--cft-navy);
}

.feature-photo {
    width: 270px;
    height: 200px;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}




/* ---------------------------------------------
   4. 特選車カード（BMW Premium Selection）
--------------------------------------------- */

.car-card {
    border-radius: 12px;
    overflow: hidden;
    border: none;
    background: #ffffff;
    box-shadow: 0 8px 22px rgba(0,0,0,0.08);
    transition: all .25s ease;
}

.car-card img {
    height: 450px;
    object-fit: cover;
}

.car-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 28px rgba(0,0,0,0.15);
}

.car-card .card-body {
    padding: 24px 26px;
}

.price-tag {
    font-size: 1.4rem;
    font-weight: 700;
    color: #C6292F;
    letter-spacing: 0.02em;
}


/* ---------------------------------------------
   5. 店舗案内・スタッフ・会社情報
--------------------------------------------- */

.shop-section {
    background: linear-gradient(90deg, #ffffff 0%, #f8f9fb 40%, #eef1f5 100%);
}

.staff-card {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    border: none;
    overflow: hidden;
    height: 550px;
}

.staff-photo {
    width: 100%;
    height: 320px;           /* ← 高さを固定（変更OK） */
    object-fit: cover;       /* ← トリミングしてフィット */
    object-position: center; /* ← 中央を基準に切り抜き */
    background-size: cover;
    background-position: center;
    border-bottom: 0;
}


.card-body {
    padding: 20px;
}

.company-section {
    background-color: var(--cft-navy);
    color: #f9fafb;
}

.company-section .accent {
    color: var(--cft-gold);
    font-weight: 600;
}

.company-table th { width: 120px; color:rgb(30, 30, 31); font-weight: 600; }
.company-table td { color:rgb(28, 30, 31); }


</style>
@endpush



@section('content')

{{-- =====================================
      ① HERO：スライダー
===================================== --}}
<div class="swiper heroSwiper mb-5">
  <div class="swiper-wrapper">

    {{-- 1枚目：VISION（展望） --}}
    <div class="swiper-slide">
        <div class="hero-frame">
            <div class="hero-media" style="background-image:url('/images/hero2.jpg')"></div>

            <div class="hero-copy">
                <div class="hero-kicker">VISION</div>
                <h1 class="hero-headline">価格以上の安心を提供する、<br/>信頼の店へ</h1>
            </div>
        </div>
    </div>

    {{-- 2枚目：MISSION（使命） --}}
    <div class="swiper-slide">
        <div class="hero-frame">
            <div class="hero-media" style="background-image:url('/images/hero.jpg')"></div>

            <div class="hero-copy">
            <div class="hero-kicker">MISSION</div>
            <h2 class="hero-headline">”低価格市場の基準”を<br/>引き上げる</h2>
            </div>
        </div>
    </div>

    {{-- 3枚目：VALUE（行動指針） --}}
    <div class="swiper-slide">
        <div class="hero-frame">
            <div class="hero-media" style="background-image:url('/images/hero1.jpg')"></div>

            <div class="hero-copy">
            <div class="hero-kicker">VALUE</div>
            <h2 class="hero-headline">車両品質最優先</h2>
            </div>
        </div>
    </div>

  </div>

  <div class="swiper-pagination"></div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
</div>


{{-- =====================================
      NEW：軽自動車専門 × 低価格宣言
===================================== --}}
<section class="py-5 bg-white">
    <div class="container text-center">

        <h2 class="section-title mb-3">
            SERVICE
        </h2>

        <p class="section-sub mb-5">
            仕入れルートの最適化とコスト削減により、
            高品質な軽自動車をできるだけお求めやすい価格でご提供しています。
        </p>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon mb-3">
                        <i class="fa-solid fa-yen-sign"></i>
                    </div>
                    <h5 class="fw-bold mb-2">無駄なコストを削減</h5>
                    <p class="small text-muted">
                        広告費や中間マージンを抑え、
                        その分を販売価格に還元しています。
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon mb-3">
                        <i class="fa-solid fa-truck"></i>
                    </div>
                    <h5 class="fw-bold mb-2">厳選仕入れ</h5>
                    <p class="small text-muted">
                        オークションや業者間取引を活用し、
                        コストパフォーマンスの高い車両を厳選。
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon mb-3">
                        <i class="fa-solid fa-car"></i>
                    </div>
                    <h5 class="fw-bold mb-2">軽自動車に特化</h5>
                    <p class="small text-muted">
                        軽自動車に集中することで、
                        仕入れ・整備・販売まで効率化を実現。
                    </p>
                </div>
            </div>

        </div>

        <div class="mt-5">

            <div class="buy-lead text-center">
                今すぐお買い得な軽自動車をチェック！
            </div>
            <div class="d-grid gap-3">
                {{-- グーネット --}}
                <a href="https://www.goo-net.com/usedcar_shop/0401923/detail.html"
                target="_blank"
                rel="noopener noreferrer"
                class="buy-cta buy-cta-goo">

                    グーネットで在庫を見る（購入はこちら）
                    <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>
                </a>

                {{-- カーセンサー --}}
                <a href="https://www.carsensor.net/shop/ibaraki/325043001/map/"
                target="_blank"
                rel="noopener noreferrer"
                class="buy-cta buy-cta-cs">

                    カーセンサーで在庫を見る（購入はこちら）
                    <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 

{{-- =====================================
      ② ボディタイプから探す
===================================== --}}
<div class="container py-5">

    <h2 class="section-title text-center mb-2">ボディタイプから探す</h2>
    <p class="section-sub text-center mb-5">軽自動車を中心に、用途に合う一台をお選びいただけます。</p>

    <div class="row g-4 justify-content-center">

        {{-- ちょうどいい軽 --}}
        <div class="col-6 col-md-3">
            <a href="{{ route('cars.search', ['body_type' => 'ちょうどいい軽']) }}" class="feature-card text-center">
                <img src="/images/icons/tyoudoiikei.jpg" class="feature-photo mb-3" alt="ちょうどいい軽">
                <h5 class="fw-bold mb-2">ミドルクラス</h5>
                <p class="text-muted small mb-0">街乗り・通勤にちょうど良い定番タイプ。</p>
            </a>
        </div>

        {{-- 軽スライド --}}
        <div class="col-6 col-md-3">
            <a href="{{ route('cars.search', ['body_type' => '軽スライド']) }}" class="feature-card text-center">
                <img src="/images/icons/kei-slide.jpg" class="feature-photo mb-3" alt="軽スライド">
                <h5 class="fw-bold mb-2">軽スライド</h5>
                <p class="text-muted small mb-0">乗り降りラクで、ファミリーにも人気。</p>
            </a>
        </div>

        {{-- 軽バン、ワゴン --}}
        <div class="col-6 col-md-3">
            <a href="{{ route('cars.search', ['body_type' => '軽バン']) }}" class="feature-card text-center">
                <img src="/images/icons/kei-van.jpg" class="feature-photo mb-3" alt="軽バン">
                <h5 class="fw-bold mb-2">軽バン、ワゴン</h5>
                <p class="text-muted small mb-0">荷物が積める。仕事・趣味に最適。</p>
            </a>
        </div>

        {{-- 普通車 --}}
        <div class="col-6 col-md-3">
            <a href="{{ route('cars.index') }}" class="feature-card text-center">
                <img src="/images/icons/suv.jpg" class="feature-photo mb-3" alt="その他">
                <h5 class="fw-bold mb-2">普通車</h5>
                <p class="text-muted small mb-0">こだわり条件で在庫をチェック。</p>
            </a>
        </div>

    </div>
</div>


{{-- =====================================
      ②-2 メーカーから探す
===================================== --}}
<div class="container pb-5">

    <h2 class="section-title text-center mb-2">メーカーから探す</h2>
    <p class="section-sub text-center mb-5">人気メーカーから、安心の一台を探せます。</p>

    <div class="row g-4 justify-content-center">

        {{-- ホンダ --}}
        <div class="col-6 col-md-3">
            <a href="{{ route('cars.search', ['maker' => 'ホンダ']) }}" class="feature-card text-center">
                <img src="/images/icons/honda.jpg" class="feature-photo mb-3" alt="ホンダ">
                <h5 class="fw-bold mb-2">ホンダ</h5>
                <p class="text-muted small mb-0">走り・安全・使い勝手のバランス。</p>
            </a>
        </div>

        {{-- スズキ --}}
        <div class="col-6 col-md-3">
            <a href="{{ route('cars.search', ['maker' => 'スズキ']) }}" class="feature-card text-center">
                <img src="/images/icons/suzuki.jpg" class="feature-photo mb-3" alt="スズキ">
                <h5 class="fw-bold mb-2">スズキ</h5>
                <p class="text-muted small mb-0">軽の定番。コスパ重視の方に。</p>
            </a>
        </div>

        {{-- ダイハツ --}}
        <div class="col-6 col-md-3">
            <a href="{{ route('cars.search', ['maker' => 'ダイハツ']) }}" class="feature-card text-center">
                <img src="/images/icons/daihatu.jpg" class="feature-photo mb-3" alt="ダイハツ">
                <h5 class="fw-bold mb-2">ダイハツ</h5>
                <p class="text-muted small mb-0">日常にちょうどいい軽が充実。</p>
            </a>
        </div>

        {{-- ニッサン --}}
        <div class="col-6 col-md-3">
            <a href="{{ route('cars.search', ['maker' => '日産']) }}" class="feature-card text-center">
                <img src="/images/icons/nissan.jpg" class="feature-photo mb-3" alt="日産">
                <h5 class="fw-bold mb-2">日産</h5>
                <p class="text-muted small mb-0">信頼性・維持のしやすさで選ぶ。</p>
            </a>
        </div>
    </div>
</div>

-->

{{-- =====================================
      ③ 特選車
===================================== --}}
<!-- 
<div class="container mb-5">
    <h2 class="section-title">特選車</h2>
    <p class="section-sub text-center mb-5">走行距離・装備・状態ともにおすすめできる、厳選の特選車をご紹介します。</p>

    <div class="row g-4">
        @forelse($featuredCars as $car)
        <div class="col-md-4">
            <a href="{{ route('cars.show', $car) }}" class="text-decoration-none text-dark">
                <div class="car-card">
                    <img src="{{ $car->main_image ? asset('storage/' . $car->main_image) : asset('images/noimage.jpg') }}" alt="">

                    <div class="card-body">
                        <span class="badge bg-dark mb-2">{{ $car->maker }}</span>
                        <h5 class="fw-bold mb-1">{{ $car->car_name }}</h5>

                        <div class="d-flex justify-content-between small text-muted mb-2">
                            <span>{{ $car->model_year }}年式</span>
                            <span>{{ number_format($car->mileage) }} km</span>
                        </div>

                        <div class="price-tag mb-1">{{ number_format($car->price) }} 万円</div>
                        <div class="small text-muted">支払総額：{{ number_format($car->total_price ?? $car->price) }} 万円</div>
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
-->



{{-- =====================================
      ④ お知らせ
===================================== --}}
<!-- 
 <div class="container mb-5">
    <h2 class="section-title">お知らせ</h2>
    <p class="section-sub text-center mb-5">キャンペーン・営業案内・新着情報などをお届けします。</p>

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

-->


{{-- =====================================
      ⑤ 店舗案内（地図）
===================================== --}}
<section class="py-5 shop-section">
    <div class="container">

        <h2 class="section-title">STORE</h2>
        <p class="section-sub text-center mb-5">実際におクルマをご覧いただける展示場を併設し、仕上げ品質にこだわった車両をご用意しております。</p>

        <div class="row g-4 align-items-stretch">

            <div class="col-md-6">
                <div class="ratio ratio-4x3 rounded shadow-sm">
                    <iframe
                        src="https://www.google.com/maps?q=茨城県つくば市大井1440-48&output=embed"
                        style="border:0;" allowfullscreen loading="lazy">
                    </iframe>
                </div>
            </div>

            <div class="col-md-6">
                <h5 class="fw-bold mb-3">株式会社カーフレンズツバサ</h5>

                <dl class="row mb-3 small">
                    <dt class="col-3 shop-info-label">所在地</dt>
                    <dd class="col-9">〒300-1243<br>茨城県つくば市大井１４４０−４８</dd>

                    <dt class="col-3 shop-info-label">電話</dt>
                    <dd class="col-9">
                        <a href="tel:0298799474" class="text-decoration-none text-dark fw-bold">029-879-9474</a>
                    </dd>

                    <dt class="col-3 shop-info-label">FAX</dt>
                    <dd class="col-9">
                        <a href="tel:0298799474" class="text-decoration-none text-dark fw-bold">029-879-9478</a>
                    </dd>

                    <dt class="col-3 shop-info-label">営業時間</dt>
                    <dd class="col-9">10:00〜18:00</dd>

                    <dt class="col-3 shop-info-label">定休日</dt>
                    <dd class="col-9">火曜日・水曜日</dd>
                </dl>

                <div class="small text-muted">
                    お越しの際は、事前にお電話またはお問い合わせフォーム(グーネット・カーセンサー)からご来店予約をお願いしております。
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
        <h2 class="section-title">STAFF</h2>
        <p class="section-sub text-center mb-5">
            お客様一人ひとりに寄り添う、カーフレンズツバサのスタッフです。
        </p>

        <div class="row justify-content-center g-4">

            {{-- スタッフ1 --}}
            <div class="col-md-4">
                <div class="staff-card">
                    <div class="staff-photo"
                         style="background-image:url('/images/staff1.jpg')"></div>

                    <div class="card-body">
                        <h6 class="fw-bold mb-1">黒田　翼</h6>
                        <div class="text-muted small mb-2">代表取締役</div>
                        <p class="small mb-0">
                            １０年落ち、１０万ｋｍ以上の車でも出来る限りきれいな車を販売します！これまでに北海道から沖縄の方に車の購入をして頂きましたので日本であれば全国どこでもお取引可能です！遠方の方で現車確認が難しい方は電話、ＴＶ電話、写真などを使用してご納得頂くまでご検討して頂ければと思います。
                        </p>
                    </div>
                </div>
            </div>

            {{-- スタッフ2 --}}
            <div class="col-md-4">
                <div class="staff-card">
                    <div class="staff-photo"
                         style="background-image:url('/images/staff2.jpg')"></div>

                    <div class="card-body">
                        <h6 class="fw-bold mb-1">石山　陽右</h6>
                        <div class="text-muted small mb-2">主任</div>
                        <p class="small mb-0">
                            たくさんのお客様と繋がり、一人でも多くの方に喜んでもらえるように車を販売していきます！「ここで買ってよかった」、「お買い得な買い物が出来た」と言ってもらえるように在庫車のクオリティも上げていきます！
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



{{-- =====================================
      ⑦ 会社情報
===================================== --}}
<section class="py-5 company-section">
    <div class="container">

        <div class="row g-4 align-items-start">

            <div class="col-md-6">
                <h3 class="fw-bold mb-3"><span class="accent">株式会社カーフレンズツバサ</span> について</h3>
                <p class="mb-3">私たちは、単に「車を販売する」だけではなく、お客様の人生に寄り添う「カーライフパートナー」でありたいと考えています。</p>
                <p class="mb-3">ご購入前からご納車・整備・次のお乗り換えまで、長く安心してお付き合いいただけるようサポートいたします。</p>
            </div>

            <div class="col-md-6">
                <table class="table table-borderless company-table small mb-0">
                    <tbody>
                        <tr><th>会社名</th><td>株式会社カーフレンズツバサ</td></tr>
                        <tr><th>所在地</th><td>〒300-1243<br>茨城県つくば市大井１４４０−４８</td></tr>
                        <tr><th>電話番号</th><td>029-879-9474</td></tr>
                        <tr><th>FAX</th><td>029-879-9478</td></tr>
                        <tr><th>事業内容</th><td>中古自動車販売 / 自動車買取 / 車検・点検・整備</td></tr>
                        <tr><th>対応エリア</th><td>つくば市を中心に、茨城県全域・近隣エリア</td></tr>
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

        <h3 class="fw-bold mb-3">
            軽自動車の在庫一覧・購入は各ポータルサイトからご覧いただけます。
        </h3>

        <div class="d-flex justify-content-center gap-3 flex-wrap">

            {{-- グーネット --}}
            <a href="https://www.goo-net.com/usedcar_shop/0401923/detail.html"
            target="_blank"
            rel="noopener noreferrer"
            class="btn btn-lg px-4 fw-bold buy-cta-goo">

                <i class="fa-solid fa-car me-2"></i>
                購入はこちら（グーネット）
                <i class="fa-solid fa-arrow-up-right-from-square ms-2 small"></i>
            </a>

            {{-- カーセンサー --}}
            <a href="https://www.carsensor.net/shop/ibaraki/325043001/map/"
            target="_blank"
            rel="noopener noreferrer"
            class="btn btn-lg px-4 fw-bold buy-cta-cs">

                <i class="fa-solid fa-car-side me-2"></i>
                購入はこちら（カーセンサー）
                <i class="fa-solid fa-arrow-up-right-from-square ms-2 small"></i>
            </a>

        </div>

        <div class="small text-muted mt-3">
            ※在庫状況は各ポータルサイトにて随時更新しております。
        </div>

    </div>
</section>

@endsection



@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
/* ==========================
   HERO (buddica寄り)
   - fade + crossFade
   - speedを上げてヌルっと
   - KenBurnsを毎回確実に再始動
========================== */
const heroEl = document.querySelector(".heroSwiper");

const heroSwiper = new Swiper(heroEl, {
  loop: true,
  effect: "fade",
  fadeEffect: { crossFade: true },

  speed: 2000, // ふわっと切り替え
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
    pauseOnMouseEnter: true,
  },

  pagination: {
    el: ".heroSwiper .swiper-pagination",
    clickable: true,
  },

  navigation: {
    nextEl: ".heroSwiper .swiper-button-next",
    prevEl: ".heroSwiper .swiper-button-prev",
  },

  // 触っても気持ちいい設定
  grabCursor: true,
  watchSlidesProgress: true,

  on: {
    init(swiper) {
      restartKenBurns(swiper);
    },
    slideChangeTransitionStart(swiper) {
      restartKenBurns(swiper);
    },
    resize(swiper) {
      restartKenBurns(swiper);
    }
  }
});

/* KenBurnsの「毎回リスタート」用
   CSSアニメは同じclassだと再始動しないことがあるので
   animationを一度外して付け直す */
function restartKenBurns(swiper) {
  swiper.slides.forEach((slide) => {
    const media = slide.querySelector(".hero-media");
    if (!media) return;

    // 一旦アニメを外して強制reflow
    media.style.animation = "none";
    media.offsetHeight; // reflow

    // active slideだけ再付与（CSS側でも付くが保険で確実に）
    if (slide.classList.contains("swiper-slide-active")) {
      media.style.animation = "kenburns-media 6s ease-out both";
    } else {
      media.style.animation = "none";
    }
  });
}



/* お知らせ：存在するときだけ（安全） */
if (document.querySelector(".newsSwiper")) {
  new Swiper(".newsSwiper", {
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
}

</script>
@endpush
