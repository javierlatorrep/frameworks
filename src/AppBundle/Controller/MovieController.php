<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Form\Type\MovieType;
use AppBundle\Entity\Movie;

class MovieController extends Controller
{
    /**
     * @Route("/hello", name="hello")
     */
    public function hellloAction() {
        return new Response("Hola Mundo!");
    }
    
    /**
     * @Route("/search/{text}", name="search")
     */
    public function searchAction($text) {
        return new JsonResponse(array("text" => $text));
    }
    
    /**
     * @Route("/", name="home")
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(movieType::class);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $movie = $form->getData();

            $em->persist($movie);
            $em->flush();

            $this->addFlash('notice', 'movie added!');

            return $this->redirectToRoute('home');
        }

        $movies = $em->getRepository('AppBundle:Movie')
            ->findAllMoviesOrderedByPublicationDate();

        return $this->render('movie/list.html.twig', [
            'movies' => $movies,
            'movieForm' => $form->createView()
        ]);
    }
    
    /**
     * @Route("/delete/{id}", name="delete_movie")
     */
    public function deleteAction(movie $movie)
    {
        $em = $this->getDoctrine()->getManager();
        
        $em->remove($movie);
        $em->flush();

        return $this->redirectToRoute('home');
    }
}
