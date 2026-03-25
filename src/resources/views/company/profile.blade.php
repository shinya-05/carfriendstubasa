@extends('layout.app')
@section('title', '会社概要 | カーフレンズツバサ')

@push('styles')
<style>
    /* ===== 見た目を戸田建設っぽく寄せる ===== */
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

    /* 会社概要テーブル */
    .profile-table {
        border: 1px solid #e6e6e6;
        background: #fff;
    }
    .profile-table th,
    .profile-table td {
        padding: 16px 18px;
        border-top: 1px solid #e6e6e6;
        vertical-align: top;
        font-size: .98rem;
        line-height: 1.85;
    }
    .profile-table tr:first-child th,
    .profile-table tr:first-child td {
        border-top: none;
    }
    .profile-table th {
        width: 200px;
        background: #f6f6f6;
        color: #444;
        font-weight: 800;
        letter-spacing: .02em;
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

    /* スマホはサイドを下へ */
    @media (max-width: 991px){
        .side-box{
            border-left: none;
            padding-left: 0;
            border-top: 1px solid #e6e6e6;
            padding-top: 18px;
        }
        .side-list a::before{ left:0; }
    }
</style>
@endpush

@section('content')
{{-- ===== 上部：見出し（会社情報 / 会社概要） ===== --}}
<section class="page-head py-4 py-lg-5">
    <div class="container">
        <div class="kicker">
            <span class="kicker-dots" aria-hidden="true">
                <span></span><span></span><span></span><span></span>
            </span>
            会社情報
        </div>
        <h1 class="page-title">会社概要</h1>
    </div>
</section>

{{-- ===== 本文：左テーブル / 右サイドメニュー ===== --}}
<section class="py-4 py-lg-5">
    <div class="container">
        <div class="row g-4 g-lg-5">
            {{-- 左：会社概要テーブル --}}
            <div class="col-lg-8">
                <div class="profile-table">
                    <table class="table mb-0">
                        <tbody>
                        <tr>
                            <th>社名</th>
                            <td>株式会社カーフレンズツバサ</td>
                        </tr>
                        <tr>
                            <th>代表者</th>
                            <td>代表取締役　黒田　翼</td>
                        </tr>
                        <tr>
                            <th>所在地</th>
                            <td>
                                茨城県つくば市大井１４４０−４８<br>
                                TEL：029-879-9474
                                <br/>FAX：029-879-9478
                            </td>
                        </tr>
                        <tr>
                            <th>主な事業内容</th>
                            <td>
                                <div class="d-flex flex-column gap-2">
                                    <div><span class="badge text-bg-secondary me-2">1</span>中古車販売</div>
                                    <div><span class="badge text-bg-secondary me-2">2</span>中古車買取（査定）</div>
                                    <div><span class="badge text-bg-secondary me-2">3</span>整備・車検サポート</div>
                                    <div><span class="badge text-bg-secondary me-2">4</span>レンタカー事業</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>営業時間</th>
                            <td>10:00〜18:00（定休日：火曜、水曜）</td>
                        </tr>
                        <tr>
                            <th>資本金</th>
                            <td>100万円</td>
                        </tr>
                        <tr>
                            <th>古物商許可番号</th>
                            <td>
                                茨城県公安委員会 第401310000591号
                            </td>
                        </tr>
                        <tr>
                            <th>提携信販会社</th>
                            <td>プレミア株式会社、株式会社ジャックス、株式会社オリエントコーポレーション、株式会社アプラス</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- 右：サイドメニュー（sticky） --}}
            <div class="col-lg-4">
                @include('company._side')
            </div>

        </div>
    </div>
</section>
@endsection