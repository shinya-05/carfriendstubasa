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
    <script>
        document.documentElement.classList.add('js');
        window.setTimeout(() => {
            if (!document.documentElement.classList.contains('page-ready')) {
                document.documentElement.classList.remove('js');
            }
        }, 3000);
    </script>

    @if(config('services.google_analytics.measurement_id'))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.measurement_id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){ dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', @json(config('services.google_analytics.measurement_id')));
    </script>
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;700;800;900&family=Zen+Kaku+Gothic+New:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    @stack('head')
    @stack('styles')
</head>
<body class="{{ request()->is('/') ? 'is-home' : 'is-inner' }}">
<div class="scroll-progress" data-scroll-progress aria-hidden="true"></div>

<header class="site-header" data-site-header>
    <div class="site-shell site-header__inner">
        <a class="site-logo" href="{{ url('/') }}" aria-label="カーフレンズツバサ ホーム">
            <img src="{{ asset('images/logo.jpg') }}" alt="">
            <span class="site-logo__text">CAR FRIENDS TSUBASA<small>KEI CAR SPECIALIST</small></span>
        </a>

        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="siteNavigation" aria-label="メニューを開く" data-nav-toggle>
            <span></span><span></span><span></span>
        </button>

        <nav class="site-nav" id="siteNavigation" data-site-nav aria-label="メインメニュー">
            <a href="{{ url('/') }}">HOME</a>
            <a href="{{ url('/#inventory') }}">STOCK</a>
            <a href="{{ url('/#quality') }}">QUALITY</a>
            <a href="{{ url('/#store') }}">STORE</a>
            <details class="site-nav__company">
                <summary>COMPANY</summary>
                <div class="site-nav__menu">
                    <a href="{{ route('company.president') }}">代表挨拶</a>
                    <a href="{{ route('company.profile') }}">会社概要</a>
                    <a href="{{ route('company.philosophy') }}">企業理念</a>
                    <a href="{{ route('company.history') }}">沿革</a>
                </div>
            </details>
            <a href="{{ route('contact.form') }}">CONTACT</a>
            <a href="{{ route('assessment.form') }}">ASSESSMENT</a>
        </nav>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="cft-footer">
    <div class="footer-inner">
        <div class="site-shell footer-grid">
            <div>
                <div class="footer-brand">
                    <img class="footer-logo" src="{{ asset('images/logo.jpg') }}" alt="">
                    <strong>CAR FRIENDS TSUBASA</strong>
                </div>
                <div class="footer-desc">
                    軽自動車専門のロープライス車を中心に、仕入れ・整備・販売まで一貫してご提供します。<br>
                    “価格以上の安心” をお届けします。
                    <div class="mt-3">〒300-1243 茨城県つくば市大井1440-48<br>
                    <a href="tel:0298799474">TEL 029-879-9474</a> ／ 10:00〜18:00（火・水曜定休）</div>
                </div>
                <div class="footer-social">
                    <a href="https://youtube.com/@carfriendstsubasa3350?si=W3CV3O9fj8GPVvHy" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                    <a href="https://www.instagram.com/car_friends_tsubasa?igsh=MWpxdjYwYnRuaTdqOQ%3D%3D&utm_source=qr" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
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
    <div class="footer-bottom">
        <div class="site-shell footer-bottom__inner">
            <span>© {{ date('Y') }} Car Friends Tsubasa</span>
            <span>茨城県つくば市 / 中古車販売・買取・整備</span>
        </div>
    </div>
</footer>

<nav class="mobile-action-bar" aria-label="お問い合わせメニュー">
    <a href="https://www.goo-net.com/usedcar_shop/0401923/stock.html" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-car"></i><span>在庫</span></a>
    <a href="tel:0298799474"><i class="fa-solid fa-phone"></i><span>電話</span></a>
    <a href="{{ route('contact.form') }}"><i class="fa-regular fa-calendar-check"></i><span>来店相談</span></a>
</nav>

@stack('scripts')
<script src="{{ asset('js/site.js') }}"></script>
@if(config('services.google_analytics.measurement_id') && session('analytics_event'))
<script>
    if (typeof window.gtag === 'function') {
        window.gtag('event', @json(session('analytics_event.name')), @json(session('analytics_event.params', [])));
    }
</script>
@endif
</body>
</html>
