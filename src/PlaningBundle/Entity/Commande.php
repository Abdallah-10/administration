<?php

namespace PlaningBundle\Entity;

use App\Entity\PublishedDateEntityInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="PlaningBundle\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="nom", type="string")
     */
    private $nom;



    /**
     * @var array
     *
     * @ORM\Column(name="designation", type="array")
     */
    private $designation;

    /**
     * @var array
     *
     * @ORM\Column(name="livrable", type="array")
     */
    private $livrable;

    /**
     * @var array
     *
     * @ORM\Column(name="ref", type="array")
     */
    private $ref;

    /**
     * @var array
     *
     * @ORM\Column(name="devis", type="array")
     */
    private $devis;

    /**
     * @var string
     *
     * @ORM\Column(name="commercial", type="string", length=255)
     */
    private $commercial;

    /**
     * @var string
     *
     * @ORM\Column(name="manager", type="string", length=255)
     */
    private $manager;

    /**
     * @var string
     *
     * @ORM\Column(name="brief", type="string", length=255)
     */
    private $brief;

    /**
     * @var string
     *
     * @ORM\Column(name="reception", type="string", length=255)
     */
    private $reception;

    /**
     * @var string
     *
     * @ORM\Column(name="delancement", type="string", length=255)
     */
    private $delancement;

    /**
     * @var string
     *
     * @ORM\Column(name="deadline", type="string", length=255)
     */
    private $deadline;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255, nullable=true)
     */
    private $statut;

    /**
     * @var string
     *
     * @ORM\Column(name="produit", type="string")
     */
    private $produit;

    /**
     * @var string
     *
     * @ORM\Column(name="quantite", type="string")
     */
    private $quantite;

    /**
     * @var string
     *
     * @ORM\Column(name="managr", type="string", length=255)
     */
    private $managr;

    /**
     * @var string
     *
     * @ORM\Column(name="da", type="string", length=255)
     */
    private $da;

    /**
     * @var array
     *
     * @ORM\Column(name="equipe", type="array")
     */
    private $equipe;

    /**
     * @var string
     *
     * @ORM\Column(name="avancement", type="string", length=255)
     */
    private $avancement;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=255)
     */
    private $lien;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255)
     */
    private $commentaire;

    /**
     * @var int
     *
     * @ORM\Column(name="retour", type="integer")
     */
    private $retour;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param integer $nom
     *
     * @return Commande
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return int
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set designation
     *
     * @param array $designation
     *
     * @return Commande
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return array
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set ref
     *
     * @param array $ref
     *
     * @return Commande
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return array
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set livrable
     *
     * @param array livrable
     *
     * @return Commande
     */
    public function setLivrable($livrable)
    {
        $this->livrable = $livrable;

        return $this;
    }

    /**
     * Get livrable
     *
     * @return array
     */
    public function getLivrable()
    {
        return $this->livrable;
    }

    /**
     * Set quantite
     *
     * @param string $quantite
     *
     * @return Commande
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return string
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
    /**
     * Set devis
     *
     * @param array $devis
     *
     * @return Commande
     */
    public function setDevis($devis)
    {
        $this->devis = $devis;

        return $this;
    }

    /**
     * Get devis
     *
     * @return array
     */
    public function getDevis()
    {
        return $this->devis;
    }

    /**
     * Set commercial
     *
     * @param string $commercial
     *
     * @return Commande
     */
    public function setCommercial($commercial)
    {
        $this->commercial = $commercial;

        return $this;
    }

    /**
     * Get commercial
     *
     * @return string
     */
    public function getCommercial()
    {
        return $this->commercial;
    }

    /**
     * Set manager
     *
     * @param string $manager
     *
     * @return Commande
     */
    public function setManager($manager)
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * Get manager
     *
     * @return string
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Set brief
     *
     * @param string $brief
     *
     * @return Commande
     */
    public function setBrief($brief)
    {
        $this->brief = $brief;

        return $this;
    }

    /**
     * Get brief
     *
     * @return string
     */
    public function getBrief()
    {
        return $this->brief;
    }

    /**
     * Set reception
     *
     * @param string $reception
     *
     * @return Commande
     */
    public function setReception($reception)
    {
        $this->reception = $reception;

        return $this;
    }

    /**
     * Get reception
     *
     * @return string
     */
    public function getReception()
    {
        return $this->reception;
    }

    /**
     * Set delancement
     *
     * @param string $delancement
     *
     * @return Commande
     */
    public function setDelancement($delancement)
    {
        $this->delancement = $delancement;

        return $this;
    }

    /**
     * Get delancement
     *
     * @return string
     */
    public function getDelancement()
    {
        return $this->delancement;
    }

    /**
     * Set deadline
     *
     * @param string $deadline
     *
     * @return Commande
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * Get deadline
     *
     * @return string
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Commande
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set produit
     *
     * @param integer $produit
     *
     * @return Commande
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return string
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set managr
     *
     * @param string $managr
     *
     * @return Commande
     */
    public function setManagr($managr)
    {
        $this->managr = $managr;

        return $this;
    }

    /**
     * Get managr
     *
     * @return string
     */
    public function getManagr()
    {
        return $this->managr;
    }

    /**
     * Set da
     *
     * @param string $da
     *
     * @return Commande
     */
    public function setDa($da)
    {
        $this->da = $da;

        return $this;
    }

    /**
     * Get da
     *
     * @return string
     */
    public function getDa()
    {
        return $this->da;
    }

    /**
     * Set equipe
     *
     * @param array $equipe
     *
     * @return Commande
     */
    public function setEquipe($equipe)
    {
        $this->equipe = $equipe;

        return $this;
    }

    /**
     * Get equipe
     *
     * @return array
     */
    public function getEquipe()
    {
        return $this->equipe;
    }

    /**
     * Set avancement
     *
     * @param string $avancement
     *
     * @return Commande
     */
    public function setAvancement($avancement)
    {
        $this->avancement = $avancement;

        return $this;
    }

    /**
     * Get avancement
     *
     * @return string
     */
    public function getAvancement()
    {
        return $this->avancement;
    }

    /**
     * Set lien
     *
     * @param string $lien
     *
     * @return Commande
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Commande
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set retour
     *
     * @param integer $retour
     *
     * @return Commande
     */
    public function setRetour($retour)
    {
        $this->retour = $retour;

        return $this;
    }

    /**
     * Get retour
     *
     * @return int
     */
    public function getRetour()
    {
        return $this->retour;
    }



    /**
     * Get clients
     *
     * @return AppBundle\Entity\Clients
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Set product
     *
     * @param PlaningBundle\Entity\Product $product
     *
     * @return Production
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return PlaningBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    public function setPublished(\DateTimeInterface $published): PublishedDateEntityInterface
    {
        // TODO: Implement setPublished() method.
    }
}

