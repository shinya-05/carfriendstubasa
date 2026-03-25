@extends('layout.app')
@section('title', '代表挨拶 | カーフレンズツバサ')

@push('styles')
<style>
    /* ===== 会社情報：共通トーン（戸田建設っぽく寄せる） ===== */
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

    /* 左本文カード（白＋罫線） */
    .content-box {
        background: #fff;
        border: 1px solid #e6e6e6;
        padding: 28px 26px;
    }

    .president-head {
        display: flex;
        gap: 18px;
        align-items: center;
        padding-bottom: 18px;
        border-bottom: 1px solid #eee;
        margin-bottom: 18px;
    }
    .president-photo {
        width: 96px; height: 96px;
        border-radius: 999px;
        border: 1px solid #e6e6e6;
        object-fit: cover;
        background: #f4f4f4;
    }
    .president-name {
        font-weight: 900;
        font-size: 1.15rem;
        color: #222;
        letter-spacing: .04em;
    }
    .president-role {
        color: #777;
        font-size: .95rem;
        font-weight: 700;
        margin-top: 2px;
    }

    .message-title {
        font-weight: 900;
        font-size: 1.2rem;
        letter-spacing: .03em;
        color: #222;
        margin-bottom: 12px;
    }

    .message-body {
        color: #555;
        line-height: 2.0;
        font-size: 1.0rem;
    }

    /* 署名風 */
    .signature {
        margin-top: 22px;
        padding-top: 18px;
        border-top: 1px solid #eee;
        color: #666;
        font-weight: 700;
        line-height: 1.9;
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
{{-- ===== 見出し（会社情報 / ごあいさつ） ===== --}}
<section class="page-head py-4 py-lg-5">
    <div class="container">
        <div class="kicker">
            <span class="kicker-dots" aria-hidden="true">
                <span></span><span></span><span></span><span></span>
            </span>
            会社情報
        </div>
        <h1 class="page-title">ごあいさつ</h1>
    </div>
</section>

<section class="py-4 py-lg-5">
    <div class="container">
        <div class="row g-4 g-lg-5">
            {{-- 左：代表メッセージ --}}
            <div class="col-lg-8">
                <div class="content-box">
                    <div class="message-title">
                        “安いから仕方ない”を、終わらせたい。
                    </div>

                    <div class="message-body">
                        
                        ロープライス車市場には、<br>
                        「安いのだから多少は仕方ない」という空気があります。<br><br>

                        私はその常識を変えたいと思っています。<br><br>

                        価格を抑えることと、<br>
                        品質や誠実さを下げることは、まったく別の話です。<br><br>

                        私たちは一台一台を丁寧に仕上げ、<br>
                        自分たちが胸を張ってお渡しできる状態にしてから販売しています。<br><br>

                        派手な営業はしません。<br>
                        無理に勧めることもありません。<br><br>

                        その代わり、<br>
                        正直に、誠実に、状態をお伝えします。<br><br>

                        目指しているのは、<br>
                        「安いから選ばれる店」ではなく、<br>
                        「信頼できるから選ばれる店」です。<br><br>

                        ロープライス市場の地位を引き上げる。<br>
                        その小さな積み重ねを、ここから続けていきます。
                    </div>

                    <div class="signature">
                        株式会社カーフレンズツバサ<br>
                        代表取締役　黒田　翼
                    </div>
                </div>
            </div>

            {{-- 右：会社情報メニュー（共通パーツ） --}}
            <div class="col-lg-4">
                @include('company._side')
            </div>
        </div>
    </div>
</section>
@endsection