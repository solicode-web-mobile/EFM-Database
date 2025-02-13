<?php
namespace App\Services;

use App\Models\Strategy;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Avie;
use App\Models\FeedBack;

class StrategySrevice
{
    public function getStrategiesWithAvis(): Collection
    {
        return Strategy::with(
            [
                'user',
                'avie', 
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

    public function updateAvisFeedback(Avie $avis, array $feedbackIds) {
        // Récupérer l'entité de l'avis à partir de la base de données
        $entityManager = $this->getEntityManager();
        
        // Commencer une transaction
        $entityManager->beginTransaction();
        
        try {
            // Récupérer l'avis
            $existingAvis = $entityManager->find(Avie::class, $avis->getId());
            if (!$existingAvis) {
                throw new \Exception("Avis non trouvé.");
            }

            // Supprimer les feedbacks existants
            foreach ($existingAvis->getFeedbacks() as $feedback) {
                $entityManager->remove($feedback);
            }

            // Ajouter les nouveaux feedbacks
            foreach ($feedbackIds as $feedbackId) {
                $feedback = $entityManager->find(FeedBack::class, $feedbackId);
                if ($feedback) {
                    $existingAvis->addFeedback($feedback);
                }
            }

            // Persister les modifications
            $entityManager->persist($existingAvis);
            $entityManager->flush();

            // Valider la transaction
            $entityManager->commit();
        } catch (\Exception $e) {
            // Annuler la transaction en cas d'erreur
            $entityManager->rollback();
            throw $e; // Relancer l'exception pour gestion ultérieure
        }
    }
}