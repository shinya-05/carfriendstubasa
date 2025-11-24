@extends('layout.admin')

@section('title', '査定詳細')

@section('content')
<div class="card card-shadow p-4">

<h5 class="fw-bold">査定依頼詳細</h5>

<ul class="list-group mb-4">
    <li class="list-group-item">名前： {{ $assessment->name }}</li>
    <li class="list-group-item">電話： {{ $assessment->phone }}</li>
    <li class="list-group-item">メール： {{ $assessment->email }}</li>
    <li class="list-group-item">車： {{ $assessment->car_maker }} {{ $assessment->car_name }}</li>
    <li class="list-group-item">年式： {{ $assessment->year }}</li>
    <li class="list-group-item">走行距離： {{ $assessment->mileage }} km</li>
</ul>

<h5 class="fw-bold mb-2">状態</h5>
<div class="p-3 bg-light rounded border mb-4">
    {{ nl2br(e($assessment->condition)) }}
</div>

<h5 class="fw-bold mb-2">備考</h5>
<div class="p-3 bg-light rounded border mb-4">
    {{ nl2br(e($assessment->message)) }}
</div>

<h5 class="fw-bold">ステータス変更</h5>

<form action="{{ route('admin.assessments.status', $assessment->id) }}" method="POST">
    @csrf @method('PUT')

    <select name="status" class="form-select w-25 mb-3">
        <option value="new" {{ $assessment->status == 'new' ? 'selected':'' }}>新規</option>
        <option value="processing" {{ $assessment->status == 'processing' ? 'selected':'' }}>対応中</option>
        <option value="done" {{ $assessment->status == 'done' ? 'selected':'' }}>完了</option>
    </select>

    <button class="btn btn-primary">更新する</button>
</form>

</div>
@endsection
