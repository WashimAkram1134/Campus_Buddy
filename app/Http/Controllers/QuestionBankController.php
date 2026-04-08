<?php

namespace App\Http\Controllers;

use App\Models\QuestionBank;
use Illuminate\Http\Request;

class QuestionBankController extends Controller
{
    public function index(Request $request)
    {
        $query = QuestionBank::query()->where('status', 'approved');

        if ($request->filled('department')) {
            $query->where('department', 'like', '%' . $request->department . '%');
        }

        if ($request->filled('course')) {
            $query->where(function($q) use ($request) {
                $q->where('course_code', 'like', '%' . $request->course . '%')
                  ->orWhere('course_name', 'like', '%' . $request->course . '%');
            });
        }

        if ($request->filled('semester')) {
            $query->where('year_semester', 'like', '%' . $request->semester . '%');
        }

        $questions = $query->latest()->get();

        return view('questionbank', compact('questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240|mimes:pdf', // Required now for direct upload
            'department' => 'nullable|string',
            'course_code' => 'nullable|string',
            'course_name' => 'nullable|string',
            'title' => 'nullable|string',
            'difficulty' => 'nullable|string',
            'question_heading' => 'nullable|string',
            'sub_questions' => 'nullable|string',
            'year_semester' => 'nullable|string',
        ]);

        $data = $request->only([
            'department', 'course_code', 'course_name', 'title', 
            'difficulty', 'question_heading', 'sub_questions', 'year_semester'
        ]);
        
        $data['user_id'] = auth()->id();
        $data['tags'] = $request->tags; 
        $data['status'] = 'pending'; 

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('question_banks', 'public');
        }

        QuestionBank::create($data);

        return redirect()->back()->with('success', 'Question PDF uploaded successfully! It will appear once approved by admin.');
    }
}
