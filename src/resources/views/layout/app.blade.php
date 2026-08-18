<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'カーフレンズツバサ')</title>
    <meta name="description" content="@yield('meta_description', '茨城県つくば市の軽自動車専門店カーフレンズツバサ。中古車販売・買取・車検・点検・整備に対応します。')">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:site_name" content="カーフレンズツバサ">
    <meta property="og:title" content="@yield('title', 'カーフレンズツバサ')">
    <meta property="og:description" content="@yield('meta_description', '茨城県つくば市の軽自動車専門店カーフレンズツバサ。')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/hero2.jpg') }}">

    @if(config('services.google_analytics.measurement_id'))
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.measurement_id') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', @json(config('services.google_analytics.measurement_id')));
        </script>
    @endif

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">

    {{-- Icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    {{-- Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <style>
        body {
            font-family: 'Noto Sans JP', sans-serif;
            background-color: #f8f9fa;
        }

        /* ヒーローに重なるヘッダー */
        .cft-nav{
        background: transparent;
        transition: background .25s ease, box-shadow .25s ease, padding .25s ease;
        }
        .cft-nav .nav-link{ color: rgba(255,255,255,.92) !important; font-weight:800; letter-spacing:.08em; }
        .cft-nav .nav-link:hover{ color:#fff !important; opacity:.9; }
        .cft-nav .navbar-toggler-icon{ filter: invert(1); }

        /* スクロール後：白ヘッダー */
        .cft-nav.is-scrolled{
        background: rgba(255,255,255,.96);
        box-shadow: 0 10px 30px rgba(0,0,0,.12);
        backdrop-filter: blur(10px);
        padding-top: .65rem;
        padding-bottom: .65rem;
        }
        .cft-nav.is-scrolled .nav-link{ color: #0B2C56 !important; }
        .cft-nav.is-scrolled .navbar-toggler-icon{ filter:none; }

        .navbar-brand {
            font-size: 1.4rem;
            font-weight: bold;
            color: #003060 !important;
        }

        .navbar-custom {
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
        }

        .navbar-nav .nav-link {
            font-weight: 600;
            color: #003060 !important;
        }

        .navbar-nav .nav-link:hover {
            color: #0d6efd !important;
        }

        /* フッター */
        .cft-footer{
            position: relative;
            margin-top: 70px;
            color: #fff;
            overflow: hidden;
        }

        .cft-footer::before{
            content:"";
            position:absolute;
            inset:0;
            background:
                linear-gradient(180deg, rgba(0,0,0,.70) 0%, rgba(0,0,0,.75) 55%, rgba(0,0,0,.85) 100%),
                url("/images/hero4.jpg");
            background-size: cover;
            background-position: center;
            transform: scale(1.02);
            z-index: 0;
        }

        .cft-footer .footer-inner{
            position: relative;
            z-index: 1;
            padding: 56px 0 28px;
        }

        .cft-footer .footer-brand{
            display:flex;
            align-items:center;
            gap: 14px;
            margin-bottom: 14px;
        }

        .cft-footer .footer-logo{
            height: 44px;
            width: auto;
            object-fit: contain;
            filter: brightness(1.1);
        }

        .cft-footer .footer-desc{
            color: rgba(255,255,255,.85);
            line-height: 1.9;
            margin: 14px 0 22px;
            font-size: .95rem;
        }

        .cft-footer .footer-tagline{
            font-weight: 900;
            letter-spacing: .06em;
            font-size: 1.15rem;
            margin: 10px 0 14px;
        }

        .cft-footer .footer-social{
            display:flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .cft-footer .footer-social a{
            width: 42px;
            height: 42px;
            border-radius: 999px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            border: 1px solid rgba(255,255,255,.25);
            color: #fff;
            text-decoration: none;
            transition: transform .2s ease, background .2s ease, border-color .2s ease, opacity .2s ease;
        }

        .cft-footer .footer-social a:hover{
            transform: translateY(-3px);
            background: rgba(255,255,255,.10);
            border-color: rgba(255,255,255,.45);
        }

        .cft-footer .footer-nav{
            display:grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .cft-footer .footer-nav h6{
            font-weight: 900;
            letter-spacing: .12em;
            font-size: .85rem;
            margin-bottom: 14px;
            color: rgba(255,255,255,.92);
        }

        .cft-footer .footer-nav a{
            display:inline-block;
            padding: 7px 0;
            color: rgba(255,255,255,.82);
            text-decoration: none;
            border-bottom: 1px solid rgba(255,255,255,.12);
            width: 100%;
            transition: color .2s ease, border-color .2s ease, transform .2s ease;
        }

        .cft-footer .footer-nav a:hover{
            color:#fff;
            border-color: rgba(255,255,255,.35);
            transform: translateX(2px);
        }

        .cft-footer .footer-bottom{
            position: relative;
            z-index: 1;
            border-top: 1px solid rgba(255,255,255,.12);
            padding: 14px 0;
            color: rgba(255,255,255,.70);
            font-size: .85rem;
        }

        @media (max-width: 991px){
        .cft-footer .footer-inner{ padding: 44px 0 18px; }
        .cft-footer .footer-nav{ grid-template-columns: repeat(2, minmax(0, 1fr)); margin-top: 28px; }
        }

        @media (max-width: 575px){
        .cft-footer .footer-nav{ grid-template-columns: 1fr; }
        }

        /* ===============================
   中央表示 固定CTA（大型）
================================ */
    .floating-cta{
        position: fixed;
        left: 50%;
        bottom: 80px;          /* 少し下寄り中央 */
        transform: translateX(-50%) translateY(20px);

        z-index: 9999;

        display: inline-flex;
        align-items: center;
        gap: 14px;

        padding: 22px 40px;
        border-radius: 999px;

        background: linear-gradient(
            135deg,
            #0B2C56,
            #163f7a
        );

        color: #fff;
        font-size: 1.25rem;
        font-weight: 800;
        letter-spacing: .05em;
        text-decoration: none;

        box-shadow: 0 18px 40px rgba(0,0,0,.35);

        transition:
            opacity .3s ease,
            transform .35s ease,
            box-shadow .25s ease;
    }

    /* 初期非表示 */
    .floating-cta--hidden{
        opacity: 0;
        pointer-events: none;
    }

    /* 表示状態 */
    .floating-cta--show{
        opacity: 1;
        pointer-events: auto;
        transform: translateX(-50%) translateY(0);
    }

    .floating-cta:hover{
        color: #fff;
        transform: translateX(-50%) translateY(-4px);
        box-shadow: 0 24px 60px rgba(0,0,0,.45);
    }

    /* スマホ用（さらに目立たせる） */
    @media (max-width: 767px){
    .floating-cta{
        width: calc(100% - 32px);
        justify-content: center;
        font-size: 1.1rem;
        padding: 18px 20px;
        bottom: 24px;
    }
    }

    .mobile-action-bar{ display:none; }
    .cft-nav:not(.is-scrolled) .navbar-nav .nav-link{ color:rgba(255,255,255,.94) !important; }

    @media (max-width: 991px){
        .cft-nav .navbar-brand img{ height:58px !important; }
        .cft-nav .navbar-collapse.show,
        .cft-nav .navbar-collapse.collapsing{
            margin-top:10px;
            padding:14px 18px;
            border-radius:10px;
            background:rgba(255,255,255,.98);
            box-shadow:0 14px 32px rgba(0,0,0,.18);
        }
        .cft-nav .navbar-collapse.show .nav-link,
        .cft-nav .navbar-collapse.collapsing .nav-link{ color:#0B2C56 !important; }
    }

    @media (max-width: 767px){
        body{ padding-bottom:68px; }
        .mobile-action-bar{
            position:fixed;
            z-index:10000;
            left:0;
            right:0;
            bottom:0;
            display:grid;
            grid-template-columns:repeat(3,1fr);
            min-height:68px;
            padding-bottom:env(safe-area-inset-bottom);
            background:#fff;
            border-top:1px solid #dce2e8;
            box-shadow:0 -8px 24px rgba(9,41,79,.13);
        }
        .mobile-action-bar a{
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            gap:4px;
            color:#0B2C56;
            font-size:.75rem;
            font-weight:900;
            text-decoration:none;
            border-right:1px solid #e8edf1;
        }
        .mobile-action-bar a:last-child{ border-right:0; background:#c9272c; color:#fff; }
        .mobile-action-bar i{ font-size:1.05rem; }
    }

    </style>

    @stack('head')
    @stack('styles')
</head>
<body class="{{ request()->is('/') ? 'is-home' : 'is-inner' }}">

{{-- ナビゲーション --}}
<nav class="navbar navbar-expand-lg cft-nav fixed-top py-3 {{ request()->is('/') ? '' : 'is-scrolled' }}">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.jpg') }}"
                alt="Car Friends Tsubasa"
                style="height: 80px; width: auto; object-fit: contain;">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ms-auto" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'text-primary' : '' }}"
                       href="/">HOME</a>
                </li>
                @if(request()->is('/'))
                <li class="nav-item"><a class="nav-link" href="#inventory">STOCK</a></li>
                <li class="nav-item"><a class="nav-link" href="#quality">QUALITY</a></li>
                <li class="nav-item"><a class="nav-link" href="#store">STORE</a></li>
                @endif
<!--
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('cars*') ? 'text-primary' : '' }}"
                       href="{{ route('cars.index') }}">在庫一覧</a>
                </li>
-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('company/*') ? 'text-primary' : '' }}"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        COMPANY
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item {{ request()->is('company/president') ? 'active' : '' }}"
                            href="{{ route('company.president') }}">
                                代表挨拶
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->is('company/profile') ? 'active' : '' }}"
                            href="{{ route('company.profile') }}">
                                会社概要
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->is('company/history') ? 'active' : '' }}"
                            href="{{ route('company.philosophy') }}">
                                企業理念
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->is('company/history') ? 'active' : '' }}"
                            href="{{ route('company.history') }}">
                                沿革
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'text-primary' : '' }}"
                       href="{{ route('contact.form') }}">CONTACT</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('assessment') ? 'text-primary' : '' }}"
                       href="{{ route('assessment.form') }}">ASSESSMENT</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

