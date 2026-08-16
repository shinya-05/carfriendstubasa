@extends('layout.app')

@section('title', 'プライバシーポリシー | カーフレンズツバサ')

@section('content')
<div class="container py-5" style="max-width: 920px;">
    <h1 class="fw-bold mb-4">プライバシーポリシー</h1>

    <p>
        カーフレンズツバサ（以下「当店」といいます）は、お客様からお預かりする個人情報を適切に取り扱い、
        保護するため、以下の方針を定めます。
    </p>

    <h2 class="h4 fw-bold mt-5">1. 取得する情報</h2>
    <p>
        当店は、お問い合わせ、買取査定、車両販売、車検・点検・整備などへの対応に必要な範囲で、
        氏名、連絡先、住所、車両情報、お問い合わせ内容などを取得する場合があります。
    </p>

    <h2 class="h4 fw-bold mt-5">2. 利用目的</h2>
    <ul>
        <li>お問い合わせ、査定依頼、ご相談への回答および連絡</li>
        <li>車両販売、買取、車検、点検、整備などのサービス提供</li>
        <li>サービス品質およびウェブサイトの改善</li>
        <li>法令に基づく対応および不正利用の防止</li>
    </ul>

    <h2 class="h4 fw-bold mt-5">3. Google Analyticsの利用</h2>
    <p>
        当サイトでは、利用状況を把握し、サイトとサービスを改善するためにGoogle Analytics 4を利用します。
        Google AnalyticsはCookie等を使用して、閲覧ページ、利用端末、参照元、サイト上での操作などの情報を収集します。
        当店は、Google Analyticsへ氏名、メールアドレス、電話番号など、個人を直接特定できる情報を送信しません。
    </p>
    <p>
        収集された情報はGoogleのプライバシーポリシーおよびGoogle Analytics利用規約に基づいて管理されます。
        詳細は
        <a href="https://policies.google.com/technologies/partner-sites?hl=ja" target="_blank" rel="noopener noreferrer">Googleのサービスを使用するサイトやアプリから収集した情報の使用方法</a>
        をご確認ください。ブラウザのCookieを無効にすることで収集を制限できますが、一部機能に影響する場合があります。
    </p>

    <h2 class="h4 fw-bold mt-5">4. 第三者提供</h2>
    <p>
        当店は、法令に基づく場合またはサービス提供に必要な業務委託先へ適切な管理のもとで提供する場合を除き、
        ご本人の同意なく個人情報を第三者へ提供しません。
    </p>

    <h2 class="h4 fw-bold mt-5">5. 安全管理</h2>
    <p>
        当店は、個人情報への不正アクセス、紛失、漏えい、改ざんなどを防止するため、必要かつ適切な安全管理措置を講じます。
    </p>

    <h2 class="h4 fw-bold mt-5">6. 開示・訂正・削除等</h2>
    <p>
        ご本人から個人情報の開示、訂正、利用停止、削除等のご希望があった場合は、本人確認のうえ、法令に従って対応します。
    </p>

    <h2 class="h4 fw-bold mt-5">7. お問い合わせ窓口</h2>
    <p>
        本方針および個人情報の取り扱いに関するお問い合わせは、
        <a href="{{ route('contact.form') }}">お問い合わせフォーム</a>よりご連絡ください。
    </p>

    <h2 class="h4 fw-bold mt-5">8. 改定</h2>
    <p>
        当店は、法令やサービス内容の変更等に応じて本方針を改定することがあります。改定後の内容は当サイトに掲載します。
    </p>

    <p class="text-muted mt-5 mb-0">制定日：2026年8月16日</p>
</div>
@endsection
