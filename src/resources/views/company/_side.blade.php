@php
    // 右メニュー（増やす時はここに追加するだけ）
    $companyMenu = [
        ['label' => 'ごあいさつ', 'route' => 'company.president', 'pattern' => 'company/president'],
        ['label' => '会社概要',   'route' => 'company.profile',   'pattern' => 'company/profile'],
        // ↓ 今後増やす予定なら、ルートができたらここに足す
        ['label' => '企業理念', 'route' => 'company.philosophy', 'pattern' => 'company/philosophy'],
        ['label' => '沿革',       'route' => 'company.history','pattern' => 'company/history'],
    ];
@endphp

<div class="side-box position-sticky" style="top: 90px;">
    <div class="side-heading">COMPANY</div>
    <div class="side-title">会社情報</div>

    <ul class="side-list">
        @foreach($companyMenu as $item)
            <li>
                <a href="{{ route($item['route']) }}"
                   class="{{ request()->is($item['pattern']) ? 'active' : '' }}">
                    {{ $item['label'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>