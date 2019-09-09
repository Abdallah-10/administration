<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Images
 *
 * @ORM\Table(name="images")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImagesRepository")
 */
class Images
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;


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
     * @return Images
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
     * Set title
     *
     * @param string $title
     *
     * @return Images
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }



    /**
     * Set category
     *
     * @param string $category
     *
     * @return Images
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

         //upload image 
         private $url;

    
         public function getWebPath(){
         return null=== $this->nom ? null : $this->getUploadDir.'/'.$this->nom;
         }
         
         protected  function getUploadRootDir(){
             return __DIR__.'/../../../web/'.$this->getUploadDir();
         }
     
         protected  function getUploadDir(){
             return 'gallery/';
         }
     
         public function uploadGallery(){
            
             $this->nom->move(
                 $this->getUploadRootDir(),
                 $this->nom->getClientOriginalName());
                 $this->nom=$this->nom->getClientOriginalName();
                 $this->file=null ;
             
         }
}

