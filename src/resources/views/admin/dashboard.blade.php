@extends('layout.admin')

@section('title', 'ダッシュボード')

@section('content')

{{-- 上段：サマリーボックス --}}
<div class="row g-3 mb-4">

    <div class="col-md-4">
        <div class="card card-shadow p-3 border-0">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-muted small">在庫台数</div>
                    <div class="fw-bold fs-3">{{ $carCount }}</div>
                </div>
                <div class="text-primary fs-2">
                    <i class="fa-solid fa-car-side"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-shadow p-3 border-0">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-muted small">お知らせ件数</div>
                    <div class="fw-bold fs-3">{{ $newsCount }}</div>
                </div>
                <div class="text-success fs-2">
                    <i class="fa-solid fa-newspaper"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-shadow p-3 border-0">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-muted small">新規お問い合わせ</div>
                    <div class="fw-bold fs-3">{{ $newInquiries }}</div>
                </div>
                <div class="text-warning fs-2">
                    <i class="fa-solid fa-envelope-open-text"></i>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- 中段：最新の問い合わせ --}}
<div class="card card-shadow mb-4 p-3 border-0">
    <h5 class="fw-bold mb-3">
        <i class="fa-solid fa-envelope me-2 text-primary"></i>最新のお問い合わせ
    </h5>

    @if($latestInquiries->isEmpty())
        <p class="text-muted small">お問い合わせはまだありません。</p>
    @else
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>種別</th>
                    <th>日時</th>
                    <th>ステータス</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($latestInquiries as $inq)
                <tr>
                    <td>{{ $inq->id }}</td>
                    <td>{{ $inq->name }}</td>
                    <td>{{ $inq->type }}</td>
                    <td>{{ $inq->created_at->format('Y/m/d H:i') }}</td>
                    <td>
                        <span class="badge 
                            @if($inq->status=='new') bg-warning 
                            @elseif($inq->status=='processing') bg-info 
                            @else bg-success 
                            @endif
                        ">
                            {{ $inq->status }}
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.inquiries.show', $inq->id) }}" class="btn btn-sm btn-outline-secondary">
                            詳細
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <div class="text-end mt-2">
        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-sm btn-outline-primary">
            すべて見る<i class="fa-solid fa-chevron-right ms-1"></i>
        </a>
    </div>
</div>

{{-- 下段：最新のお知らせ --}}
<div class="card card-shadow p-3 border-0">
    <h5 class="fw-bold mb-3">
        <i class="fa-solid fa-newspaper me-2 text-success"></i>最新のお知らせ
    </h5>

    @if($latestNews->isEmpty())
        <p class="text-muted small">お知らせはまだありません。</p>
    @else
    <ul class="list-group">
        @foreach($latestNews as $news)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>
                <strong>{{ $news->title }}</strong>
                <br>
                <small class="text-muted">{{ $news->published_at->format('Y/m/d') }}</small>
            </span>
            <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-sm btn-outline-secondary">
                編集
            </a>
        </li>
        @endforeach
    </ul>
    @endif

    <div class="text-end mt-2">
        <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-outline-success">
            すべて見る <i class="fa-solid fa-chevron-right ms-1"></i>
        </a>
    </div>
</div>

@endsection
