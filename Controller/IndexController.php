<?php

namespace Kamran\ActivityBundle\Controller;


//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
//use FOS\RestBundle\Controller\FOSRestController as BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;

use Kamran\CoreBundle\Controller\RestController;

use Kamran\ActivityBundle\Entity\ActivitySites;
use Kamran\ActivityBundle\Entity\Countries;
use Kamran\ActivityBundle\Form\InfoFormType;
use Kamran\ActivityBundle\Form\CountriesType;


/**
 * Dashboard controller.
 *
 * @Route("/activity")
 */

class IndexController extends RestController
{


    /**
     * @Route("/",name="siteinfo_index")
     * @Template()
     */
    public function indexAction(){


        $request = $this->get('request_stack')->getCurrentRequest();
        //$content = $request->getContent();


        //echo get_class($this->getRequest());


        return array();
    }

    /**
     * @Route("/save",name="siteinfo_save" , options={"expose"=true})
     */
    public function saveAction(Request $request){
        //$data = $this->getRequestJson();
        $title = $request->get('title');
        return new JsonResponse(array('title'=>$title,'version'=>'Yellow'));
        //return new JsonResponse(array('name' => "Kamran Shahzad"));
    }



    /**
     * Displays a form to create a new Links entity.
     *
     * @Route("/add", name="tags_new")
     * @Template()
     */
    public function newAction(){

        $entity = new ActivitySites();
        $form = $this->createForm(new InfoFormType ,$entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }



    /**
     * Displays a form to create a new Links entity.
     *
     * @Route("/addcountry", name="activity_addcountry")
     * @Template()
     */
    public function addcountryAction(Request $request){

        $entity = new Countries();
        $form = $this->createForm(new CountriesType ,$entity);

        if ($request->getMethod() === 'POST'){
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
                echo "Data Saved";
            }
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }










}

