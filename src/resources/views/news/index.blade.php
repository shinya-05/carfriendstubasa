@extends('layout.app')

@section('title', 'お知らせ一覧 | カーフレンズツバサ')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold mb-4">お知らせ一覧</h2>

    @foreach($news as $item)
        <div class="mb-4 p-3 border rounded bg-white shadow-sm">
            <a href="{{ route('news.show', $item) }}" class="text-decoration-none text-dark">
                <h5 class="fw-bold">{{ $item->title }}</h5>
            </a>
            <div class="text-muted small">{{ $item->published_at->format('Y/m/d') }}</div>
        </div>
    @endforeach

    <div class="mt-4">
        {{ $news->links() }}
    </div>

</div>
@endsection
