@extends('layout.admin')

@section('title', '査定一覧')

@section('content')
<div class="card card-shadow p-3">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>車名</th>
                <th>年式</th>
                <th>状態</th>
                <th>ステータス</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($assessments as $ass)
            <tr>
                <td>{{ $ass->id }}</td>
                <td>{{ $ass->name }}</td>
                <td>{{ $ass->car_maker }} {{ $ass->car_name }}</td>
                <td>{{ $ass->year }}</td>
                <td>{{ Str::limit($ass->condition, 20) }}</td>
                <td>{{ $ass->status }}</td>
                <td class="text-end">
                    <a href="{{ route('admin.assessments.show', $ass->id) }}" class="btn btn-sm btn-outline-secondary">詳細</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $assessments->links() }}
</div>
@endsection
