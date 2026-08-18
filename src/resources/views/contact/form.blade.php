@extends('layout.app')

@section('title', 'お問い合わせ')

@section('content')
<div class="container py-5" style="max-width: 800px;">
    <h1 class="mb-4 fw-bold text-center">お問い合わせ</h1>
    <p class="text-muted text-center mb-5">
        ご不明点やご相談などございましたら、下記フォームよりお気軽にお問い合わせください。
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
            <form action="{{ route('contact.submit') }}" method="POST">
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
                    <label for="email" class="form-label fw-semibold">メールアドレス <span class="text-danger">*</span></label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="例：example@example.com"
                        required
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="message" class="form-label fw-semibold">お問い合わせ内容 <span class="text-danger">*</span></label>
                    <textarea
                        name="message"
                        id="message"
                        rows="6"
                        class="form-control @error('message') is-invalid @enderror"
                        placeholder="お問い合わせ内容をご入力ください"
                        required
                        minlength="10"
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
                        送信する
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
