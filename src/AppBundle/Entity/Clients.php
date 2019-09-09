<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clients
 *
 * @ORM\Table(name="clients")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientsRepository")
 */
class Clients
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
     * @ORM\Column(name="nomc", type="string", length=255)
     */
    private $nomc;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;


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
     * Set nomc
     *
     * @param string $nomc
     *
     * @return Clients
     */
    public function setNomc($nomc)
    {
        $this->nomc = $nomc;

        return $this;
    }

    /**
     * Get nomc
     *
     * @return string
     */
    public function getNomc()
    {
        return $this->nomc;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Clients
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}

