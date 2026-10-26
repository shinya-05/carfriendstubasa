<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('published_at', 'desc')->paginate(20);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // チェックボックスは送信されると "on" → boolean に手動変換
        $data['is_public'] = $request->has('is_public');

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', '登録しました');
    }



    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->all();
        $data['is_public'] = $request->has('is_public');

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', '更新しました');
    }



    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', '削除しました');
    }
}
