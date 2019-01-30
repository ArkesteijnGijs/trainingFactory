<?php
/**
 * Created by PhpStorm.
 * User: 302543540
 * Date: 1/16/2019
 * Time: 9:01 AM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Lesson;
use AppBundle\Entity\Member;
use AppBundle\Entity\Training;
use AppBundle\Form\LessonType;
use AppBundle\Form\MemberType;
use AppBundle\Form\TrainingType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class BegeleidersController extends Controller
{
    /**
     * @Route("/begeleiders/lesplannen")
     */
    public function newAction(Request $request){

        $newlesson = new Lesson();
        $form=$this->createForm(LessonType::class,$newlesson);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $member=$form->getData();
            $em = $this->getDoctrine()->getManager();

            $em ->persist($member);

            $em->flush();
            $this->addFlash('success', 'Lesson created');
        }
        return $this->render('/begeleiders/lesPlannen.html.twig',[
            'lessonform' => $form->createView()
        ]);
    }


    /**
     * @Route("/begeleiders/agenda", name="agenda")
     */
    public function begeleidersAgendaAction(){
        return $this->render('begeleiders/agenda.html.twig');
    }
    /**
     * @Route("/begeleiders/home", name="begeleiders")
     */
    public function begeleidersHomeAction(){
        return $this->render('begeleiders/home.html.twig');
    }
    /**
     * @Route("/begeleiders/inschrijvingen")
     */
    public function begeleidersInschrijvingenAction(){
        return $this->render('begeleiders/inschrijvingen.html.twig');
    }
    /**
     * @Route("/inschrijvingen")
     */
    public function testaction(){
        return $this->render('leden/inschrijvingen.html.twig');
    }

}