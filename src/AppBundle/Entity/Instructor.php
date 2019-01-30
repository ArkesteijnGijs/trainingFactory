<?php
/**
 * Created by PhpStorm.
 * User: 302543540
 * Date: 1/10/2019
 * Time: 12:12 PM
 */

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="instructor")
 */
class Instructor
{
    /**
     * @ORM\OneToMany(targetEntity="Lesson", mappedBy="instructor")
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
     */private $id;
    /**
     * @ORM\Column(type="string")
     */private $loginname;
    /**
     * @ORM\Column(type="string")
     */private $password;
    /**
     * @ORM\Column(type="string")
     */private $firstname;
    /**
     * @ORM\Column(name="preprovision", nullable=true, type="string")
     */private $preprovision;
    /**
     * @ORM\Column(type="string")
     */private $lastname;
    /**
     * @ORM\Column(type="date")
     */private $birthdate;
    /**
     * @ORM\Column(type="date")
     */
    private $hiringDate;

    /**
     * @return mixed
     */
    public function getHiringDate()
    {
        return $this->hiringDate;
    }

    /**
     * @param mixed $hiringDate
     */
    public function setHiringDate($hiringDate)
    {
        $this->hiringDate = $hiringDate;
    }
    /**
     * @ORM\Column(type="string")
     */private $salary;
    /**
     * @ORM\Column(type="string")
     */private $social_sec_number;
     private $instructor;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLessons()
    {
        return $this->lessons;
    }

    /**
     * @param mixed $lessons
     */
    public function setLessons($lessons)
    {
        $this->lessons = $lessons;
    }

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
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLoginname()
    {
        return $this->loginname;
    }

    /**
     * @param mixed $loginname
     */
    public function setLoginname($loginname)
    {
        $this->loginname = $loginname;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getPreprovision()
    {
        return $this->preprovision;
    }

    /**
     * @param mixed $preprovision
     */
    public function setPreprovision($preprovision)
    {
        $this->preprovision = $preprovision;
    }


    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    /**
     * @return mixed
     */
    public function getSocialSecNumber()
    {
        return $this->social_sec_number;
    }

    /**
     * @param mixed $social_sec_number
     */
    public function setSocialSecNumber($social_sec_number)
    {
        $this->social_sec_number = $social_sec_number;
    }

}