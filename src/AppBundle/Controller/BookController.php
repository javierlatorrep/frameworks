<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BookController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $books = $em->getRepository('AppBundle:Book')
            ->findAllBooksOrderedByPublicationDate();

        return $this->render('book/list.html.twig', [
            'books' => $books
        ]);
    }
}
