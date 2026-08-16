<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'カーフレンズツバサ')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    </style>

    @stack('styles')
</head>
<body>

{{-- ナビゲーション --}}
<nav class="navbar navbar-expand-lg cft-nav fixed-top py-3">
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
          </div>

          <div class="footer-social">
            <a href="https://youtube.com/@carfriendstsubasa3350?si=W3CV3O9fj8GPVvHy" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
            <a href="https://www.instagram.com/car_friends_tsubasa?igsh=MWpxdjYwYnRuaTdqOQ%3D%3D&utm_source=qr" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="footer-nav">
            

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
      <div>茨城県土浦市 / 中古車販売・買取・整備</div>
    </div>
  </div>
</footer>

{{-- JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('floatingAssessmentBtn');
    const showPoint = 300; // スクロール量

    window.addEventListener('scroll', () => {
        if (window.scrollY > showPoint) {
            btn.classList.remove('floating-cta--hidden');
            btn.classList.add('floating-cta--show');
        } else {
            btn.classList.remove('floating-cta--show');
            btn.classList.add('floating-cta--hidden');
        }
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const nav = document.querySelector('.cft-nav');
  if (!nav) return;

  const threshold = 40;
  const onScroll = () => {
    nav.classList.toggle('is-scrolled', window.scrollY > threshold);
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

{{-- スクロール表示：買取査定CTA --}}
<a href="{{ route('assessment.form') }}" 
   class="floating-cta floating-cta--hidden"
   id="floatingAssessmentBtn">
    <i class="fa-solid fa-car-side me-2"></i>
    買取査定（軽自動車限定）はこちら
</a>


</body>
</html>
