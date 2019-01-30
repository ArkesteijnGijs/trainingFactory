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
 * @ORM\Table(name="lesson")
 */
class Lesson
{
    /**
     * @ORM\OneToMany(targetEntity="Registration", mappedBy="lesson")
     */
    private $registrations;
    public function __construct()
    {
        $this->registrations= new ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="Training", inversedBy="lessons")
     * @ORM\JoinColumn(name="training_id", referencedColumnName="id")
     */
    private $trainingen;

    /**
     * @return mixed
     */
    public function getTrainingen()
    {
        return $this->trainingen;
    }

    /**
     * @param mixed $trainingen
     */
    public function setTrainingen($trainingen)
    {
        $this->trainingen = $trainingen;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Instructor", inversedBy="lessons")
     * @ORM\JoinColumn(name="instructor_id", referencedColumnName="id")
     */
    private $instructor;

    /**
     * @return mixed
     */
    public function getInstructor()
    {
        return $this->instructor;
    }

    /**
     * @param mixed $instructor
     */
    public function setInstructor($instructor)
    {
        $this->instructor = $instructor;
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="time")
     */
    private $time;
    /**
     * @ORM\Column(type="date")
     */
    private $date;
    /**
     * @ORM\Column(type="string")
     */
    private $location;
    /**
     * @ORM\Column(type="string")
     */
    private $max_persons;

     public function __call($name, $arguments)
     {
         // TODO: Implement __call() method.
     }

    /**
     * @return mixed
     */
    public function getMaxPersons()
    {
        return $this->max_persons;
    }

    /**
     * @param mixed $max_persons
     */
    public function setMaxPersons($max_persons)
    {
        $this->max_persons = $max_persons;
    }
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
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

}