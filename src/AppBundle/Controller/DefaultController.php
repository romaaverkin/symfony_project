<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $a = 42;
        $someArray = [1, 2, 3];
        $someValue = false;

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'a' => $a,
            'some_array' => $someArray,
            'some_value' => $someValue
        ]);
    }

    /**
     * @Route("/feedback", name="feedback123")
     */
    public function feedbackAction()
    {
        return $this->render('default/feedback.html.twig');
    }
}
