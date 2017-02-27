<?php

namespace SEB\ParserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
		$dom = new \DomDocument();
		 
		// On charge le fichier XML correspondant au client
		$fichier= "test.xml";
		$dom->load(utf8_decode($fichier), LIBXML_NOWARNING);
		 
		// On récupère le noeud et on modifie sa valeur
		$trad = $dom->getElementsByTagName('trad');
		
		// Si on renvoi un post
		if ($request->isMethod('POST')){
			foreach ($trad as $value){
				
				$postDataId = $value->getAttribute('id');
				$postDataTraduction = $request->get('traduction'.$postDataId);

				if($value->getAttribute('id') == $postDataId){
					$value->firstChild->nodeValue = $postDataTraduction;

					$dom->save($fichier);
				}
			}
			$dom->load(utf8_decode($fichier), LIBXML_NOWARNING);
		}
		
		$tabId = array();
		// On extrait de l'objet $trad on transmet à la variable $c
		foreach ($trad as $c){
				 $trad_id = $c->getAttribute('id');
				 $phrase = $c->firstChild->nodeValue;
				 $tab = array('id'=> $trad_id, 'phrase' => $phrase);

				 array_push($tabId, $tab);
		}
		return $this->render('SEBParserBundle:Default:index.html.twig', array('list_id' => $tabId));
	}
}