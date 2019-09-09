<?php

namespace PlaningBundle\Controller;

use PlaningBundle\Entity\Commande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Commande controller.
 *
 * @Route("commande")
 */
class CommandeController extends Controller
{
    /**
     * Lists all commande entities.
     *
     * @Route("/", name="commande_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commandes = $em->getRepository('PlaningBundle:Commande')->findAll();

        return $this->render('@Planing/commande/index.html.twig', array(
            'commandes' => $commandes,
        ));
    }

    /**
     * Creates a new commande entity.
     *
     * @Route("/new", name="commande_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $commande = new Commande();

        $em = $this->getDoctrine()->getManager();
        $clients = $em->getRepository('AppBundle:Clients')->findAll();

        $commerce = $em->getRepository('AppBundle:Users')->findByPoste('COMMERCIAL');
        $account = $em->getRepository('AppBundle:Users')->findByFonction('account manager');
        $manager = $em->getRepository('AppBundle:Users')->findByFonction('manager');
        $da = $em->getRepository('AppBundle:Users')->findByPoste('DA');
        $equipe = $em->getRepository('AppBundle:Users')->findByFonction('graphiste');
        $totalProduit = $em->getRepository('PlaningBundle:Product')->findAll();

        // post formulaire 
        $client=($request->get('clients'));

        $design=($request->get('design')); 
        $ref=($request->get('ref'));
        $devis=($request->get('devis'));
        $commercial=$request->get('commerce'); 
        $accot=$request->get('account'); 

        //step2
        $deadline=$request->get('Deadline'); 
        $breif=$request->get('brief'); 
        $recpt=$request->get('reception'); 
        $lancement=$request->get('prod'); 
        
     
        //step3
        $produits=($request->get('produit'));
        $livrable=($request->get('livrable'));
        $quantite=($request->get('quantite'));

        $equipes=($request->get('equipes'));
        $managers=$request->get('manager'); 
        $das=$request->get('da'); 
        //step4
        $lien=($request->get('lien')); 
        $etat=($request->get('etat')); 
        $comment=$request->get('comment'); 
     
        
        $form =$request->get('valider_commande');
 
        if ($form !=null ) {

            $commande = new Commande();
            $commande->setNom($client);

            $commande->setDesignation($design);
            $commande->setRef($ref);
            $commande->setDevis($devis);
            $commande->setCommercial($commercial);
            $commande->setManager($accot);
            $commande->setDeadline($deadline);
            $commande->setBrief($breif);
            $commande->setReception($recpt);
            $commande->setDelancement($lancement);
            $commande->setProduit($produits);
            $commande->setLivrable($livrable);
            $commande->setQuantite($quantite);
            $commande->setEquipe($equipes);
            $commande->setManagr($managers);
            $commande->setDa($das);
            $commande->setLien($lien);
            $commande->setAvancement($etat);
            $commande->setCommentaire($comment);

            $em->persist($commande);
            $em->flush();

            return $this->redirectToRoute('commande_show', array('id' => $commande->getId()));
        }

        return $this->render('@Planing/commande/new.html.twig', array(
            'commande' => $commande,'clients'=>$clients,'commerce'=>$commerce,'account'=>$account,'manager'=>$manager,'da'=>$da,'equipe'=>$equipe,'totalProduit'=>$totalProduit
        ));
    }

    /**
     * Finds and displays a commande entity.
     *
     * @Route("/{id}", name="commande_show")
     * @Method("GET")
     */
    public function showAction(Commande $commande)
    {
        $deleteForm = $this->createDeleteForm($commande);

        return $this->render('@Planing/commande/show.html.twig', array(
            'commande' => $commande,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing commande entity.
     *
     * @Route("/{id}/edit", name="commande_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Commande $commande)
    {
        $deleteForm = $this->createDeleteForm($commande);
        $editForm = $this->createForm('PlaningBundle\Form\CommandeType', $commande);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commande_index');
        }

        return $this->render('@Planing/commande/edit.html.twig', array(
            'commande' => $commande,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a commande entity.
     *
     * @Route("/{id}", name="commande_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Commande $commande)
    {
        $form = $this->createDeleteForm($commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commande);
            $em->flush();
        }

        return $this->redirectToRoute('commande_index');
    }

    /**
     * Creates a form to delete a commande entity.
     *
     * @param Commande $commande The commande entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Commande $commande)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commande_delete', array('id' => $commande->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
