<?php

namespace Project\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Project\StoreBundle\Entity\Movie;
use Project\StoreBundle\Entity\Recenzja;

class MovieController extends Controller
{
    public function indexAction()
    {
		$em = $this->getDoctrine()->getManager(); 
		$moviesRepository = $em->getRepository("ProjectStoreBundle:Movie"); 
		$movies = $moviesRepository->findAll();

		$genresRepository = $em->getRepository("ProjectStoreBundle:Genre"); 
		$genres = $genresRepository->findAll();

		return $this->render('ProjectStoreBundle:Default:index.html.twig', array('movies' => $movies, 'genres' => $genres, 'selected' => "dodania"));
    }

    public function genreAction($name)
    {
		$genresRepository = $this->getDoctrine()->getRepository('ProjectStoreBundle:Genre');
	    $genre = $genresRepository->findOneByName($name);
	    $movies = $genre->getMovies();

	    $genres = $genresRepository->findAll();
		return $this->render('ProjectStoreBundle:Default:index.html.twig', array('movies' => $movies, 'genres' => $genres, 'selected' => $name));
    }

    public function movieAction($slug)
    {
		$moviesRepository = $this->getDoctrine()->getRepository('ProjectStoreBundle:Movie');
	    $movie = $moviesRepository ->findOneByTitle($slug);
	    
	    return $this->render('ProjectStoreBundle:Default:movie.html.twig', array('movie' => $movie));
    }


    public function recenzowaneAction()
    {
    	$em = $this->getDoctrine()->getManager(); 
		$genresRepository = $em->getRepository("ProjectStoreBundle:Genre"); 
		$genres = $genresRepository->findAll();
		
		$qb = $em->createQuery('SELECT m.title, m.cover, COUNT(r.id) as review_num FROM ProjectStoreBundle:Movie as m LEFT JOIN ProjectStoreBundle:Recenzja as r WITH m.id = r.movie GROUP BY m.title ORDER BY review_num DESC');
	    $movies = $qb->getResult();
		return $this->render('ProjectStoreBundle:Default:index.html.twig', array('movies' => $movies, 'genres' => $genres, 'selected' => "recenzowane"));
    }
	
	
}
