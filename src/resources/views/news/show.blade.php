@extends('layout.app')

@section('title', $news->title . ' | カーフレンズツバサ')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold mb-2">{{ $news->title }}</h2>
    <div class="text-muted mb-4">{{ $news->published_at->format('Y/m/d') }}</div>

    <div class="p-3 bg-light rounded border">
        {!! nl2br(e($news->body)) !!}
    </div>

    <div class="mt-4">
        <a href="{{ route('news.index') }}" class="btn btn-outline-secondary">
            一覧へ戻る
        </a>
    </div>

</div>
@endsection
