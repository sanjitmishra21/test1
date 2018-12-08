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
        // replace this example code with whatever you need
		
		$client = new \Github\Client();
		// Get all the Symfony repositories hoted on Github
		$repos = $client->api('repo')->find('symfony');
		$symfony_repos = array();
		if(!empty($repos) && !empty($repos['repositories'])){
			$symfony_repos = $repos['repositories'];
		}
		//echo "<pre>";print_r($repos);exit;
        return $this->render('default/index.html.twig', ['repos'=>$symfony_repos]);
    }
}
