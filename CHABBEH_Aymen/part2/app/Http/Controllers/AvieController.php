<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avie;
use App\Models\FeedbackType;

class AvieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Avie $avie)
    {
        $avie->load('feedback.feedbackType');
        $feedbackTypes = FeedbackType::get();
        return view('avie.edit', compact(['avie', 'feedbackTypes']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Avie $avie)
    {
        $request->validate([
            'content' => 'required|string|max:500',
            'feedback.*.type' => 'exists:feedback_types,id'
        ]);

        // Update Avie Content
        $avie->update(['content' => $request->content]);

        // Update Feedback
        $avie->feedback()->delete();
        foreach ($request->feedback as $feedback) {
            $avie->feedback()->create([
                'feedback_type_id' => $feedback['type']
            ]);
        }

        return redirect()->route('index')->with('success', 'Avie updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $avie = Avie::findOrFail($id);
        $avie->delete();
        return redirect()->back();
    }
}
