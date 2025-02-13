<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function edit($id)
    {
        $suggestion = Suggestion::findOrFail($id); 
        return view('suggestions.edit', compact('suggestion')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:255', 
        ]);
        $suggestion = Suggestion::findOrFail($id);
        $suggestion->content = $request->input('content'); 
        $suggestion->save(); 
        return redirect()->route('suggestions.index')->with('success', 'Suggestion updated successfully.');
    }
}
