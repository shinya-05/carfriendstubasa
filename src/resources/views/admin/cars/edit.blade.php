@extends('layout.admin')

@section('title', '在庫編集')

@section('content')
<div class="card card-shadow p-4">

<form action="{{ route('admin.cars.update', $car) }}" method="POST">
    @csrf @method('PUT')

    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label">メーカー</label>
            <input type="text" name="maker" value="{{ $car->maker }}" class="form-control">
        </div>

        <div class="col-md-4">
            <label class="form-label">車名</label>
            <input type="text" name="car_name" value="{{ $car->car_name }}" class="form-control">
        </div>

        <div class="col-md-4">
            <label class="form-label">グレード</label>
            <input type="text" name="grade" value="{{ $car->grade }}" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">年式</label>
            <input type="number" name="model_year" value="{{ $car->model_year }}" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">走行距離(km)</label>
            <input type="number" name="mileage" value="{{ $car->mileage }}" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">色</label>
            <input type="text" name="color" value="{{ $car->color }}" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">ボディタイプ</label>
            <input type="text" name="body_type" value="{{ $car->body_type }}" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">価格(万円)</label>
            <input type="number" name="price" value="{{ $car->price }}" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">支払総額(万円)</label>
            <input type="number" name="total_price" value="{{ $car->total_price }}" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">状態</label>
            <select name="status" class="form-select">
                <option value="available" {{ $car->status==='available'?'selected':'' }}>在庫</option>
                <option value="sold" {{ $car->status==='sold'?'selected':'' }}>売約済</option>
                <option value="hidden" {{ $car->status==='hidden'?'selected':'' }}>非公開</option>
            </select>
        </div>

        <div class="col-md-12">
            <label class="form-label">説明</label>
            <textarea name="description" class="form-control" rows="4">{{ $car->description }}</textarea>
        </div>
    </div>

    <div class="mt-3 text-end">
        <button class="btn btn-primary">更新する</button>
    </div>
</form>

</div>
@endsection
