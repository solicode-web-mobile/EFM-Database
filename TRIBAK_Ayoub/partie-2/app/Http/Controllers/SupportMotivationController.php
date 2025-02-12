<?php

namespace App\Http\Controllers;

use App\Models\SupportMotivation;
use App\Models\TypeMotivation;
use App\Services\ImageService;
use Illuminate\Http\Request;

class SupportMotivationController extends Controller
{
   protected $imageService;

   public function __construct(ImageService $imageService)
   {
      $this->imageService = $imageService;
   }

   public function edit($id)
   {
      $supportMotivation = SupportMotivation::findOrFail($id);
      $typeMotivations = TypeMotivation::all();

      return view('support_motivations.edit', compact('supportMotivation', 'typeMotivations'));
   }

   public function update(Request $request, $id)
   {
      $supportMotivation = SupportMotivation::findOrFail($id);

      $request->validate([
         'type_motivation_ids' => 'array|required',
      ]);

      $this->imageService->updateSupportMotivation($supportMotivation, $request->type_motivation_ids);

      return redirect()->route('images.index')->with('success', 'Motivation types updated successfully.');
   }

   public function destroy($id)
   {
      $supportMotivation = SupportMotivation::findOrFail($id);
      $supportMotivation->delete();

      return redirect()->route('images.index')->with('success', 'Support message deleted successfully.');
   }
}
