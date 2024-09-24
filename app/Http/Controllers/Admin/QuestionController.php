<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $question = Question::paginate(10);
        return view('admin.pages.question.index', [
            'title' => 'FaQ',
            'question' => $question
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.question.create', [
            'title' => 'FaQ'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        Question::create($validatedData);

        return redirect()->route('admin.faq.index')->with('success', 'Pertanyaan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $faq)
    {
        return view('admin.pages.question.edit', [
            'title' => 'FaQ',
            'question' => $faq
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $faq)
    {
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        Question::where('id', $faq->id)->update($validatedData);

        return redirect()->route('admin.faq.index')->with('success', 'Pertanyaan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $faq)
    {
        Question::destroy($faq->id);
        return redirect()->route('admin.faq.index')->with('success', 'Pertanyaan berhasil dihapus!');
    }
}
