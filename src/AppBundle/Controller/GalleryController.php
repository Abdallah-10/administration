<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Gallery;
use AppBundle\Form\GalleryType;

class GalleryController extends Controller
{
    /**
     * @Route("/gallery")
     */
    public function uploadAction(Request $request)
    {
      $gallery = new Gallery();
      $form=$this->createForm(GalleryType::class,$gallery);
      $form->handleRequest($request);

      if($form->isSubmitted()){

        $em=$this->getDoctrine()->getManager();
        $gallery->uploadGallery();
        $em->persist($gallery);
        $em->flush();

      }
      return $this->render('@App/Gallery/upload.html.twig', array(
        'form'=>$form->createView()
    ));
    }

 


}
