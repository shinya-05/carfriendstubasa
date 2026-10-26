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
        $data = $request->validate([
            'maker' => 'required|string',
            'car_name' => 'required|string',
            'grade' => 'nullable|string',

            'model_year' => 'nullable|integer',
            'first_registration' => 'nullable|date',
            'mileage' => 'nullable|integer',
            'color' => 'nullable|string',
            'body_type' => 'nullable|string',

            'engine_type' => 'nullable|string',
            'displacement' => 'nullable|integer',
            'drive_system' => 'nullable|string',
            'transmission' => 'nullable|string',

            'inspection_expiry' => 'nullable|date',
            'repair_history' => 'nullable|boolean',
            'one_owner' => 'nullable|boolean',
            'non_smoking' => 'nullable|boolean',
            'recycle_fee' => 'nullable|integer',

            'price' => 'nullable|integer',
            'total_price' => 'nullable|integer',
            'tax_included' => 'nullable|boolean',

            'description' => 'nullable|string',

            'stock_number' => 'nullable|string',
            'featured' => 'nullable|boolean',

            'status' => 'required|string',

        ]);

        // --- メイン画像の保存 ---
        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('cars', 'public');
            $data['main_image'] = $path;
        }

        // --- 車データの保存 ---
        $car = Car::create($data);

        // --- 追加画像の保存（car_images テーブル） ---
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $img) {
                $path = $img->store('cars', 'public');
                $car->images()->create([
                    'image_path' => $path,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.cars.index')
            ->with('success', '在庫を登録しました！');
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
