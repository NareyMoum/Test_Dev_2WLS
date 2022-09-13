<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



class MemberController extends AbstractController
{
    /**  
      * @Route("/list/users", name="list_users",methods={"GET"})
    */
    public function members(): Response
    {
        return $this->render('members.html.twig');
    }
    
}


