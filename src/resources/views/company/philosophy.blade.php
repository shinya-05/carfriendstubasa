@extends('layout.app')
@section('title', '企業理念 | カーフレンズツバサ')

@push('styles')
<style>
    /* ===== 会社情報ページ共通トーン（画像寄せ） ===== */
    .page-head { 
        background:#fff; border-bottom:1px solid #e6e6e6; 
        margin-top: 120px;
    }

    .kicker{
        display:inline-flex; align-items:center; gap:.5rem;
        color:#666; font-weight:700; letter-spacing:.04em; font-size:.95rem;
    }
    .kicker-dots{
        display:inline-grid; grid-template-columns:repeat(2,6px);
        grid-auto-rows:6px; gap:4px;
    }
    .kicker-dots span{ display:block; width:6px; height:6px; border-radius:2px; background:#2aa7df; }
    .kicker-dots span:nth-child(2){ background:#2aa7df; }
    .kicker-dots span:nth-child(3){ background:#2aa7df; }
    .kicker-dots span:nth-child(4){ background:#2aa7df; }

    .page-title{
        font-size:2rem; font-weight:800; letter-spacing:.06em;
        margin-top:.35rem; margin-bottom:0; color:#222;
    }

    /* 左本文 */
    .content-box{
        background:#fff;
        border:1px solid #e6e6e6;
        padding:28px 26px;
    }

    /* 理念セクション（薄め＋装飾） */
    .philosophy-wrap{
        background: linear-gradient(135deg, #f4f7fb 0%, #eaf0f7 100%);
        border: 1px solid #e6e6e6;
        border-radius: 16px;
        padding: 28px 22px;
        position: relative;
        overflow: hidden;
    }
    .philosophy-wrap::before{
        content:"";
        position:absolute;
        width:460px; height:460px;
        background: radial-gradient(circle, rgba(11,44,86,0.06) 0%, transparent 70%);
        top:-160px; right:-160px;
    }

    .philosophy-main{
        position:relative;
        color:#0B2C56;
    }
    .philosophy-catch{
        font-size:1.6rem;
        font-weight:900;
        letter-spacing:.06em;
        margin-bottom:10px;
    }
    .philosophy-desc{
        color:#555;
        line-height:1.95;
        margin-bottom:0;
    }

    .mvv-grid{ margin-top: 22px; }
    .mvv-card{
        background:#fff;
        border:1px solid #e4e8ee;
        border-radius:14px;
        padding:22px 18px;
        box-shadow:0 6px 18px rgba(0,0,0,0.05);
        height:100%;
        transition: all .25s ease;
    }
    .mvv-card:hover{
        transform: translateY(-4px);
        box-shadow:0 12px 26px rgba(0,0,0,0.10);
    }
    .mvv-label{
        font-size:.8rem;
        letter-spacing:.16em;
        font-weight:800;
        color:#C9A14C;
        margin-bottom:8px;
    }
    .mvv-title{
        font-weight:900;
        color:#222;
        margin-bottom:8px;
    }
    .mvv-text{
        color:#555;
        line-height:1.9;
        font-size:.95rem;
        margin-bottom:0;
    }

    .value-list{
        margin: 10px 0 0;
        padding-left: 18px;
        color:#555;
        line-height:1.95;
        font-size:.95rem;
        list-style:none;
    }

    @media (max-width: 991px){
        .content-box{ padding:22px 18px; }
        .philosophy-wrap{ padding:22px 18px; }
    }

    .philo-block{
        padding: 36px 0;
        border-top: 1px solid #eee;
    }
    .philo-block:first-child{
        padding-top: 0;
        border-top: none;
    }

    .philo-media{
        border-radius: 14px;
        overflow: hidden;
        background: #f3f4f6;
        box-shadow: 0 10px 26px rgba(0,0,0,.08);
    }

    .philo-media img{
        width: 100%;
        height: 360px;
        object-fit: cover;
        display: block;
    }

    .philo-title{
        font-weight: 900;
        letter-spacing: .04em;
        font-size: 1.5rem;
        color: #222;
        margin-bottom: 8px;
    }

    .philo-sub{
        font-weight: 800;
        letter-spacing: .18em;
        font-size: .78rem;
        color: #C9A14C;
        margin-bottom: 14px;
        text-transform: uppercase;
    }

    .philo-text{
        color: #555;
        line-height: 2.0;
        font-size: 1rem;
        margin: 0;
    }

    .philo-list{
        margin: 14px 0 0;
        padding-left: 0;
        list-style: none;
        color:#555;
        line-height: 2.0;
        font-size: 1rem;
    }
    .philo-list li{
        padding: 8px 0;
        border-bottom: 1px dashed #e6e6e6;
    }
    .philo-list li:last-child{
        border-bottom: none;
    }

    @media (max-width: 991px){
        .philo-media img{ height: 260px; }
        .philo-block{ padding: 26px 0; }
    }

    /* 右サイドナビ */
    .side-box {
        background: #fff;
        border-left: 1px solid #e6e6e6;
        padding-left: 22px;
    }
    .side-heading {
        font-weight: 900;
        letter-spacing: .08em;
        color: #0d6efd;
        font-size: .9rem;
    }
    .side-title {
        font-weight: 900;
        font-size: 1.25rem;
        color:#222;
        margin-top: .25rem;
    }
    .side-list {
        margin-top: 18px;
        padding-left: 0;
        list-style: none;
        border-top: 1px solid #eee;
    }
    .side-list a {
        display: block;
        padding: 12px 6px;
        color: #555;
        text-decoration: none;
        border-bottom: 1px solid #eee;
        font-weight: 700;
        position: relative;
    }
    .side-list a::before{
        content:"";
        position:absolute;
        left:-22px;
        top:0;
        width:3px;
        height:100%;
        background: transparent;
    }
    .side-list a:hover { color:#111; }
    .side-list a.active {
        color: #0d6efd;
    }
    .side-list a.active::before{
        background:#0d6efd;
    }

    @media (max-width: 991px){
        .side-box{
            border-left: none;
            padding-left: 0;
            border-top: 1px solid #e6e6e6;
            padding-top: 18px;
        }
        .side-list a::before{ left:0; }
        .president-head{ flex-direction: column; align-items: flex-start; }
    }
</style>
@endpush

@section('content')
{{-- 見出し --}}
<section class="page-head py-4 py-lg-5">
    <div class="container">
        <div class="kicker">
            <span class="kicker-dots" aria-hidden="true">
                <span></span><span></span><span></span><span></span>
            </span>
            会社情報
        </div>
        <h1 class="page-title">企業理念</h1>
    </div>
</section>

<section class="py-4 py-lg-5">
    <div class="container">
        <div class="row g-4 g-lg-5">

            {{-- 左：理念コンテンツ --}}
            <div class="col-lg-8">
                <div class="content-box">
                    {{-- MVV --}}
                    <div class="content-box">

                        <div class="philo-block">
                            <div class="row g-4 align-items-center">
                                <div class="col-lg-6">
                                    <div class="philo-media">
                                        <img src="{{ asset('images/hero1.jpg') }}" alt="Mission">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="philo-sub">Mission（使命）</div>
                                    <div class="philo-title">ロープライス車市場の基準を引き上げる。</div>
                                    <p class="philo-text">
                                        安いという理由で、期待値を下げさせない。<br>
                                        価格と品質を両立させる市場をつくる。<br>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="philo-block">
                            <div class="row g-4 align-items-center flex-lg-row-reverse">
                                <div class="col-lg-6">
                                    <div class="philo-media">
                                        <img src="{{ asset('images/hero5.jpg') }}" alt="Vision">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="philo-sub">Vision（目指す姿）</div>
                                    <div class="philo-title">価格以上の安心を提供する、信頼の店になる。</div>
                                    <p class="philo-text">
                                        安さで選ばれるのではなく、<br/>
                                        状態と誠実さで選ばれる存在へ。
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="philo-block">
                            <div class="row g-4 align-items-center">
                                <div class="col-lg-6">
                                    <div class="philo-media">
                                        <img src="{{ asset('images/hero1.jpg') }}" alt="Value">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="philo-sub">Value（行動指針）</div>
                                    <div class="philo-title">誠実に、徹底的に、長く続く品質を。</div>

                                    <ul class="philo-list">
                                        <li><strong>1. 車両品質最優先</strong>　価格は戦略、品質は前提。</li>
                                        <li><strong>2. 妥協しない仕上げ</strong>　安さは言い訳にしない。</li>
                                        <li><strong>3. 誠実な説明と透明性</strong>　隠さない。煽らない。押さない。</li>
                                        <li><strong>4. スピードと回転の徹底</strong>　回転も品質の一部。</li>
                                        <li><strong>5. 利益を残す経営</strong>　理想を継続させるために数字を強くする。</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>

            {{-- 右：会社情報メニュー --}}
            <div class="col-lg-4">
                @include('company._side')
            </div>

        </div>
    </div>
</section>
@endsection