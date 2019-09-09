<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Attestation;

class AttestationController extends Controller
{
     /**
     * @Route("/attestation", name="attestation")
     */
    public function indexAction()
    {
        $attestation= new Attestation();
        $em=$this->getDoctrine()->getManager();
        $attestation=$em->getRepository('AppBundle:Attestation')->findAll();

        return $this->render('@App/pages/attestation.html.twig',array(
            'attestation'=>$attestation
        ));
    }

    /**
     * @Route("/attest/{id}", name="attest")
     */
    public function postAction(Request $request,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $attestation = $em->getRepository('AppBundle:Attestation')->find($id);
       if($attestation){
           $attestation->setRetour('1');    
           $em->persist($attestation);
           $em->flush();
       }
       else{
           $session=$request->getSession();
           $session->getFlashBag()->add('error','personne n existe pas');

       }

     return  $this->redirectToRoute('attestation');
    }
    /**
     * @Route("/attestref/{id}", name="attestref")
     */
    public function congAction(Request $request, $id)
    {
        
        $em = $this->getDoctrine()->getManager();
        $attestation = $em->getRepository('AppBundle:Attestation')->find($id);
       if($attestation){
           $attestation->setRetour('2');    
           $em->persist($attestation);
           $em->flush();
       }
       else{
           $session=$request->getSession();
           $session->getFlashBag()->add('error','personne n existe pas');

       }
        return  $this->redirectToRoute('attestation');
    }
}
