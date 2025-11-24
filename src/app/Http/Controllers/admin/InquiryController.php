<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function show($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function updateStatus($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->status = request('status');
        $inquiry->save();

        return redirect()->back()->with('success', 'ステータスを更新しました');
    }
}
