@extends('layout.app')

@section('title', '在庫一覧 | カーフレンズツバサ')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold mb-4">在庫一覧</h2>

    @if($cars->isEmpty())
        <p class="text-muted">現在、在庫はありません。</p>
    @endif

    <div class="row g-4">
        @foreach($cars as $car)
        <div class="col-md-4">
            <a href="{{ route('cars.show', $car) }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset($car->main_image ?? 'noimage.jpg') }}" class="card-img-top"
                        style="height: 180px; object-fit: cover;">

                    <div class="card-body">
                        <h5 class="fw-bold">{{ $car->maker }} {{ $car->car_name }}</h5>
                        <div class="mb-1 text-muted">{{ $car->model_year }}年式 / {{ number_format($car->mileage) }}km</div>
                        <div class="fw-bold text-danger fs-5">
                            {{ number_format($car->price) }}万円
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $cars->links() }}
    </div>

</div>
@endsection
