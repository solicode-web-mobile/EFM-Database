<?php
namespace App\Services;

use App\Models\Avie;
use App\Models\Strategy;

class StrategieService
{
    public function getStrategiesWithAvis()
    {
        return Strategy::with([
            'user',
            'avie',
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
    
}

