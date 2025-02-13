<?php

namespace App\Http\Controllers;
use App\Models\Suggestion;

use App\Models\Avis;
use Illuminate\Http\Request;

class AvisController extends Controller
{

    public function edit(Avis $avis)
    {
        $suggestions = Suggestion::all(); // Fetch all suggestions

        return view('avis.edit', compact('avis', 'suggestions'));
    }


    // Update review
    public function update(Request $request, Avis $avis)
    {
        $request->validate([
            'content' => 'required|string|min:5',
        ]);

        $avis->content = $request->content;
        $avis->save();

        return redirect()->route('randonnees.index')->with('success', 'Review updated successfully');
    }

    // Delete review
    public function destroy(Avis $avis)
    {
        $avis->delete();

        return redirect()->route('randonnees.index')->with('success', 'Review deleted successfully');
    }
}
