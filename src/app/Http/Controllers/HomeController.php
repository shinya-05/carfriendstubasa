<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCars = Car::where('featured', true)
            ->where('status', 'available')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $news = News::where('is_public', true)
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        return view('home', compact('featuredCars', 'news'));
    }
}
