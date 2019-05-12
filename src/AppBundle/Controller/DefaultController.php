<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Form\FormType;
use AppBundle\Service\Solver;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, Solver $solverSevice)
    {
        $form = $this->createForm(FormType::class);
        $form->handleRequest($request);

        echo $solverSevice->getSolution(1);

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
