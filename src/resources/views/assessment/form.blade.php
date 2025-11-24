@extends('layout.app')

@section('title', '買取査定 | カーフレンズツバサ')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold mb-4">買取査定フォーム</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('assessment.submit') }}" method="POST">
        @csrf

        <h5 class="fw-bold mb-2">お客様情報</h5>

        <div class="mb-3">
            <label class="form-label">お名前</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">電話番号</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">メールアドレス</label>
            <input type="email" name="email" class="form-control">
        </div>

        <h5 class="fw-bold mt-4 mb-2">車両情報</h5>

        <div class="mb-3">
            <label class="form-label">メーカー</label>
            <input type="text" name="car_maker" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">車名</label>
            <input type="text" name="car_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">年式</label>
            <input type="number" name="year" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">走行距離</label>
            <input type="number" name="mileage" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">車の状態</label>
            <textarea name="condition" rows="4" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">備考欄</label>
            <textarea name="message" rows="4" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">査定依頼を送信する</button>

    </form>
</div>
@endsection
