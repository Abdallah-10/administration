<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Frais;

class FraisController extends Controller
{
   /**
     * @Route("/frais", name="frais")
     */
    public function indexAction(Request $request)
    {
        $frais= new Frais();
        $em=$this->getDoctrine()->getManager();
        $frais=$em->getRepository('AppBundle:Frais')->findAll();

        $poste=$request->get('poste');
        $status=$request->get('status');
        $btn=$request->get('valide');
        
        if($btn !=null){
                $frais = $em->getRepository('AppBundle:Frais')->findBy((['site'=>$poste,'retour'=>$status]));
        }
    
        $statcong = $this->getDoctrine()->getRepository('AppBundle:Frais')->statcongatt();
        $statcongacc = $this->getDoctrine()->getRepository('AppBundle:Frais')->statcongacc();

        $statcongruf = $this->getDoctrine()->getRepository('AppBundle:Frais')->statcongruf();
        $statcongTotal = $this->getDoctrine()->getRepository('AppBundle:Frais')->statcongTotal();

        return $this->render('@App/pages/frais.html.twig',array(
            'frais'=>$frais,'statcong'=>$statcong,'statcongTotal'=>$statcongTotal,'statcongacc'=>$statcongacc,'statcongruf'=>$statcongruf
        ));
    } 

    /**
     * @Route("/note/{id}", name="note")
     */
    public function autAction(Request $request,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $frais = $em->getRepository('AppBundle:Frais')->find($id);
       if($frais){
           $frais->setRetour('1');    
           $em->persist($frais);
           $em->flush();
       }
       else{
           $session=$request->getSession();
           $session->getFlashBag()->add('error','personne n existe pas');

       }

     return  $this->redirectToRoute('frais');
    }
     /**
     * @Route("/notef/{id}", name="notef")
     */
    public function autrAction(Request $request, $id)
    {
        
        $em = $this->getDoctrine()->getManager();
        $frais = $em->getRepository('AppBundle:Frais')->find($id);
       if($frais){
           $frais->setRetour('2');    
           $em->persist($frais);
           $em->flush();
       }
       else{
           $session=$request->getSession();
           $session->getFlashBag()->add('error','personne n existe pas');

       }
        return  $this->redirectToRoute('frais');
    }
}
