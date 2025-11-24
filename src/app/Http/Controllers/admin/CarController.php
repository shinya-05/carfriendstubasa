<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $car = Car::create($request->all());
        return redirect()->route('admin.cars.index')->with('success', '登録しました');
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $car->update($request->all());
        return redirect()->route('admin.cars.index')->with('success', '更新しました');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', '削除しました');
    }
}
