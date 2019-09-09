<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Autorisation;
use AppBundle\Entity\Attestation;
use AppBundle\Entity\Conge;
use Ob\HighchartsBundle\Highcharts\Highchart;

class HomeController extends Controller
{
     /**
     * @Route("/", name="home")
     */
    public function homeAction()
    {
        $conge= new Conge();
        $attestation= new Attestation();
        $autorisation= new Autorisation();
        $em=$this->getDoctrine()->getManager();
        $conge=$em->getRepository('AppBundle:Conge')->findByretour(0);

        $attestation=$em->getRepository('AppBundle:Attestation')->findByretour(0);
        $autorisation=$em->getRepository('AppBundle:Autorisation')->findByretour(0);
		
		$now = date("m-d");
        $notif = $this->getDoctrine()->getRepository('AppBundle:Users')->getbirthday($now);
		
//chart js
        $employes=$this->getDoctrine()->getRepository('AppBundle:Users')->statsers();
 
        $datas=array();
            foreach($employes as $values){
                 $nom=array($values['poste'].' : '.$values['sommes'],Intval($values['sommes']));
                array_push($datas,$nom);
            }
           
        $ob = new Highchart();
        $ob->chart->renderTo('linechart');
        $ob->title->text('Chart Employes');
        $ob->chart->type('pie');
        $series = array(
            array( 
              "data" => $datas)
        );
        $ob->series($series);

        return $this->render('default/index.html.twig',array(
            'conge'=>$conge,'attestation'=>$attestation,'autorisation'=>$autorisation ,'chart' => $ob,'notif'=>$notif
        ));

    }
 /**
     * @Route("/calendar", name="calendar")
     */
    public function homeAppAction()
    {
        
        return $this->render('Gallery/calendar.html.twig');
    }

}
