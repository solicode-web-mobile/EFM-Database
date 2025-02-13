<?php

namespace App\Services;

use App\Models\Strategy;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Avie;

class StrategySrevice
{
    public function getStrategiesWithAvis(): Collection
    {
        $strategies =  Strategy::with(
            [
                'user',
                'avie',
                'avie.user',
                'avie.feedback',
                'avie.feedback.feedbackType'
            ]
        )->get();
        foreach ($strategies as $strategy) {
            $this->incrementStrategieViews($strategy);
            foreach ($strategy->avie as $avie) {
                $isValid = 0;
                foreach ($avie->feedback as $feedback) {
                    if ($feedback->feedbackType->id = 1) $isValid++;
                    if ($isValid >= 10) $avie->valid = true;
                }
                $this->incrementAvieViews($avie);
            }
            $avie->avg = $this->isAvrg($avie);
        }
        return $strategies;
    }

    public function incrementStrategieViews(Strategy $strategy)
    {
        $strategy->increment('vu');
    }

    public function incrementAvieViews(Avie $avie)
    {
        $avie->increment('vu');
    }

    public function isAvrg(Avie $avie)
    {
        $avg = Avie::avg('vu');
        if ($avie->vu > $avg) return true;
        else return false;
    }
}
