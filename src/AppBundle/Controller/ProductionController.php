<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Production;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Ob\HighchartsBundle\Highcharts\Highchart;

class ProductionController extends Controller
{
    /**
     * @Route("/prod", name="production_index")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $productions = $em->getRepository('AppBundle:Production')->findAll();

        $temppass=$request->get('temppass');
        $idprod=$request->get('idprod');
        $super=$request->get('supervis');
      
        $temPass = $this->getDoctrine()->getRepository('AppBundle:Production')->temPass($temppass,$idprod);
        $disponibles = $this->getDoctrine()->getRepository('AppBundle:Production')->emplDispo();
        $date = new \DateTime();

        $employes= $em->getRepository('AppBundle:Users')->findAll();
        $superviseur= $em->getRepository('AppBundle:Users')->findBy([
            'poste' => 'SUPERVISEUR'
        ]);

        if($super!=null){
        $productions = $em->getRepository('AppBundle:Production')->findBy((['superviseur'=>$super]));
        }
        return $this->render('@App/production/index.html.twig', array(
            'productions' => $productions,'employes'=>$employes,'superviseur'=>$superviseur,'disponibles'=>$disponibles,'date'=>$date
        ));
    }

    /**
     * Creates a new production entity. 
     *
     * @Route("/production/new", name="production_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $production = new Production();
        $em = $this->getDoctrine()->getManager();
        $employes= $em->getRepository('AppBundle:Users')->findAll();
        $superviseur= $em->getRepository('AppBundle:Users')->findBy([
            'poste' => 'SUPERVISEUR'
        ]);
        //dump($superviseur);die();
        $form = $this->createForm('AppBundle\Form\ProductionType', $production);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($production);
            $em->flush();
         
            return $this->redirectToRoute('production_index', array('id_prod' => $production->getId_prod()));
        }

        return $this->render('@App/production/new.html.twig', array(
            'production' => $production,'superviseur'=>$superviseur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a production entity.
     *
     * @Route("/production/{id_prod}", name="production_show")
     * @Method("GET")
     */
    public function showAction(Production $production)
    {
        $deleteForm = $this->createDeleteForm($production);

        return $this->render('@App/production/show.html.twig', array(
            'production' => $production,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing production entity.
     *
     * @Route("/production/{id_prod}/edit", name="production_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Production $production)
    {
        $deleteForm = $this->createDeleteForm($production);
        $editForm = $this->createForm('AppBundle\Form\ProductionType', $production);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('production_edit', array('id_prod' => $production->getId_prod()));
        }

        return $this->render('@App/production/edit.html.twig', array(
            'production' => $production,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a production entity.
     *
     * @Route("/production/{id_prod}", name="production_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Production $production)
    {
        $form = $this->createDeleteForm($production);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($production);
            $em->flush();
        }

        return $this->redirectToRoute('production_index');
    }

    /**
     * Creates a form to delete a production entity.
     *
     * @param Production $production The production entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Production $production)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('production_delete', array('id_prod' => $production->getId_prod())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

     /**
     * @Route("/prodstat", name="prodstat")
     */
    public function statProdAction(request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $productions = $em->getRepository('AppBundle:Production')->findAll();
        $taches = $em->getRepository('AppBundle:Production')->findAll();
        $superviseur= $em->getRepository('AppBundle:Users')->findBy([
            'poste' => 'SUPERVISEUR'
        ]);
        $employes= $em->getRepository('AppBundle:Users')->findAll();
        $clients = $em->getRepository('AppBundle:Clients')->findAll();

        $client=$request->get('client');

        
        $date1=$request->get('date1');
        $date2=$request->get('date2');
        $super=$request->get('super');
        $empl=$request->get('empl');
        $client=$request->get('client');
      
        if($super !="superviseur"){
        $production = $this->getDoctrine()->getRepository('AppBundle:Production')->statProd($date1,$date2,$super);
            $datas=array();
            foreach($production as $values){
                $nom=array($values['nom'],floatval($values['somme']));
                array_push($datas,$nom);
            }
        }
        else{
        $production = $this->getDoctrine()->getRepository('AppBundle:Production')->statProds($date1,$date2);
        
            $datas=array();
            foreach($production as $values){
                $nom=array($values['nom'],floatval($values['somme']));
                array_push($datas,$nom);
            }
        }
        $prodtemps= $this->getDoctrine()->getRepository('AppBundle:Production')->tempProd($date1,$date2);
        $ob = new Highchart();
        $ob->chart->renderTo('linechart');
        $ob->title->text('Chart Title');
        $ob->chart->type('pie');
        $series = array(
            array( 
              "data" => $datas)
        );
    
        $ob->series($series);

       return $this->render('@App/pages/statprod.html.twig',array('superviseur'=>$superviseur,
       'employes'=>$employes, 'clients' => $clients,'productions'=>$production, 'chart' => $ob ,'tempProd'=>$prodtemps));
    }
    
      /**
     * @Route("/statclient", name="statclient")
     */
    public function statClientAction(request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $productions = $em->getRepository('AppBundle:Production')->findAll();
        $taches = $em->getRepository('AppBundle:Production')->findAll();
        $superviseur= $em->getRepository('AppBundle:Users')->findBy([
            'poste' => 'SUPERVISEUR'
        ]);
        $employes= $em->getRepository('AppBundle:Users')->findAll();
        $clients = $em->getRepository('AppBundle:Clients')->findAll();

        $client=$request->get('client');

        
        $date1=$request->get('date1');
        $date2=$request->get('date2');
        $super=$request->get('super');
        $empl=$request->get('empl');
        $client=$request->get('client');
        
      
        if($client !="clients"){
        $production = $this->getDoctrine()->getRepository('AppBundle:Production')->statClient($date1,$date2,$client);
            $datas=array();
            foreach($production as $values){
                $nom=array($values['nomc'],floatval($values['estime']/$values['somme']));
                $ref=array(' ',1);
                array_push($datas,$nom);
                array_push($datas,$ref);
            }
        }
        else{
        $production = $this->getDoctrine()->getRepository('AppBundle:Production')->statClients($date1,$date2);
        
            $datas=array();
            foreach($production as $values){
                $nom=array($values['nomc'],floatval($values['somme']));
                array_push($datas,$nom);
            }
        }
        $prodtemps= $this->getDoctrine()->getRepository('AppBundle:Production')->tempProd($date1,$date2);

        $ob = new Highchart();
        $ob->chart->renderTo('linechart');
        $ob->title->text('Chart Title');
        $ob->chart->type('pie');
        $series = array(
            array( 
              "data" => $datas)
        );
    
        $ob->series($series);

       return $this->render('@App/production/statclient.html.twig',array('superviseur'=>$superviseur,
       'employes'=> $employes, 'clients' => $clients,'productions'=> $production, 'chart' => $ob ,'tempProd'=> $prodtemps
	   ));
    }
    
     /**
     * @Route("/chart", name="chart")
     */
    public function chartAction()
    {

        // Chart
        $series = array(
            array("name" => "Data Serie Name",    "data" => array(1,2,4,5,6,3,18))
        );
    
        $ob = new Highchart();
        $ob->chart->renderTo('linechart');
        
          // The #id of the div where to render the chart
        $ob->title->text('Chart Title');
        $ob->xAxis->title(array('text'  => "Horizontal axis title"));
        $ob->yAxis->title(array('text'  => "Vertical axis title"));
   
        $ob->series($series);
    
        return $this->render('@App/pages/chart.html.twig', array(
            'chart' => $ob
        ));
    }
}
