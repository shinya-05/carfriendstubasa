@extends('layout.admin')

@section('title', '在庫登録')

@section('content')
<div class="card card-shadow p-4">

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>入力エラーがあります：</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <h5 class="fw-bold mb-3">基本情報</h5>

    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label">メーカー</label>
            <input type="text" name="maker" class="form-control">
        </div>
        <div class="col-md-4">
            <label class="form-label">車名</label>
            <input type="text" name="car_name" class="form-control">
        </div>
        <div class="col-md-4">
            <label class="form-label">グレード</label>
            <input type="text" name="grade" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">年式（西暦）</label>
            <input type="number" name="model_year" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">初度登録年月</label>
            <input type="date" name="first_registration" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">走行距離 (km)</label>
            <input type="number" name="mileage" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">色</label>
            <input type="text" name="color" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">ボディタイプ</label>
            <input type="text" name="body_type" class="form-control">
        </div>
    </div>

    <hr class="my-4">

    <h5 class="fw-bold mb-3">エンジン・駆動情報</h5>

    <div class="row g-3">
        <div class="col-md-3">
            <label class="form-label">エンジンタイプ</label>
            <select name="engine_type" class="form-select">
                <option value="">選択</option>
                <option value="ガソリン">ガソリン</option>
                <option value="ハイブリッド">ハイブリッド</option>
                <option value="EV">EV</option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">排気量 (cc)</label>
            <input type="number" name="displacement" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">駆動方式</label>
            <select name="drive_system" class="form-select">
                <option value="">選択</option>
                <option value="2WD">2WD</option>
                <option value="4WD">4WD</option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">トランスミッション</label>
            <select name="transmission" class="form-select">
                <option value="">選択</option>
                <option value="AT">AT</option>
                <option value="MT">MT</option>
                <option value="CVT">CVT</option>
            </select>
        </div>
    </div>

    <hr class="my-4">

    <h5 class="fw-bold mb-3">車検・状態</h5>

    <div class="row g-3">
        <div class="col-md-3">
            <label class="form-label">車検満了日</label>
            <input type="date" name="inspection_expiry" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">修復歴</label>
            <select name="repair_history" class="form-select">
                <option value="0">なし</option>
                <option value="1">あり</option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">ワンオーナー</label>
            <select name="one_owner" class="form-select">
                <option value="0">いいえ</option>
                <option value="1">はい</option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">禁煙車</label>
            <select name="non_smoking" class="form-select">
                <option value="0">いいえ</option>
                <option value="1">はい</option>
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">リサイクル料</label>
            <input type="number" name="recycle_fee" class="form-control">
        </div>
    </div>

    <hr class="my-4">

    <h5 class="fw-bold mb-3">価格</h5>

    <div class="row g-3">
        <div class="col-md-3">
            <label class="form-label">車両価格 (万円)</label>
            <input type="number" name="price" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">支払総額 (万円)</label>
            <input type="number" name="total_price" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="form-label">税込み</label>
            <select name="tax_included" class="form-select">
                <option value="1">税込</option>
                <option value="0">税別</option>
            </select>
        </div>
    </div>

    <hr class="my-4">

    <h5 class="fw-bold mb-3">その他</h5>

    <div class="row g-3">
        <div class="col-md-3">
            <label class="form-label">状態</label>
            <select name="status" class="form-select" required>
                <option value="available">在庫</option>
                <option value="sold">売約済</option>
                <option value="hidden">非公開</option>
            </select>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">在庫管理番号</label>
            <input type="text" name="stock_number" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label">特選車</label>
            <select name="featured" class="form-select">
                <option value="0">通常</option>
                <option value="1">特選車にする</option>
            </select>
        </div>

        <div class="col-md-12">
            <label class="form-label">説明</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>
    </div>

    <hr class="my-4">

    <h5 class="fw-bold mb-3">画像</h5>

    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">メイン画像</label>
            <input type="file" name="main_image" class="form-control" accept="image/*">
        </div>

        <div class="col-md-6">
            <label class="form-label">追加画像（複数可）</label>
            <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
        </div>
    </div>

    <hr class="my-4">

    <div class="mt-3 text-end">
        <button class="btn btn-primary px-4">登録する</button>
    </div>
</form>

</div>
@endsection
