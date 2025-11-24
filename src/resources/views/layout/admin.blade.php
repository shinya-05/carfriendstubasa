<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | 管理画面 - カーフレンズツバサ</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: 'Noto Sans JP', sans-serif;
            background-color: #f5f6f8;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            background-color: #1b4d8c;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 1rem;
        }

        .sidebar .nav-link {
            color: #e3e3e3;
            padding: 0.8rem 1rem;
            border-radius: 4px;
            margin: 0.2rem 0;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #153b6b;
            color: #fff;
        }

        .main {
            margin-left: 240px;
            padding: 2rem;
        }

        .card-shadow {
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        footer {
            margin-top: 3rem;
            font-size: 0.85rem;
            color: #999;
        }
    </style>

    @stack('styles')
</head>

<body>

    {{-- サイドバー --}}
    <div class="sidebar d-flex flex-column">
        <div class="px-3 mb-3">
            <h5 class="fw-bold">Car Friends Tsubasa</h5>
            <small>管理画面</small>
        </div>

        <nav class="nav flex-column px-2">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                <i class="fa-solid fa-gauge-high me-2"></i> ダッシュボード
            </a>

            <a href="{{ route('admin.cars.index') }}" class="nav-link {{ request()->is('admin/cars*') ? 'active' : '' }}">
                <i class="fa-solid fa-car-side me-2"></i> 在庫管理
            </a>

            <a href="{{ route('admin.news.index') }}" class="nav-link {{ request()->is('admin/news*') ? 'active' : '' }}">
                <i class="fa-solid fa-newspaper me-2"></i> お知らせ
            </a>

            <a href="{{ route('admin.inquiries.index') }}" class="nav-link {{ request()->is('admin/inquiries*') ? 'active' : '' }}">
                <i class="fa-solid fa-envelope-open-text me-2"></i> お問い合わせ
            </a>

            <a href="{{ route('admin.assessments.index') }}" class="nav-link {{ request()->is('admin/assessments*') ? 'active' : '' }}">
                <i class="fa-solid fa-handshake-angle me-2"></i> 査定管理
            </a>
        </nav>

        <div class="mt-auto px-3 pb-3">
            <a href="#" class="nav-link text-white">
                <i class="fa-solid fa-right-from-bracket me-2"></i> ログアウト
            </a>
        </div>
    </div>

    {{-- メインコンテンツ --}}
    <div class="main">
        <h4 class="fw-bold mb-4">@yield('title')</h4>

        @yield('content')

        <footer class="text-center">
            © {{ date('Y') }} Car Friends Tsubasa 管理画面
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
