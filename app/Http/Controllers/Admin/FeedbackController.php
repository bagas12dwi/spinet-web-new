<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.feedback.index', [
            'title' => 'Feedback',
            'feedback' => Feedback::with('user')->orderBy('id', 'DESC')->orderBy('is_showing', 'DESC')->paginate(10)
        ]);
    }

    public function toggleVisibility($id)
    {
        // Find the feedback by ID
        $feedback = Feedback::findOrFail($id);

        // Toggle the is_showing value
        $feedback->is_showing = !$feedback->is_showing;

        // Save the updated feedback
        $feedback->save();

        // Optionally, you can return a response, like redirecting back with a success message
        return redirect()->route('admin.feedback.index')->with('success', 'Feedback visibility toggled successfully!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
