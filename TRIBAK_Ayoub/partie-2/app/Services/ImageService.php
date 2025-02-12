<?php

namespace App\Services;

use App\Models\ImageMotivation;
use App\Models\SupportMotivation;

class ImageService
{
    public function getImagesWithSupport()
    {
        return ImageMotivation::with(['employe', 'supportMotivations.typeMotivations'])->get();
    }

    public function incrementImageViews(ImageMotivation $image)
    {
        $image->increment('views');
    }

    public function incrementSupportViews(ImageMotivation $image)
    {
        foreach ($image->supportMotivations as $support) {
            $support->increment('views');
        }
    }

    public function updateSupportMotivation(SupportMotivation $support, array $typeMotivationIds)
    {
        $support->typeMotivations()->sync($typeMotivationIds);
    }
}
