<?php

namespace App\Controller;

use App\Entity\Adherent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdherentController extends AbstractController
{
    // Liste de tout les adherents
    #[Route('/adherent', name: 'app_adherent')]
    public function index(EntityManagerInterface $em): Response
    {

        $tousAdherents =  $em->getRepository(Adherent::class)->findAll();  

        if (!$tousAdherents) {
            throw $this->createNotFoundException(
                "Aucun adhérents trouvés"
            );
        }

        return $this->render('adherent/index.html.twig', [
            'allAdherents' => $tousAdherents,
        ]);
    }

}
