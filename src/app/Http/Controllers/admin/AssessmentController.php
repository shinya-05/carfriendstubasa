<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assessment;

class AssessmentController extends Controller
{
    public function index()
    {
        $assessments = Assessment::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.assessments.index', compact('assessments'));
    }

    public function show($id)
    {
        $assessment = Assessment::findOrFail($id);
        return view('admin.assessments.show', compact('assessment'));
    }

    public function updateStatus($id)
    {
        $assessment = Assessment::findOrFail($id);
        $assessment->status = request('status');
        $assessment->save();

        return redirect()->back()->with('success', 'ステータスを更新しました');
    }
}
