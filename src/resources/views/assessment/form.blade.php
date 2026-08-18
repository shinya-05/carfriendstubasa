@extends('layout.app')

@section('title', '査定依頼')

@section('content')
<div class="container py-5" style="max-width: 800px;">
    <h1 class="mb-4 fw-bold text-center">査定依頼</h1>
    <p class="text-muted text-center mb-5">
        お車の査定をご希望の方は、下記フォームより必要事項をご入力ください。
    </p>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-dismiss aria-label="閉じる"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4 p-md-5">
            <form action="{{ route('assessment.submit') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="form-label fw-semibold">お名前 <span class="text-danger">*</span></label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        placeholder="例：山田 太郎"
                        required
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label fw-semibold">メールアドレス</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="例：example@example.com"
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">返信をご希望の場合はご入力ください。</div>
                </div>

                <div class="mb-4">
                    <label for="phone" class="form-label fw-semibold">電話番号 <span class="text-danger">*</span></label>
                    <input
                        type="text"
                        name="phone"
                        id="phone"
                        class="form-control form-control-lg @error('phone') is-invalid @enderror"
                        value="{{ old('phone') }}"
                        placeholder="例：09012345678"
                        required
                    >
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="car_maker" class="form-label fw-semibold">メーカー <span class="text-danger">*</span></label>
                    <input
                        type="text"
                        name="car_maker"
                        id="car_maker"
                        class="form-control form-control-lg @error('car_maker') is-invalid @enderror"
                        value="{{ old('car_maker') }}"
                        placeholder="例：トヨタ"
                        required
                    >
                    @error('car_maker')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="car_name" class="form-label fw-semibold">車種名 <span class="text-danger">*</span></label>
                    <input
                        type="text"
                        name="car_name"
                        id="car_name"
                        class="form-control form-control-lg @error('car_name') is-invalid @enderror"
                        value="{{ old('car_name') }}"
                        placeholder="例：アルファード"
                        required
                    >
                    @error('car_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="message" class="form-label fw-semibold">備考・ご要望</label>
                    <textarea
                        name="message"
                        id="message"
                        rows="5"
                        class="form-control @error('message') is-invalid @enderror"
                        placeholder="年式、走行距離、車の状態などがあればご記入ください"
                    >{{ old('message') }}</textarea>
                    @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-4">
                    <input
                        class="form-check-input @error('privacy_consent') is-invalid @enderror"
                        type="checkbox"
                        name="privacy_consent"
                        id="privacy_consent"
                        value="1"
                        {{ old('privacy_consent') ? 'checked' : '' }}
                        required
                    >
                    <label class="form-check-label" for="privacy_consent">
                        <a href="{{ route('privacy-policy') }}" target="_blank" rel="noopener noreferrer">プライバシーポリシー</a>に同意する
                        <span class="text-danger">*</span>
                    </label>
                    @error('privacy_consent')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill">
                        査定依頼を送信する
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
