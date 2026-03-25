<?php

namespace App\Http\Controllers;

use App\Mail\AssessmentReceivedMail;
use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AssessmentController extends Controller
{
    public function showForm()
    {
        return view('assessment.form');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|max:30',
            'car_maker' => 'required|max:50',
            'car_name' => 'required|max:50',
            'message' => 'nullable|max:2000',
        ]);

        $assessment = Assessment::create($validated);

        Mail::to(env('ADMIN_EMAIL'))->send(new AssessmentReceivedMail($assessment));

        return redirect()->back()->with('success', '査定依頼を送信しました。');
    }
}