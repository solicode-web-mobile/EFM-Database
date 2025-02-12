<?php
namespace App\Services;

use App\Models\Strategy;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Avie;

class StrategySrevice
{
    public function getStrategiesWithAvis(): Collection
    {
        return Strategy::with(
            [
                'user',
                'avie', 
                'avie.user', 
                'avie.feedback',
                'avie.feedback.feedbackType'
            ])->get();
    }

    public function incrementStrategieViews(Strategy $strategy)
    {
        $strategy->increment('vu');
    }

    public function incrementAvieViews(Avie $avie)
    {
        $avie->increment('vu');
    }

    public function updateAvisFeedback(Avis $avis, array $feedbackIds)
    {
        
    }
}