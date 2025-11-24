@extends('layout.admin')

@section('title', 'お知らせ一覧')

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus me-1"></i> 新規作成
    </a>
</div>

<div class="card card-shadow p-3">
    <table class="table align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>公開</th>
                <th>日付</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $n)
            <tr>
                <td>{{ $n->id }}</td>
                <td>{{ $n->title }}</td>
                <td>{{ $n->is_public ? '公開' : '非公開' }}</td>
                <td>{{ $n->published_at }}</td>
                <td class="text-end">
                    <a href="{{ route('admin.news.edit', $n) }}" class="btn btn-sm btn-outline-secondary">編集</a>

                    <form action="{{ route('admin.news.destroy', $n) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('削除しますか？')">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $news->links() }}
</div>
@endsection