{{-- メインコンテンツ --}}
<main>
    @yield('content')
</main>

{{-- フッター --}}
<footer class="cft-footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row g-4 g-lg-5 align-items-start">
        <div class="col-lg-5">
          <div class="footer-brand">
            <img class="footer-logo" src="{{ asset('images/logo.jpg') }}" alt="Car Friends Tsubasa">
          </div>

          <div class="footer-desc">
            軽自動車専門のロープライス車を中心に、仕入れ・整備・販売まで一貫してご提供します。<br>
            “価格以上の安心” をお届けします。
            <div class="mt-3">〒300-1243 茨城県つくば市大井1440-48<br>
            <a class="text-white" href="tel:0298799474">TEL 029-879-9474</a> ／ 10:00〜18:00（火・水曜定休）</div>
          </div>

          <div class="footer-social">
            <a href="https://youtube.com/@carfriendstsubasa3350?si=W3CV3O9fj8GPVvHy" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
            <a href="https://www.instagram.com/car_friends_tsubasa?igsh=MWpxdjYwYnRuaTdqOQ%3D%3D&utm_source=qr" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="footer-nav">
            

            <div>
              <h6>STOCK</h6>
              <a href="https://www.goo-net.com/usedcar_shop/0401923/stock.html" target="_blank" rel="noopener noreferrer">グーネット在庫</a>
              <a href="https://www.carsensor.net/shop/ibaraki/325043001/stocklist/" target="_blank" rel="noopener noreferrer">カーセンサー在庫</a>
              <a href="{{ url('/#store') }}">店舗案内</a>
            </div>

            <div>
              <h6>COMPANY</h6>
              <a href="{{ route('company.president') }}">代表挨拶</a>
              <a href="{{ route('company.profile') }}">会社概要</a>
              <a href="{{ route('company.philosophy') }}">企業理念</a>
              <a href="{{ route('company.history') }}">沿革</a>
            </div>

            <div>
              <h6>CONTACT</h6>
              <a href="{{ route('contact.form') }}">お問い合わせ</a>
              <a href="{{ route('assessment.form') }}">買取査定</a>
              <a href="{{ route('privacy-policy') }}">プライバシーポリシー</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="footer-bottom">
    <div class="container d-flex flex-column flex-md-row justify-content-between gap-2">
      <div>© {{ date('Y') }} Car Friends Tsubasa</div>
      <div>茨城県つくば市 / 中古車販売・買取・整備</div>
    </div>
  </div>
