<?php
namespace App\Services;

use App\Models\Strategy;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Avie;

class StrategySrevice
{
    public function getStrategiesWithAvis()
    {
        return Strategy::with([
            'user',
            'avie',
            'avie.user',
            'avie.feedback',
            'avie.feedback.feedbackType',
        ]);
    }
    public function incrementStrategieView(Strategy $strategy){
        $strategy->increment('vu');
    }
    public function incrementAvieViews(Avie $avie){
        $avie->increment('vue');
    }
}
