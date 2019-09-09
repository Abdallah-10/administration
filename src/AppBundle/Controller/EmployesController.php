<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Users;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use AppBundle\Form\UsersType;

class EmployesController extends Controller
{
    /**
     * @Route("/employes", name="employes")
     */
    public function employeAction(Request $request)
    {

        $employes= new Users();

        $em=$this->getDoctrine()->getManager();
        $employes=$em->getRepository('AppBundle:Users')->findAll();

      /**
      * @ var $paginator \Knp\Component\Pager\Paginator
      */
      $paginator=$this->get('knp_paginator');
      $results = $paginator->paginate(
          $employes, /* query NOT result */
          $request->query->getInt('page', 1), /*page number*/
          8 /*limit per page*/
      );

   

      return $this->render('@App/pages/employes.html.twig', array(
          'employes'=>$results
      ));
    }

     /**
     * @Route("/employes_list", name="employes_list")
     */
    public function employeListAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')===true) {
            
        $employes= new Users();
        $em=$this->getDoctrine()->getManager();
     
       
        $nom=$request->get('search');
      

        //filtrer
                    $deprt=$request->get('deprt');
                    $fonct=$request->get('fonction');
                    $niv=$request->get('niveau');
                    $site=$request->get('site');
                    $type=$request->get('typec');
                    $filt=$request->get('filtrer');
                    
