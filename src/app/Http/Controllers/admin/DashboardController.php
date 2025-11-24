<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\News;
use App\Models\Inquiry;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'carCount' => Car::count(),
            'newsCount' => News::count(),
            'newInquiries' => Inquiry::where('status', 'new')->count(),

            'latestInquiries' => Inquiry::orderBy('created_at', 'desc')->take(5)->get(),
            'latestNews' => News::where('is_public', true)
                                ->orderBy('published_at', 'desc')
                                ->take(5)->get(),
        ]);
    }

}
