<?php
/**
 * Created by PhpStorm.
 * User: 302543540
 * Date: 1/10/2019
 * Time: 12:08 PM
 */

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="training")
 */
class Training
{
    /**
     * @ORM\OneToMany(targetEntity="Lesson", mappedBy="Training")
     */
    private $lessons;
    public function __construct()
    {
        $this->lessons = new ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $name;
    /**
     * @ORM\Column(type="string")
     */
    private $description;
    /**
     * @ORM\Column(type="datetime")
     */
    private $duration;
    /**
     * @ORM\Column(type="string")
     */
    private $extracosts;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getExtraCosts()
    {
        return $this->extracosts;
    }

    /**
     * @param mixed $extracosts
     */
    public function setExtraCosts($extracosts)
    {
        $this->extracosts = $extracosts;
    }
}