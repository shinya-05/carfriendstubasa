<?php

namespace App\Http\Controllers;

use App\Mail\InquiryReceivedMail;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        $inquiry = Inquiry::create($request->all());

        Mail::to(env('ADMIN_EMAIL'))->send(new InquiryReceivedMail($inquiry));

        return redirect()->back()->with('success', 'お問い合わせを送信しました。');
    }
}