<?php
//src/ControllerWildController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WildController extends AbstractController

    /**
     * @Route("/wild", name="wild_index")
     */

{
    /**
     * @return Response
     */
    public function index() :Response
    {

        return $this -> render ('wild/home.html.twig' ,
            [
                'website' => 'Wild Séries',
            ]);
    }

    /**
     * @Route("/show/{slug}",  name="wild_show",
     *     requirements={"slug"="[a-z0-9\-]+"},
     *     defaults={"slug" = ""})
     * @return Response
     */
    public function show(string $slug) : Response
    {
        if (!$slug) {
           throw $this
                ->createNotFoundException('Aucune série sélectionnée, veuillez choisir une série');
        }

        $slug = ucwords(str_replace('-', ' ', $slug));

        return $this -> render ( 'wild/show.html.twig', [
            'slug' => $slug,
        ]);

    }
}

