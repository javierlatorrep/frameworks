<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Form\Type\BookType;
use AppBundle\Entity\Book;

class BookController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(BookType::class);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $book = $form->getData();

            $em->persist($book);
            $em->flush();

            $this->addFlash('notice', 'Book added!');

            return $this->redirectToRoute('home');
        }

        $books = $em->getRepository('AppBundle:Book')
            ->findAllBooksOrderedByPublicationDate();

        return $this->render('book/list.html.twig', [
            'books' => $books,
            'bookForm' => $form->createView()
        ]);
    }
    
    /**
     * @Route("/delete/{id}", name="delete_book")
     */
    public function deleteAction(Book $book)
    {
        $em = $this->getDoctrine()->getManager();
        
        $em->remove($book);
        $em->flush();

        return $this->redirectToRoute('home');
    }
}
