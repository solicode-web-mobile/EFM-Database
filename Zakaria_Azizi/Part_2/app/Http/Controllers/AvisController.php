<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Suggestion;
use App\Services\RandonneeService;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    protected $randonneeService;

    public function __construct(RandonneeService $randonneeService)
    {
        $this->randonneeService = $randonneeService;
    }

    public function edit($id)
    {
        $avis = Avis::findOrFail($id);
        $suggestions = Suggestion::all();
        return view('avis.edit', compact('avis', 'suggestions'));
    }

    public function update(Request $request, $id)
    {
        $avis = Avis::findOrFail($id);
        $this->randonneeService->updateAvisSuggestions($avis, $request->input('suggestions', []));
        return redirect('/randonnees');
    }

    public function destroy($id)
    {
        Avis::destroy($id);
        return redirect('/randonnees');
    }
}

