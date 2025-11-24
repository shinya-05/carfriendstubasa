@extends('layout.admin')

@section('title', 'お知らせ編集')

@section('content')
<div class="card card-shadow p-4">

<form action="{{ route('admin.news.update', $news) }}" method="POST">
    @csrf @method('PUT')

    <label class="form-label">タイトル</label>
    <input type="text" name="title" value="{{ $news->title }}" class="form-control mb-3">

    <label class="form-label">本文</label>
    <textarea name="body" rows="6" class="form-control mb-3">{{ $news->body }}</textarea>

    <label class="form-label">カテゴリ</label>
    <input type="text" name="category" value="{{ $news->category }}" class="form-control mb-3">

    <label class="form-label">公開日</label>
    <input type="datetime-local" name="published_at" value="{{ $news->published_at }}" class="form-control mb-3">

    <label class="form-check">
        <input type="checkbox" name="is_public" {{ $news->is_public ? 'checked' : '' }} class="form-check-input">
        <span class="form-check-label">公開する</span>
    </label>

    <div class="mt-3 text-end">
        <button class="btn btn-primary">更新する</button>
    </div>
</form>

</div>
@endsection
