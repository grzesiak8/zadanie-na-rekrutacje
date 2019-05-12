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
        $solutions = null;
        if($form->isSubmitted()) {
            $toSolve = $form->get('input')->getData();
            foreach($toSolve as $item) {
                $solution = $solverSevice->getSolution($item);
                $solutions[$item] = $solution;
            }
        }
        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
            'solutions' => $solutions,
        ]);
    }
}
