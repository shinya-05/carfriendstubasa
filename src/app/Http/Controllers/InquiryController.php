<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function showForm()
    {
        return view('contact.form');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'message' => 'required|min:10'
        ]);

        Inquiry::create($request->all());

        return redirect()->back()->with('success', 'お問い合わせを送信しました。');
    }
}
