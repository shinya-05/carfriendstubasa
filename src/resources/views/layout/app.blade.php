<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'カーフレンズツバサ')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

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

        /* ヘッダー */
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
        footer {
            background-color: #003060;
            color: #fff;
            padding: 20px 0;
            margin-top: 50px;
        }
    </style>

    @stack('styles')
</head>
<body>

{{-- ナビゲーション --}}
<nav class="navbar navbar-expand-lg navbar-custom sticky-top py-2">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Car Friends Tsubasa
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ms-auto" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'text-primary' : '' }}"
                       href="/">ホーム</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('cars*') ? 'text-primary' : '' }}"
                       href="{{ route('cars.index') }}">在庫一覧</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('news*') ? 'text-primary' : '' }}"
                       href="{{ route('news.index') }}">お知らせ</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'text-primary' : '' }}"
                       href="{{ route('contact.form') }}">お問い合わせ</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('assessment') ? 'text-primary' : '' }}"
                       href="{{ route('assessment.form') }}">買取査定</a>
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
<footer>
    <div class="container text-center">
        <div class="mb-1">© {{ date('Y') }} Car Friends Tsubasa</div>
        <small>千葉県〇〇市 / 中古車販売・買取・整備</small>
    </div>
</footer>

{{-- JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>
