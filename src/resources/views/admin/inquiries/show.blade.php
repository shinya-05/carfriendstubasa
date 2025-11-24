@extends('layout.admin')

@section('title', 'お問い合わせ詳細')

@section('content')
<div class="card card-shadow p-4">

<h5 class="fw-bold mb-3">基本情報</h5>

<ul class="list-group mb-4">
    <li class="list-group-item">名前： {{ $inquiry->name }}</li>
    <li class="list-group-item">メール： {{ $inquiry->email }}</li>
    <li class="list-group-item">電話： {{ $inquiry->phone }}</li>
    <li class="list-group-item">種別： {{ $inquiry->type }}</li>
    <li class="list-group-item">日時： {{ $inquiry->created_at }}</li>
    @if($inquiry->car)
        <li class="list-group-item">車両ID： {{ $inquiry->car->id }}（{{ $inquiry->car->car_name }}）</li>
    @endif
</ul>

<h5 class="fw-bold mb-3">内容</h5>
<div class="p-3 bg-light rounded border mb-4">
    {{ nl2br(e($inquiry->message)) }}
</div>

<h5 class="fw-bold mb-3">ステータス変更</h5>

<form action="{{ route('admin.inquiries.status', $inquiry->id) }}" method="POST">
    @csrf @method('PUT')

    <select name="status" class="form-select w-25 mb-3">
        <option value="new" {{ $inquiry->status=="new" ? 'selected':'' }}>新規</option>
        <option value="processing" {{ $inquiry->status=="processing" ? 'selected':'' }}>対応中</option>
        <option value="done" {{ $inquiry->status=="done" ? 'selected':'' }}>完了</option>
    </select>

    <button class="btn btn-primary">更新する</button>
</form>

</div>
@endsection
