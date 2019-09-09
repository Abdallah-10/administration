<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsersRepository")
 */
class Users
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="pass_word", type="string", length=255)
     */
    private $passWord;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255)
     */
    private $avatar;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=255)
     */
    private $poste;

    /**
     * @var int
     *
     * @ORM\Column(name="avis", type="integer")
     */
    private $avis;

    /**
     * @var int
     *
     * @ORM\Column(name="active", type="integer")
     */
    private $active;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="datetime")
     */
    private $birthday;

     /**
     * @var float
     *
     * @ORM\Column(name="conge", type="float")
     */
    private $conge;
    /**
     * @var float
     *
     * @ORM\Column(name="autorisation", type="float" , nullable=true)
     */
    private $autorisation=2;
    
    /**
     * @var float
     *
     * @ORM\Column(name="taux", type="float")
     */
    private $taux;

     /**
     * @var string
     *
     * @ORM\Column(name="req", type="string")
     */
    private $req;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction", type="string", length=255)
     */
    private $fonction;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", length=255)
     */
    private $niveau;
    /**
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=255)
     */
    private $site;
    /**
     * @var string
     *
     * @ORM\Column(name="type_cont", type="string", length=255)
     */
    private $type_cont;
    /**
     * @var int
     *
     * @ORM\Column(name="isNew", type="integer" , nullable=true)
     */
    private $isNew=0;

    /**
     * Get type_cont
     *
     * @return string
     */
    public function getTypeContrat()
    {
        return $this->type_cont;
    }

    /**
     * Get site
     *
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Get niveau
     *
     * @return string
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Get fonction
     *
     * @return string
     */
    public function getFonction()
    {
        return $this->fonction;
    }



    /**
     * Set fonction
     *
     * @param string $fonction
     *
     * @return Users
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;

        return $this;
    }

     /**
     * Set niveau
     *
     * @param string $niveau
     *
     * @return Users
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Set site
     *
     * @param string $site
     *
     * @return Users
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

     /**
     * Set type_cont
     *
     * @param string $type_cont
     *
     * @return Users
     */
    public function setTypeContrat($type_cont)
    {
        $this->type_cont = $type_cont;

        return $this;
    }
     /**
     * Get req
     *
     * @return string
     */
    public function getReq()
    {
        return $this->req;
    }

    /**
     * Get taux
     *
     * @return float
     */
    public function getTaux()
    {
        return $this->taux;
    }

     /**
     * Set taux
     *
     * @param float $taux
     *
     * @return Users
     */
    public function setTaux($taux)
    {
        $this->taux = $taux;

        return $this;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getConge()
    {
        return $this->conge;
    }

       /**
     * Set conge
     *
     * @param float $conge
     *
     * @return Users
     */
    public function setConge($conge)
    {
        $this->conge = $conge;

        return $this;
    }

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
     * @param string $nom
     *
     * @return Users
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Users
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Users
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set passWord
     *
     * @param string $passWord
     *
     * @return Users
     */
    public function setPassWord($passWord)
    {
        $this->passWord = $passWord;

        return $this;
    }

    /**
     * Get passWord
     *
     * @return string
     */
    public function getPassWord()
    {
        return $this->passWord;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return Users
     */
   

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    } 

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return Users
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }


   //upload image 
    private $url;

    
    public function getWebPath(){
    return null=== $this->nomavatar ? null : $this->getUploadDir.'/'.$this->nomavatar;
    }
    
    protected  function getUploadRootDir(){
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    protected  function getUploadDir(){
        return 'images/'.$this->poste;
    }

    public function upload(){
       
        $this->avatar->move(
            $this->getUploadRootDir(),
            $this->avatar->getClientOriginalName());
            $this->nomavatar=$this->avatar->getClientOriginalName();
            $this->file=null ;
        
    }


    

    /**
     * Set poste
     *
     * @param string $poste
     *
     * @return Users
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste
     *
     * @return string
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * Set avis
     *
     * @param integer $avis
     *
     * @return Users
     */
    public function setAvis($avis)
    {
        $this->avis = $avis;

        return $this;
    }

    /**
     * Get avis
     *
     * @return int
     */
    public function getAvis()
    {
        return $this->avis;
    }

    /**
     * Set active
     *
     * @param integer $active
     *
     * @return Users
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return int
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Users
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     *
     * @return Users
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }
    /**
     * Get id
     *
     * @return int
     */
    public function getAutorisation()
    {
        return $this->autorisation;
    }

    /**
     * Set autorisation
     *
     * @param float $autorisation
     *
     * @return Users
     */
    public function setAutorisation($autorisation)
    {
        $this->autorisation = $autorisation;

        return $this;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getIsNew()
    {
        return $this->isNew;
    }

    /**
     * Set isNew
     *
     * @param integer $isNew
     *
     * @return Users
     */
    public function setIsNew($isNew)
    {
        $this->isNew = $isNew;

        return $this;
    }
}

