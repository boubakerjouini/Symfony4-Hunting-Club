<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Article;
use BlogBundle\Entity\Commentaire;
use BlogBundle\Entity\User;
use BlogBundle\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Article controller.
 *
 * @Route("blog")
 */
class ArticleController extends Controller
{

    /**
     * Lists all article entities.
     *
     * @Route("/admin", name="article_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('BlogBundle:Article')->findAll();
        $dql = "SELECT bp FROM BlogBundle:Article bp";
        $query = $em->createQuery($dql);

        $form = $this->createFormbuilder()
            ->add('nbco',ChoiceType::class, [
                'choices'  => [
                    '5' => 5,
                    '10' => 10,
                    '20' => 20,
                    '30' => 30,
                    '50' => 50,
                    '100' => 100,
                ],
            ])

            ->getForm();




        if ($request->request->get('form')['nbco']!=null) {
            $nbcom = $request->request->get('form')['nbco'];
        }
        else {
            $nbcom=5;
        }
        dump($nbcom);

        $paginator=$this->get('knp_paginator');
        $result = $paginator->paginate(
            $query,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',$nbcom)
        );

        return $this->render('article/index.html.twig', array(
            'articles' => $result,
            'form' => $form->createView(),
        ));
    }
    /**
     * Lists all article entities.
     *
     * @Route("/", name="article_liste")
     * @Method("GET")
     */
    public function listeArticle(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('BlogBundle:Article')->findAll();
        $paginator=$this->get('knp_paginator');

        $result = $paginator->paginate(
            $articles,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );
        return $this->render('article/frontShow.html.twig', array(
            'articles' => $result,
        ));
    }




    /**
     * Creates a new article entity.
     *
     * @Route("/new", name="article_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm('BlogBundle\Form\ArticleType', $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $article->UploadProfilePicture();
            $today = date("F j, Y");
            $article->setDateAjout($today);
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_show', array('id' => $article->getId()));
        }

        return $this->render('article/new.html.twig', array(
            'article' => $article,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a article entity.
     *
     * @Route("/admin/{id}", name="article_show")
     * @Method("GET")
     */
    public function showAction(Article $article) {
        $deleteForm = $this->createDeleteForm($article);

        return $this->render('article/show.html.twig', array(
            'article' => $article,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finds and displays a article entity.
     *
     * @Route("/{id}", name="article_post")
     * @Method("GET")
     */
    public function frontPost(Article $article, Request $request, $id) {
        $deleteForm = $this->createDeleteForm($article);
        $em=$this->getDoctrine()->getManager();
        $id= $em->getRepository('BlogBundle:Article')->find($id);
        $query = $em->createQuery(" SELECT a FROM BlogBundle:Commentaire a WHERE a.idArticle=:id ");

        $query->setParameter('id',$id);
        $commentaire = $query->getResult();

        $commentaires = new Commentaire();
        $form = $this->createForm('BlogBundle\Form\CommentaireType', $commentaires);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $commentaires->setIdArticle($id);
            $today = date("F j, Y");
            $commentaires->setDateAjout($today);
            $commentaires->setIdUser($user);
            $commentaires->setNbjaime(0);
            $em = $this->getDoctrine()->getManager();
           // $article->UploadProfilePicture();
            $em->persist($commentaires);
            $em->flush();

            return $this->redirectToRoute('article_post', array('id' => $article->getId()));
        }

        $kk=$request->query->get('comid');
        if($kk!=null) {
        $id= $em->getRepository('BlogBundle:Commentaire')->find($kk);


        if ($id!=null) {
            $var= (int) ($id->getNbjaime()+$request->query->get('like'));
            $id->setNbjaime($var);

            $em = $this->getDoctrine()->getManager();
            // $article->UploadProfilePicture();
            $em->persist($id);
            $em->flush();

            return $this->redirectToRoute('article_post', array('id' => $article->getId()));
        }
        }

        return $this->render('article/frontPost.html.twig', array(
            'commentaire' => $commentaire,
            'form' => $form->createView(),
            'article' => $article,
            'delete_form' => $deleteForm->createView(),
        ));
    }











    /**
     *
     * @Route("/front", name="article_show2")
     * @Method("GET")
     */
    public function showAction2() {

        $em = $this->getDoctrine()->getManager();

        $article=$em->getRepository('BlogBundle:Article')->findAll();


        return $this->render('article/frontShow.html.twig', array(
            'article' => $article,
        ));
    }

    /**
     * Displays a form to edit an existing article entity.
     *
     * @Route("/admin/{id}/edit", name="article_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, $id)
    {

        $em=$this->getDoctrine()->getManager();
        $p= $em->getRepository('BlogBundle:Article')->find($id);
        $form=$this->createForm(ArticleType::class,$p);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $p->setPhotopath($p->getPhotopath());
            $p->UploadProfilePicture();
            $today = date("F j, Y");
            $p->setDateModif($today);
            $em= $this->getDoctrine()->getManager();
            $em->persist($p);
            $em->flush();


        }
        return $this->render('article/edit.html.twig', array(
            "edit_form"=> $form->createView()
        ));
    }

    /**
     * Deletes a article entity.
     *
     * @Route("/{id}/delete", name="article_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Article $article, $id)
    {

        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($article);
        $em->flush();


        return $this->redirectToRoute('article_index');
    }

    /**
     * Deletes a commentaire entity.
     *
     * @Route("/{id}/del", name="commentaire_deleteFront")
     * @Method("DELETE")
     */
    public function deleteActionCom(Request $request, Commentaire $commentaire, $id)
    {


        $commentaire = $this->getDoctrine()->getRepository(Commentaire::class)->find($id);
        $ids= $commentaire->getIdArticle();
        $article = $this->getDoctrine()->getRepository(Article::class)->find($ids);

        $em = $this->getDoctrine()->getManager();
        $em->remove($commentaire);
        $em->flush();


        return $this->redirectToRoute('article_post',array('id' => $article->getId()));
    }



    /**
     * Creates a form to delete a article entity.
     *
     * @param Article $article The article entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Article $article)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('article_delete', array('id' => $article->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


}
