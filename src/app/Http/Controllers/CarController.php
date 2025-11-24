<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::where('status', 'available')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('cars.index', compact('cars'));
    }

    public function search(Request $request)
    {
        $query = Car::query();

        if ($request->maker) {
            $query->where('maker', $request->maker);
        }

        if ($request->body_type) {
            $query->where('body_type', $request->body_type);
        }

        if ($request->keyword) {
            $query->where(function ($q) use ($request) {
                $q->where('car_name', 'like', "%{$request->keyword}%")
                  ->orWhere('grade', 'like', "%{$request->keyword}%");
            });
        }

        $cars = $query->paginate(12);

        return view('cars.index', compact('cars'));
    }

    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }
}