</footer>

{{-- JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const nav = document.querySelector('.cft-nav');
  if (!nav) return;

  const threshold = 40;
  const onScroll = () => {
    nav.classList.toggle('is-scrolled', document.body.classList.contains('is-inner') || window.scrollY > threshold);
  };
  onScroll();
  window.addEventListener('scroll', onScroll);
});
</script>



@stack('scripts')

@if(config('services.google_analytics.measurement_id'))
<script>
document.addEventListener('DOMContentLoaded', () => {
    const sendEvent = (name, params = {}) => {
        if (typeof window.gtag === 'function') {
            window.gtag('event', name, params);
        }
    };

    document.addEventListener('click', (event) => {
        const link = event.target.closest('a[href]');
        if (!link) return;

        const href = link.href;
        if (href.startsWith('tel:')) {
            sendEvent('click_to_call', { link_url: href, link_text: link.textContent.trim() });
            return;
        }

        if (href.includes('goo-net.com')) {
            sendEvent('outbound_inventory_click', { destination: 'goo_net', link_url: href });
            return;
        }

        if (href.includes('carsensor.net')) {
            sendEvent('outbound_inventory_click', { destination: 'carsensor', link_url: href });
            return;
        }

        if (href.includes('instagram.com') || href.includes('youtube.com')) {
            sendEvent('social_click', {
                destination: href.includes('instagram.com') ? 'instagram' : 'youtube',
                link_url: href
            });
        }
    });

    @if(session('analytics_event'))
        sendEvent(
            @json(session('analytics_event.name')),
            @json(session('analytics_event.params', []))
        );
    @endif
});
</script>
@endif

<nav class="mobile-action-bar" aria-label="お問い合わせメニュー">
    <a href="https://www.goo-net.com/usedcar_shop/0401923/stock.html" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-car"></i><span>在庫</span></a>
    <a href="tel:0298799474"><i class="fa-solid fa-phone"></i><span>電話</span></a>
    <a href="{{ route('contact.form') }}"><i class="fa-regular fa-calendar-check"></i><span>来店相談</span></a>
</nav>


</body>
</html>
