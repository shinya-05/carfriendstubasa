<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function showForm()
    {
        return view('assessment.form');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'car_maker' => 'required',
            'car_name' => 'required'
        ]);

        Assessment::create($request->all());

        return redirect()->back()->with('success', '査定依頼を送信しました。');
    }
}
