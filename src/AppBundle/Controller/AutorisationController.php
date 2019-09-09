<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Autorisation;

class AutorisationController extends Controller
{
     /**
     * @Route("/autorisation", name="autorisation")
     */
    public function indexAction(Request $request)
    {
        $autorisation= new Autorisation();
        $em=$this->getDoctrine()->getManager();
       // $autorisation=$em->getRepository('AppBundle:Autorisation')->findAll();

        $poste=$request->get('poste');
        $status=$request->get('status');
        $managers=$request->get('manager');
        $btn=$request->get('valide');
        $manager = $em->getRepository('AppBundle:Users')->findByfonction('manager');
		
		$statcong = $this->getDoctrine()->getRepository('AppBundle:Autorisation')->statcongatt();
        $statcongacc = $this->getDoctrine()->getRepository('AppBundle:Autorisation')->statcongacc();
        $statcongruf = $this->getDoctrine()->getRepository('AppBundle:Autorisation')->statcongruf();
        $statcongTotal = $this->getDoctrine()->getRepository('AppBundle:Autorisation')->statcongTotal();


        if($btn !=null){
			     $now =date('Y-m-d H:m:i' ,time() - 86400);
                $autorisation = $this->getDoctrine()->getRepository('AppBundle:Autorisation')->triAutor($poste,$status,$managers,$now);
             
			 /**
             * @ var $paginator \Knp\Component\Pager\Paginator
             */
            $paginator=$this->get('knp_paginator');
            $results = $paginator->paginate(
                $autorisation, /* query NOT result */
                $request->query->getInt('page', 1), /*page number*/
                1000 /*limit per page*/
            );
            return $this->render('@App/pages/autorisation.html.twig',array(
                'autorisation'=>$results,'statcong'=>$statcong,'statcongTotal'=>$statcongTotal,'statcongacc'=>$statcongacc,'statcongruf'=>$statcongruf,'manager'=>$manager
            ));
        }
		
		$now =date('Y-m-d H:m:i',time() - 86400)  ;
        
        $autorisation=$em->getRepository('AppBundle:Autorisation')->findAlllimteDate($now);
       
		
		/**
             * @ var $paginator \Knp\Component\Pager\Paginator
             */
            $paginator=$this->get('knp_paginator');
            $results = $paginator->paginate(
                $autorisation, /* query NOT result */
                $request->query->getInt('page', 1), /*page number*/
                10 /*limit per page*/
            );

    
        return $this->render('@App/pages/autorisation.html.twig',array(
            'autorisation'=>$results,'statcong'=>$statcong,'statcongTotal'=>$statcongTotal,'statcongacc'=>$statcongacc,'statcongruf'=>$statcongruf,'manager'=>$manager
        ));
    }

    
    /**
     * @Route("/autrep/{id}/{manager}/{managers}", name="autrep")
     */
    public function autAction(Request $request,$id,$manager,$managers)
    {

        $em = $this->getDoctrine()->getManager();
        $autorisation = $em->getRepository('AppBundle:Autorisation')->find($id);
        $heure= $autorisation->getHours();
        $nom = $autorisation->getNom();
        $prenom=  $autorisation->getPrenom();
        $date=date('d-m-Y H:m:i');
        $this->getDoctrine()->getRepository('AppBundle:Users')->update2Autorisation($nom,$prenom,$heure);
        if($autorisation){
            $autorisation->setRetour('1');
            $autorisation->setDateAccept($date);
            $autorisation->setAccepteur($manager.' '.$managers);
            $em->persist($autorisation);
            $em->flush();
        }
        else{
            $session=$request->getSession();
            $session->getFlashBag()->add('error','personne n existe pas');

        }

        return  $this->redirectToRoute('autorisation');
    }
    /**
     * @Route("/autref/{id}/{manager}/{managers}", name="autref")
     */
    public function autrAction(Request $request, $id,$manager,$managers)
    {

        $em = $this->getDoctrine()->getManager();
        $autorisation = $em->getRepository('AppBundle:Autorisation')->find($id);
        $date=date('d-m-Y H:m:i');
       if($autorisation){
           $autorisation->setRetour('2');
           $autorisation->setDateAccept($date);
           $autorisation->setAccepteur($manager.' '.$managers);
           $em->persist($autorisation);
           $em->flush();
       }
       else{
           $session=$request->getSession();
           $session->getFlashBag()->add('error','personne n existe pas');

       }
        return  $this->redirectToRoute('autorisation');
    }
}
