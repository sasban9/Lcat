<?php

namespace Login\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
    	if($request->getMethod() == 'POST'){

    		$username = (string)$request()->request->get('username');
    		$password = (string)$request()->request->get('password');
    		$em = $this->getDoctrine()->getManager();
	    	$repository = $em->getRepository('LoginLoginBundle:Users');

	    	$user = $repository->findOneBy(array('username'=>$username,'password'=>$password));

	    	if($user){
	    		return $this->render('LoginLoginBundle:Default:login.html.twig', array('name' => $user -> getFirstName()));
	    	}
    	}
    	else{
    		return $this->render('LoginLoginBundle:Default:login.html.twig');
    	}
        
    }
}
