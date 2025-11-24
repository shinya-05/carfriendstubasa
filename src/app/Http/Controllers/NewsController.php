<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::where('is_public', true)
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        if (!$news->is_public) {
            abort(404);
        }
        return view('news.show', compact('news'));
    }
}
