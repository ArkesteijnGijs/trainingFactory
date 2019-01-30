<?php
/**
 * Created by PhpStorm.
 * User: 302543540
 * Date: 1/16/2019
 * Time: 9:01 AM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Instructor;
use AppBundle\Entity\Member;
use AppBundle\Entity\Training;
use AppBundle\Form\InstructorType;
use AppBundle\Form\MemberType;
use AppBundle\Form\TrainingType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{

    /**
     * @Route("/admin/leden", name="members")
     */
        public function showLedenAction(){
            $member = $this->getDoctrine()
                ->getRepository(Member::class)
                ->findAll();

            if (!$member) {
                throw $this->createNotFoundException(
                    'No product found for id '
                );
            }

            return $this->render("admin/leden.html.twig",[
                'leden'=>$member
            ]);
        }
    /**
     * @Route("/admin/ledenAdd")
     */
    public function ledenAddAction(Request $request)
    {
        $newmember = new Member();
        $form=$this->createForm(MemberType::class,$newmember);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $member=$form->getData();
            $em = $this->getDoctrine()->getManager();


            $em ->persist($member);

            $em->flush();
            $this->addFlash('success', 'Member created');
        }
        return $this->render('/admin/ledenAdd.html.twig',[
            'memberform' => $form->createView()
        ]);

    }

    /**
     * @Route("/admin/ledenVerwijderen/{id}", name="ledenDelete")
     */
    public function deleteLedenAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('AppBundle:Member')->find($id);

        if (!$post) {
            return $this->redirectToRoute('members');
        }

        $em->remove($post);
        $em->flush();

        return $this->redirectToRoute('members');
    }

    /**
     * @Route("/admin/ledenWijzigen/{memberId}", name="updateMembers")
     */
    public function formEditExampleAction(Request $request, $memberId)
    {
        $em = $this->getDoctrine()->getManager();
        $member = $em->getRepository('AppBundle:Member')->find($memberId);

        $form = $this->createForm(MemberType::class, $member);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            return $this->redirectToRoute('members');
        }

        return $this->render('admin/ledenWijzigen.html.twig', [
            'memberForm' => $form->createView()
        ]);
    }
    /**
     * @Route("/admin/begeleidersWijzigen/{instructeurId}", name="form_edit_example")
     */
    public function formEditAction(Request $request, $instructeurId)
    {
        $em = $this->getDoctrine()->getManager();
        $instructeur = $em->getRepository('AppBundle:Instructor')->find($instructeurId);

        $form = $this->createForm(InstructorType::class, $instructeur);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            return $this->redirectToRoute('begeleidersShow');
        }

        return $this->render('admin/begeleidersWijzigen.html.twig', [
            'begeleidersform' => $form->createView()
        ]);
    }
    /**
     * @Route("/admin/begeleidersAdd")
     */
    public function begeleidersAddAction(Request $request){

        $newinstructor = new Instructor();
        $form=$this->createForm(InstructorType::class,$newinstructor);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $instructor=$form->getData();
            $em = $this->getDoctrine()->getManager();

            $em ->persist($instructor);

            $em->flush();
            $this->addFlash('success', 'Begeleider created');
            return $this->redirectToRoute('begeleidersShow');
        }
        return $this->render('/admin/begeleidersAdd.html.twig',[
            'begeleidersform' => $form->createView()
        ]);

    }
    /**
     * @Route("/admin/begeleidersVerwijderen/{id}", name="delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('AppBundle:Instructor')->find($id);

        if (!$post) {
            return $this->redirectToRoute('begeleidersShow');
        }

        $em->remove($post);
        $em->flush();

        return $this->redirectToRoute('begeleidersShow');
    }

    /**
     * @Route("/admin/trainingsvormAdd")
     */
    public function trainingsvormAddAction(Request $request){

        $newtraining = new Training();
        $form=$this->createForm(TrainingType::class,$newtraining);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $training=$form->getData();
            $em = $this->getDoctrine()->getManager();

            $em ->persist($training);

            $em->flush();
            $this->addFlash('success', 'Training created');
        }
        return $this->render('/admin/trainingsvormAdd.html.twig',[
            'lessonform' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/trainingsvorm", name="trainingsvorm")
     */
    public function adminAction(){
        $trainingsvorm = $this->getDoctrine()
            ->getRepository(Training::class)
            ->findAll();

        if (!$trainingsvorm) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        return $this->render("admin/trainingsvorm.html.twig",[
            'trainingsform'=>$trainingsvorm
        ]);
    }

    /**
     * @Route("/admin/trainingsvormVerwijderen/{id}", name="trainingsvormDelete")
     */
    public function deleteTrainingsvormAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('AppBundle:Training')->find($id);

        if (!$post) {
            return $this->redirectToRoute('trainingsvorm');
        }

        $em->remove($post);
        $em->flush();

        return $this->redirectToRoute('trainingsvorm');
    }

    /**
     * @Route("/admin/trainingsvormWijzigen/{trainingId}", name="iets")
     */
    public function trainingEditAction(Request $request, $trainingId)
    {
        $em = $this->getDoctrine()->getManager();
        $training = $em->getRepository('AppBundle:Training')->find($trainingId);

        $form = $this->createForm(TrainingType::class, $training);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            return $this->redirectToRoute('trainingsvorm');
        }

        return $this->render('admin/trainingsvormWijzigen.html.twig', [
            'trainingsForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/begeleiders", name="begeleidersShow")
     */
    public function showBegeleidersAction(){
        $instructor = $this->getDoctrine()
            ->getRepository(Instructor::class)
            ->findAll();


        return $this->render("admin/begeleiders.html.twig",[
            'begeleiders'=>$instructor
        ]);
    }


    /**
     * @Route("/admin/home", name="admin")
     */
    public function adminhomeAction(){
        return $this->render('admin/home.html.twig');
    }
}