                    if($filt != null){
                            $employes = $this->getDoctrine()->getRepository('AppBundle:Users')->triUsers($deprt,$fonct,$niv,$site,$type);
                            if($nom != null){
                                $employes=$em->getRepository('AppBundle:Users')->findBy(['nom'=>$nom]);
                            }

                    /**
                     * @ var $paginator \Knp\Component\Pager\Paginator
                    */
                        $paginator=$this->get('knp_paginator');
                        $results = $paginator->paginate(
                            $employes, /* query NOT result */
                            $request->query->getInt('page', 1), /*page number*/
                            180 /*limit per page*/
                        );

                        return $this->render('@App/pages/employeslist.html.twig', array(
                            'employes'=>$results
                        )); 
                    }else{
                        $employes=$em->getRepository('AppBundle:Users')->findAll();
                        if($nom != null){
                            $employes=$em->getRepository('AppBundle:Users')->findBy(['nom'=>$nom]);
                        }
                    /**
                     * @ var $paginator \Knp\Component\Pager\Paginator
                    */
                    $paginator=$this->get('knp_paginator');
                    $results = $paginator->paginate(
                        $employes, /* query NOT result */
                        $request->query->getInt('page', 1), /*page number*/
                        8 /*limit per page*/
                    );
                        return $this->render('@App/pages/employeslist.html.twig', array(
                            'employes'=>$results
                        )); 
                    }
            }
            else{
                return $this->render('@App/pages/out.html.twig'
            );
            }   
    }

     /**
     * @Route("/ajout_list", name="ajout_list")
     */
    public function createListAction(Request $request)
    {
      
        $employes= new Users();
        $form = $this->createFormBuilder($employes)
        ->add('nom',TextType::class,array('attr'=>array('class'=>'form-control')))
        ->add('prenom',TextType::class,array('attr'=>array('class'=>'form-control')))
        ->add('telephone',IntegerType::class,array('attr'=>array('class'=>'form-control')))
        ->add('pass_word',TextType::class,array('attr'=>array('class'=>'form-control')))
        ->add('email',TextType::class,array('attr'=>array('class'=>'form-control')))
        ->add('avatar',FileType::class,array('attr'=>array('class'=>'form-control')))
        ->add('poste', ChoiceType::class, array(
            'choices'   => array(
                'B2B SCÈNE'   => 'B2B SCÈNE',
                'B2B CANAPE' => 'B2B CANAPE',
                'DEV'   => 'DEV',
                'ADMIN'   => 'ADMIN',
                'TFR'   => 'TFR',
                'COMMERCIAL'   => 'COMMERCIAL',
                'DA'   => 'DA',
            ),
            
        ))
        ->add('fonction', ChoiceType::class, array(
            'choices'   => array(
                'graphiste'   => 'graphiste',
                'manager' => 'manager',
                'DEV'   => 'DEV',
                'account manager'   => 'account manager',
                'technicien'   => 'technicien',               
            ),
            
        ))
        ->add('niveau', ChoiceType::class, array(
            'choices'   => array(
                'junior'   => 'junior',
                'medium' => 'medium',
                'senior'   => 'senior',             
            ),
            
        ))
        ->add('site', ChoiceType::class, array(
            'choices'   => array(
                'Tunis'   => 'Tunis',
                'Paris' => 'Paris',
                'Tourcoing'   => 'Tourcoing',             
            ),
            
        ))
        ->add('type_contrat', ChoiceType::class, array(
            'choices'   => array(
                'CDI'   => 'CDI',
                'CDI EXO2' => 'CDI EXO2',
                'CDI EXO5'   => 'CDI EXO5',  
                'CDD'   => 'CDD',  
                'CDD EXO2'   => 'CDD EXO2',  
                'CDD EXO5'   => 'CDD EXO5',  
                'SIVP 1'   => 'SIVP 1',  
                'SIVP 2'   => 'SIVP 2',  
                'CAIP'   => 'CAIP',  
                'SIDES'   => 'SIDES',             
            ),
            
        ))
        ->add('conge',NumberType::class,array('attr'=>array('class'=>'form-control')))
        ->add('taux',NumberType::class,array('attr'=>array('class'=>'form-control')))
       // ->add('active',IntegerType::class,array('attr'=>array('class'=>'form-control')))
        ->add('date',BirthdayType::class,array('attr'=>array('class'=>'form-control')))
        ->add('birthday',BirthdayType::class,array('attr'=>array('class'=>'form-control ')))
        ->add('save',SubmitType::class,array('label'=>'save','attr'=>array('class'=>'btn btn-success')))
        ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted()){

            $nom=$form['nom']->getData();
            $prenom=$form['prenom']->getData();
            $telephone=$form['telephone']->getData();
            $pass_word=$form['pass_word']->getData();
            $email=$form['email']->getData();
            $avatar=$form['avatar']->getData();
            $poste=$form['poste']->getData();
            $taux=$form['taux']->getData();
            //$active=$form['active']->getData();
            $date=$form['date']->getData();
            $birthday=$form['birthday']->getData();

            $file = $form->get('avatar')->getData();
            $fileName = $nom.$prenom. '.jpg';
            
            $fonction=$form['fonction']->getData();
            $niveau=$form['niveau']->getData();
            $site=$form['site']->getData();
            $type_contrat=$form['type_contrat']->getData();

           
            $employes->setFonction($fonction);
            $employes->setNiveau($niveau);
            $employes->setSite($site);
            $employes->setTypeContrat($type_contrat);
           
            $employes->setNom($nom);
            $employes->setPrenom($prenom);
            $employes->setTelephone($telephone);
            $employes->setPassWord($pass_word);
            $employes->setEmail($email);
            $employes->upload();
            $employes->setAvatar($fileName);
            $employes->setPoste($poste);
            $employes->setAvis(0);
            $employes->setActive(0);
            $employes->setDate($date);
            $employes->setTaux($taux);
            $employes->setBirthday($birthday);

            
            $em=$this->getDoctrine()->getManager();
            $em->persist($employes);
            $em->flush();
            $this->addFlash('mess','employee ajouter avec succes');
           
            return  $this->redirectToRoute('employes_list');
           
        }
       return $this->render('@App/pages/ajoutListe.html.twig',[
            'form'=>$form->createView()
        ]);
    }

    
    /**
     * @Route("/list", name="list")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:Users')->findAll();

        return $this->render('@App/pages/list.html.twig', array(
            'users' => $users,
        ));
    }

     /**
     * @Route("/show/{id}", name="show")
     */
    public function showAction(Users $user)
    {

        return $this->render('@App/pages/show.html.twig', array(
            'user' => $user,
        ));
    }
    /**
     * @Route("/edit_list/{id}", name="edit")
     */
    public function editlistAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $employe= new Users();
        $employe=$em->getRepository('AppBundle:Users')->find($id);
        $form_ajout=$this->createForm(new UsersType(),$employe);
        if ($request->isMethod('post')){
            $form_ajout->handleRequest($request);
            if ($form_ajout->isValid()){

                $em->persist($employe);
                $em->flush();
                return  $this->redirectToRoute('index_article');
            }
        }
        return $this->render('@App/pages/editListe.html.twig', array(
            'form'=>$form_ajout->createView()
        ));
    }

    /**
     * @Route("/search", name="search")
     */
    public function searchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $requestString = $request->get('q');
        
        $Users =  $em->getRepository('AppBundle:Users')->findBy(array('nom' => $requestString ));
        dump($Users);die();
        return $this->render('@App/pages/editListe.html.twig', array(
            'form'=>$Users
        ));
    }

   
	
    /**
     * @Route("/employes_dev", name="employes_dev")
     */
    public function employeDevAction(Request $request)
    {
        $employes= new Users();
        $em=$this->getDoctrine()->getManager();
        $employes=$em->getRepository('AppBundle:Users')->findBy(array('poste' => 'DEV'));
        
      /**
      * @ var $paginator \Knp\Component\Pager\Paginator
      */
        $paginator=$this->get('knp_paginator');
        $results = $paginator->paginate(
            $employes, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            8 /*limit per page*/
        );
        return $this->render('@App/pages/listDetail.html.twig',[
            'employes'=>$employes,'employes'=>$results
        ]);
    }
	 /**
     * @Route("/employes_tfr", name="employes_tfr")
     */
    public function employeTfrAction(Request $request)
    {
        $employes= new Users();
        $em=$this->getDoctrine()->getManager();
        $employes=$em->getRepository('AppBundle:Users')->findBy(array('poste' => 'TFR'));
        
      /**
      * @ var $paginator \Knp\Component\Pager\Paginator
      */
        $paginator=$this->get('knp_paginator');
        $results = $paginator->paginate(
            $employes, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            8 /*limit per page*/
        );
        return $this->render('@App/pages/listTfr.html.twig',[
            'employes'=>$employes,'employes'=>$results
        ]);
    }
	    /**
     * @Route("/employes_canape", name="employes_canape")
     */
    public function employeCanapeAction(Request $request)
    {
        $employes= new Users();
        $em=$this->getDoctrine()->getManager();
        $employes=$em->getRepository('AppBundle:Users')->findBy(array('poste' => 'CANAPE'));
        
      /**
      * @ var $paginator \Knp\Component\Pager\Paginator
      */
        $paginator=$this->get('knp_paginator');
        $results = $paginator->paginate(
            $employes, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            8 /*limit per page*/
        );
        return $this->render('@App/pages/listCanape.html.twig',[
            'employes'=>$employes,'employes'=>$results
        ]);
    }
	    /**
     * @Route("/employes_admin", name="employes_admin")
     */
    public function employeAdminAction(Request $request)
    {
        $employes= new Users();
        $em=$this->getDoctrine()->getManager();
        $employes=$em->getRepository('AppBundle:Users')->findBy(array('poste' => 'ADMIN'));
        
      /**
      * @ var $paginator \Knp\Component\Pager\Paginator
      */
        $paginator=$this->get('knp_paginator');
        $results = $paginator->paginate(
            $employes, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            8 /*limit per page*/
        );
        return $this->render('@App/pages/listAdmin.html.twig',[
            'employes'=>$employes,'employes'=>$results
        ]);
    }
	    /**
     * @Route("/employes_btb", name="employes_btb")
     */
    public function employeBtobAction(Request $request)
    {
        $employes= new Users();
        $em=$this->getDoctrine()->getManager();
        $employes=$em->getRepository('AppBundle:Users')->findBy(array('poste' => 'B2B'));
        
      /**
      * @ var $paginator \Knp\Component\Pager\Paginator
      */
        $paginator=$this->get('knp_paginator');
        $results = $paginator->paginate(
            $employes, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            8 /*limit per page*/
        );
        return $this->render('@App/pages/listBtb.html.twig',[
            'employes'=>$employes,'employes'=>$results
        ]);
    }

     /**
     * @Route("/employes_list/{id}", name="edit_list")
     */

    public function editAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $employe= new Users();
        $employe=$em->getRepository('AppBundle:Users')->find($id);
        $form_ajout=$this->createForm(new UsersType(),$employe);
        if ($request->isMethod('post')){
            $form_ajout->handleRequest($request);
            if ($form_ajout->isValid()){

                $em->persist($employe);
                $em->flush();
                return  $this->redirectToRoute('employe_list');
            }
        }
        return $this->render('@App/pages/editList.html.twig', array(
            'form'=>$form_ajout->createView()
        ));
    }
	
    /**
     * @Route("/delete_list/{id}", name="delete_list")
     */

    public function deleteAction($id)
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')===true) {
          
        $em=$this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:Users')->find($id);
        $em->remove($users);
        $em->flush();
        return  $this->redirectToRoute('employes_list');
        }
        else{
            return $this->redirectToRoute('employes_list');
        }
    }
}
