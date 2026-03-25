@extends('layout.app')
@section('title', '沿革 | カーフレンズツバサ')

@push('styles')
<style>
    .page-head {
        background: #fff;
        border-bottom: 1px solid #e6e6e6;
        margin-top: 120px;
    }

    .kicker {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        color: #666;
        font-weight: 700;
        letter-spacing: .04em;
        font-size: .95rem;
    }
    .kicker-dots {
        display: inline-grid;
        grid-template-columns: repeat(2, 6px);
        grid-auto-rows: 6px;
        gap: 4px;
    }
    .kicker-dots span {
        display:block; width:6px; height:6px; border-radius:2px;
        background:#2aa7df;
    }
    .kicker-dots span:nth-child(2){ background:#2aa7df; }
    .kicker-dots span:nth-child(3){ background:#2aa7df; }
    .kicker-dots span:nth-child(4){ background:#2aa7df; }

    .page-title {
        font-size: 2rem;
        font-weight: 800;
        letter-spacing: .06em;
        margin-top: .35rem;
        margin-bottom: 0;
        color: #222;
    }

    .content-box {
        background: #fff;
        border: 1px solid #e6e6e6;
        padding: 28px 26px;
    }

    /* タイムライン */
    .timeline {
        position: relative;
        padding-left: 30px;
    }
    .timeline::before {
        content:"";
        position:absolute;
        left:8px;
        top:0;
        bottom:0;
        width:2px;
        background:#ddd;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 32px;
    }

    .timeline-item::before {
        content:"";
        position:absolute;
        left:-22px;
        top:6px;
        width:12px;
        height:12px;
        background:#e54b4b;
        border-radius:50%;
    }

    .timeline-year {
        font-weight: 900;
        color:#222;
        margin-bottom:6px;
        letter-spacing:.05em;
    }

    .timeline-text {
        color:#555;
        line-height:1.9;
    }

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
    .side-list a.active {
        color:#0d6efd;
    }
    .side-list a.active::before{
        background:#0d6efd;
    }

    @media (max-width: 991px){
        .side-box{
            border-left:none;
            padding-left:0;
            border-top:1px solid #e6e6e6;
            padding-top:18px;
        }
        .side-list a::before{ left:0; }
    }
</style>
@endpush

@section('content')
<section class="page-head py-4 py-lg-5">
    <div class="container">
        <div class="kicker">
            <span class="kicker-dots">
                <span></span><span></span><span></span><span></span>
            </span>
            会社情報
        </div>
        <h1 class="page-title">沿革</h1>
    </div>
</section>

<section class="py-4 py-lg-5">
    <div class="container">
        <div class="row g-4 g-lg-5">
            {{-- 左：沿革タイムライン --}}
            <div class="col-lg-8">
                <div class="content-box">
                    <div class="timeline">

                        <div class="timeline-item">
                            <div class="timeline-year">2022年</div>
                            <div class="timeline-text">
                                CAR FRIENDS TSUBASA 創業（個人事業主）<br>
                                自宅兼事務所にて在庫5台からスタート。<br/>
                                ロープライス軽自動車に特化し、「安いから仕方ない」という常識を変えるべく、仕上げ品質を重視した販売を開始。
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-year">2023年</div>
                            <div class="timeline-text">
                                事業拡大に伴い、つくば市大井へ移転。<br>
                                展示場を構え、在庫台数を拡充。<br/>
                                人員体制を強化し、販売・仕上げ体制を整備。
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-year">2024年12月</div>
                            <div class="timeline-text">
                                株式会社カーフレンズツバサ 設立。<br>
                                ロープライス車市場の基準を引き上げるべく法人化。
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-year">2025年2月</div>
                            <div class="timeline-text">
                                法人として本格稼働開始。<br>
                                在庫台数60台規模へ拡大し、体制強化と品質向上を推進。<br/><br/>

                                現在は、ロープライス車市場の基準を引き上げるべく、<br/>
                                品質と信頼を積み重ねています。<br/><br/>

                                私たちは、ロープライス市場の信頼を積み上げる存在であり続けます。
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