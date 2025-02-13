<?php
namespace App\Http\Controllers;

use App\Form\AvisType;
use App\Models\Avie;
use App\Models\FeedbackType;
use App\Services\StrategySrevice;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    private $registry;

    public function __construct(StrategySrevice $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @Route("/avis", name="avis_list")
     */
    public function index()
    {
        // Récupérer le repository directement
        $strategies = $this->registry->getStrategiesWithAvis();
        
        // return $this->render('avis/index.html.twig', [
        //     'avisList' => $avisRepository,
        // ]);
        return view('index',compact('strategies'));
    }

    /**
     * @Route("/avis/create", name="avis_create")
     */
    public function create(Request $request): Response
    {
        // Créer un nouvel objet Avis
        $avis = new Avie();

        // Récupérer tous les feedbacks disponibles
        $feedbacks = $this->registry->getRepository(FeedbackType::class)->findAll();

        // Créer le formulaire de création
        $form = $this->createForm(AvisType::class, $avis);

        // Traitement de la soumission du formulaire
        // $form->handleRequest($request);
        // if ($form->isSubmitted() && $form->isValid()) {
        //     // Enregistrer l'avis dans la base de données
        //     $entityManager = $this->registry->getManager();
        //     $entityManager->persist($avis);
        //     $entityManager->flush();

        //     // Rediriger vers la liste des avis avec un message de succès
        //     $this->addFlash('success', 'L\'avis a été créé avec succès.');

        //     return $this->redirectToRoute('avis_list');
        // }

        // Affichage du formulaire
        return $this->render('avis/create.html.twig', [
            'form' => $form->createView(),
            'feedbacks' => $feedbacks,
        ]);
    }
}