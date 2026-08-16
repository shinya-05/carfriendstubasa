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
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'message' => 'required|min:10',
            'privacy_consent' => 'accepted',
        ], [
            'privacy_consent.accepted' => 'プライバシーポリシーへの同意が必要です。',
        ]);

        unset($validated['privacy_consent']);
        $inquiry = Inquiry::create($validated);

        Mail::to(env('ADMIN_EMAIL'))->send(new InquiryReceivedMail($inquiry));

        return redirect()->back()
            ->with('success', 'お問い合わせを送信しました。')
            ->with('analytics_event', [
                'name' => 'generate_lead',
                'params' => ['lead_type' => 'contact'],
            ]);
    }
}
