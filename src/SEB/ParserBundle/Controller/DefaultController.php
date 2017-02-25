<?php

namespace SEB\ParserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;

class DefaultController extends Controller
{
    public function indexAction()
    {
		
		// Initialisation XML
		$dom = new \DomDocument();
		 
		// On charge le fichier XML correspondant au client
		$fichier= "test.xml";
		$dom->load(utf8_decode($fichier), LIBXML_NOWARNING);
		 
		// On récupère le noeud et on modifie sa valeur
		$trad = $dom->getElementsByTagName("trad");
		
		// On extrait de l'objet $EnableAccount la variable $c
		foreach ($trad as $c){
			 echo $c->getAttribute("id").'-'.$c->firstChild->nodeValue . "<br />";
			 if($c->getAttribute("id") == 'phrase2'){
				$c->firstChild->nodeValue = "Exemple de nouvelle phrase en français (5)";
			 }
		}

		// Enregistrement du fichier XML
		$dom->save($fichier);

		return new Response('');
		}
}