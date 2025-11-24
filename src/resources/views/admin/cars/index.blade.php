@extends('layout.admin')

@section('title', '在庫一覧')

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus me-1"></i> 新規登録
    </a>
</div>

<div class="card card-shadow p-3">
    <table class="table align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>車名</th>
                <th>メーカー</th>
                <th>年式</th>
                <th>価格</th>
                <th>状態</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->car_name }}</td>
                <td>{{ $car->maker }}</td>
                <td>{{ $car->model_year }}</td>
                <td>{{ number_format($car->price) }}万円</td>
                <td>{{ $car->status }}</td>
                <td class="text-end">
                    <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-sm btn-outline-secondary">編集</a>

                    <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('削除しますか？')">
                            削除
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $cars->links() }}
</div>
@endsection
