@extends('layout.app')

@section('title', 'お問い合わせ | カーフレンズツバサ')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold mb-4">お問い合わせ</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">お名前</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">メールアドレス</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">電話番号</label>
            <input type="tel" name="phone" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">お問い合わせ種別</label>
            <select name="type" class="form-select">
                <option value="購入について">購入について</option>
                <option value="査定について">査定について</option>
                <option value="車検について">車検について</option>
                <option value="その他">その他</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">内容</label>
            <textarea name="message" rows="5" class="form-control" required></textarea>
        </div>

        <button class="btn btn-primary">送信する</button>
    </form>

</div>
@endsection
