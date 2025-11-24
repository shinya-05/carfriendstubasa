@extends('layout.app')

@section('title', $car->maker . ' ' . $car->car_name . ' | カーフレンズツバサ')

@section('content')
<div class="container py-5">

    <div class="row g-4">

        {{-- 画像 --}}
        <div class="col-md-6">
            <img src="{{ asset($car->main_image ?? 'noimage.jpg') }}"
                 class="img-fluid rounded shadow-sm mb-3">

            @if($car->images_json)
                <div class="d-flex flex-wrap gap-2">
                    @foreach(json_decode($car->images_json) as $img)
                        <img src="{{ asset($img) }}" style="width: 120px; height: 80px; object-fit: cover;"
                             class="rounded border">
                    @endforeach
                </div>
            @endif
        </div>

        {{-- 情報 --}}
        <div class="col-md-6">
            <h2 class="fw-bold">{{ $car->maker }} {{ $car->car_name }}</h2>
            <h4 class="text-danger fw-bold">
                {{ number_format($car->price) }}万円
            </h4>

            <table class="table mt-3">
                <tr><th>年式</th><td>{{ $car->model_year }}</td></tr>
                <tr><th>走行距離</th><td>{{ number_format($car->mileage) }} km</td></tr>
                <tr><th>色</th><td>{{ $car->color }}</td></tr>
                <tr><th>ボディタイプ</th><td>{{ $car->body_type }}</td></tr>
                <tr><th>車検</th><td>{{ $car->inspection_expiry }}</td></tr>
                <tr><th>修復歴</th><td>{{ $car->repair_history ? 'あり' : 'なし' }}</td></tr>
            </table>

            <div class="mt-4">
                <a href="{{ route('contact.form', ['car_id' => $car->id]) }}"
                    class="btn btn-primary btn-lg w-100">
                    この車について問い合わせる
                </a>
            </div>
        </div>

    </div>

    {{-- 説明 --}}
    <div class="mt-5">
        <h4 class="fw-bold mb-2">車両詳細</h4>
        <div class="p-3 bg-light rounded border">
            {!! nl2br(e($car->description)) !!}
        </div>
    </div>

</div>
@endsection
