<?php
/**
 * Created by PhpStorm.
 * User: 302543540
 * Date: 1/28/2019
 * Time: 8:54 AM
 */

namespace AppBundle\Controller;
use AppBundle\Entity\Lesson;
use AppBundle\Entity\Member;
use AppBundle\Form\LessonType;
use AppBundle\Form\MemberType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class LedenController extends Controller
{
    /**
     * @Route("/leden/agenda", name="agenda")
     */
    public function agendaAction(){
        return $this->render('leden/agenda.html.twig');
    }
    /**
     * @Route("/leden/editAccount", name="editAccount")
     */
    public function editAction(){
        return $this->render('leden/editAccount.html.twig');
    }
    /**
     * @Route("/leden/inschrijvingen", name="inschrijvingen")
     */
    public function inschrijvingenAction(){
        return $this->render('leden/inschrijvingen.html.twig');
    }
    /**
     * @Route("/leden/home", name="leden")
     */
    public function homeAction(){
        return $this->render('leden/home.html.twig');
    }

    /**
     * @Route("/leden/trainingsvormen", name="trainingsvormen")
     */
    public function trainingsvormenAction(){
        $lesvorm = $this->getDoctrine()
            ->getRepository(Lesson::class)
            ->findAll();

        if (!$lesvorm) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        return $this->render("leden/trainingsvormen.html.twig",[
            'les'=>$lesvorm
        ]);
    }
}