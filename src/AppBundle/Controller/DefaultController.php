<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Conge;
use AppBundle\Entity\Autorisation;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/demande", name="demande")
     */
    public function indexAction(Request $request)
    {
        $conge= new Conge();
        $em=$this->getDoctrine()->getManager();
        

        $statcong = $this->getDoctrine()->getRepository('AppBundle:Conge')->statcongatt();
        $statcongacc = $this->getDoctrine()->getRepository('AppBundle:Conge')->statcongacc();
        $statcongruf = $this->getDoctrine()->getRepository('AppBundle:Conge')->statcongruf();

        $statcongTotal = $this->getDoctrine()->getRepository('AppBundle:Conge')->statcongTotal();

        $poste=$request->get('poste');
        $status=$request->get('status');
        $btn=$request->get('valide');
        
        if($btn !=null){
			
            $now = date('Y-m-d', strtotime('-5 day'));
            $conge = $this->getDoctrine()->getRepository('AppBundle:Conge')->triCong($poste,$status,$now);
               
                
                 /**
            * @ var $paginator \Knp\Component\Pager\Paginator
            */
            $paginator=$this->get('knp_paginator');
            $results = $paginator->paginate(
                $conge, /* query NOT result */
                $request->query->getInt('page', 1), /*page number*/
                800 /*limit per page*/
            );
            return $this->render('@App/pages/index.html.twig',array(
                'conge'=>$results,'statcong'=>$statcong,'statcongTotal'=>$statcongTotal,'statcongacc'=>$statcongacc,'statcongruf'=>$statcongruf
            ));
        }
       else{

             $now = date('Y-m-d', strtotime('-3 day'));
           $conge=$em->getRepository('AppBundle:Conge')->FindOrderByD($now);

         /**
            * @ var $paginator \Knp\Component\Pager\Paginator
            */
            $paginator=$this->get('knp_paginator');
            $results = $paginator->paginate(
                $conge, /* query NOT result */
                $request->query->getInt('page', 1), /*page number*/
                10 /*limit per page*/
            );

        return $this->render('@App/pages/index.html.twig',array(
            'conge'=>$results,'statcong'=>$statcong,'statcongTotal'=>$statcongTotal,'statcongacc'=>$statcongacc,'statcongruf'=>$statcongruf
        ));
     }
    }
    /**
     * @Route("/pdf/{id}", name="pdf")
     */
        public function pdfAction(Request $request,$id)
        {
            $em = $this->getDoctrine()->getManager();
			$print =$em->getRepository('AppBundle:Conge')->print($id);
            $conge = $em->getRepository('AppBundle:Conge')->find($id);

            $html = $this->renderView('@App/pages/pdf.html.twig', array(
                'conge'  => $conge
            ));
           
            $snappy = $this->get('knp_snappy.pdf');
            $filename = 'conge';
            return new Response(
                $snappy->getOutputFromHtml($html),200,array(
                    'Content-Type'          => 'application/pdf',
                    'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
                )
            );
        }
    
	/**
     * @Route("/pdfaut/{id}", name="pdfaut")
     */
    public function pdfautAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $aut = $em->getRepository('AppBundle:Autorisation')->find($id);
        $print =$em->getRepository('AppBundle:Autorisation')->print($id);
        $html = $this->renderView('@App/pages/pdfaut.html.twig', array(
            'aut'  => $aut
        ));
       
        $snappy = $this->get('knp_snappy.pdf');
        $filename = 'autorisation';
        return new Response(
            $snappy->getOutputFromHtml($html),200,array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
            )
        );
    }
	
    /**
     * @Route("/reponse/{id}/{manager}/{managers}", name="reponse")
     */
    public function postAction(Request $request,$id,$manager,$managers)
    {

        $em = $this->getDoctrine()->getManager();
        $conge = $em->getRepository('AppBundle:Conge')->find($id);

        $nbr=$conge->getJours();
        $nom =$conge->getNom();
        $prenom= $conge->getPrenom();
        $date=date('d-m-Y');


	    $type_conge= $conge->getTypeCong();

        if($type_conge == "Conge annuel ordinaire"){
          $this->getDoctrine()->getRepository('AppBundle:Users')->updateCong($nom,$prenom,$nbr);
		   }
       if($conge){
         $conge->setRetour('1');
         $conge->setDateAccept($date);
         $conge->setManager($manager.' '.$managers);

           $em->persist($conge);
           $em->flush();
       }
       else{
           $session=$request->getSession();
           $session->getFlashBag()->add('error','personne n existe pas');

       }

     return  $this->redirectToRoute('demande');
    }
	
   /**
     * @Route("/cong/{id}/{manager}/{managers}", name="cong")
     */
    public function congAction(Request $request,$id,$manager,$managers)
    {

        $em = $this->getDoctrine()->getManager();

        $conge = $em->getRepository('AppBundle:Conge')->find($id);
        $nbr=$conge->getJours();
        $nom =$conge->getNom();
        $prenom= $conge->getPrenom();
        $retour= $conge->getRetour();
        $date=date('d-m-Y');
        $type_conge= $conge->getTypeCong();

        if($retour ==1 && $type_conge == "Conge annuel ordinaire" ){
        $this->getDoctrine()->getRepository('AppBundle:Users')->updateConge($nom,$prenom,$nbr);
        }
       if($conge){
           $conge->setRetour('2');

           $conge->setDateAccept($date);
           $conge->setManager($manager.' '.$managers);
           $em->persist($conge);
           $em->flush();
       }
       else{
           $session=$request->getSession();
           $session->getFlashBag()->add('error','personne n existe pas');

       }
        return  $this->redirectToRoute('demande');
    }

    /**
     * @Route("/calendar", name="calendar")
     */
    public function calendarAction(Request $request)
    {
        
     
        return $this->render('@App/Gallery/calendar.html.twig'
        );
    }
	
	
    /**
     * @Route("/requette", name="requette")
     */
    public function requetteAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')===true) {

        $em = $this->getDoctrine()->getManager();
        $valid=$request->get('validertaux');
        $date=$request->get('date');
        $heureAutorisation = 2;

        if($valid !=null){
        $this->getDoctrine()->getRepository('AppBundle:Users')->updateTaux($date);
        $this->getDoctrine()->getRepository('AppBundle:Users')->updateAutorisation($heureAutorisation);
        $this->get('session')->getFlashBag()->add('message', 'Mise a jour du soldes des congés  et les heures d autorisation  a etait effectuer avec succes');
       
        }
        $donnes =$this->getDoctrine()->getRepository('AppBundle:Users')->selectdate();
            return $this->render('@App/pages/requette.html.twig',array(
                'requette'=>$donnes
            )
        );
   
        }
        else{
            return $this->render('@App/pages/out.html.twig'
        );
        }
    }
	
	/**
     * @Route("/historique", name="hitorique")
     */
    public function historiqueAction(Request $request)
    {
		if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')===true) {
        $conge= new Conge();
        $em=$this->getDoctrine()->getManager();


        $statcong = $this->getDoctrine()->getRepository('AppBundle:Conge')->statcongatt();
        $statcongacc = $this->getDoctrine()->getRepository('AppBundle:Conge')->statcongacc();
        $statcongruf = $this->getDoctrine()->getRepository('AppBundle:Conge')->statcongruf();
        $statcongTotal = $this->getDoctrine()->getRepository('AppBundle:Conge')->statcongTotal();

        if ($request->isMethod('post')) {


        $date1=$request->get('date1');
        $date2=$request->get('date2');
        $poste=$request->get('poste');


            $conge = $this->getDoctrine()->getRepository('AppBundle:Conge')->triCongtotal($date1,$date2,$poste);

            /**
            * @ var $paginator \Knp\Component\Pager\Paginator
            */
            $paginator=$this->get('knp_paginator');
            $results = $paginator->paginate(
                $conge, /* query NOT result */
                $request->query->getInt('page', 1), /*page number*/
                10000 /*limit per page*/
            );
            return $this->render('@App/pages/historique.html.twig',array(
                'conge'=>$results,'statcong'=>$statcong,'statcongTotal'=>$statcongTotal,'statcongacc'=>$statcongacc,'statcongruf'=>$statcongruf
            ));
        }
       else{

           $conge=$em->getRepository('AppBundle:Conge')->FindAll();


         /**
            * @ var $paginator \Knp\Component\Pager\Paginator
            */
            $paginator=$this->get('knp_paginator');
            $results = $paginator->paginate(
                $conge, /* query NOT result */
                $request->query->getInt('page', 1), /*page number*/
                10 /*limit per page*/
            );

        return $this->render('@App/pages/historique.html.twig',array(
            'conge'=>$results,'statcong'=>$statcong,'statcongTotal'=>$statcongTotal,'statcongacc'=>$statcongacc,'statcongruf'=>$statcongruf
        ));
      }
	 
	}
	   else{
		   return $this->render('@App/pages/out.html.twig'
	   );
     }
    }
	

    /**
     * @Route("/historique_att", name="hitorique_att")
     */
    public function historiqueAttAction(Request $request)
    {

          $autorisation= new Autorisation();
          $em=$this->getDoctrine()->getManager();


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


              $autorisation = $this->getDoctrine()->getRepository('AppBundle:Autorisation')->triAutorTotale($poste,$status,$managers);

              /**
               * @ var $paginator \Knp\Component\Pager\Paginator
               */
              $paginator=$this->get('knp_paginator');
              $results = $paginator->paginate(
                  $autorisation, /* query NOT result */
                  $request->query->getInt('page', 1), /*page number*/
                  1000 /*limit per page*/
              );
              return $this->render('@App/pages/historique_att.html.twig',array(
                  'autorisation'=>$results,'statcong'=>$statcong,'statcongTotal'=>$statcongTotal,'statcongacc'=>$statcongacc,'statcongruf'=>$statcongruf,'manager'=>$manager
              ));
          }



          $autorisation=$em->getRepository('AppBundle:Autorisation')->findAll();

           /**
           * @ var $paginator \Knp\Component\Pager\Paginator
           */
              $paginator=$this->get('knp_paginator');
              $results = $paginator->paginate(
              $autorisation, /* query NOT result */
              $request->query->getInt('page', 1), /*page number*/
              10 /*limit per page*/
          );


          return $this->render('@App/pages/historique_att.html.twig',array(
              'autorisation'=>$results,'statcong'=>$statcong,'statcongTotal'=>$statcongTotal,'statcongacc'=>$statcongacc,'statcongruf'=>$statcongruf,'manager'=>$manager
          ));

    }

}
