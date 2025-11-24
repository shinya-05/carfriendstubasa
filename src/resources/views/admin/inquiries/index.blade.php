@extends('layout.admin')

@section('title', 'お問い合わせ一覧')

@section('content')
<div class="card card-shadow p-3">

<table class="table align-middle">
    <thead>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>種別</th>
            <th>日時</th>
            <th>ステータス</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($inquiries as $inq)
        <tr>
            <td>{{ $inq->id }}</td>
            <td>{{ $inq->name }}</td>
            <td>{{ $inq->type }}</td>
            <td>{{ $inq->created_at }}</td>
            <td>{{ $inq->status }}</td>
            <td class="text-end">
                <a href="{{ route('admin.inquiries.show', $inq->id) }}" class="btn btn-sm btn-outline-secondary">詳細</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $inquiries->links() }}

</div>
@endsection
