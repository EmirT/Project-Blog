<?php
namespace App\Frontend\Modules\Chapters;
 
use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \OCFram\FormHandler;
 
class ChaptersController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $numberChapters = $this->app->config()->get('number_chapters');
    $numberCaracteres = $this->app->config()->get('number_caracteres');
 
    // add a definition for the title.
    $this->page->addVar('title', 'Liste des '.$numberChapters.' dernières chapters');
 
    // We get the chapters manager.
    $manager = $this->managers->getManagerOf('Chapters');
 
    $listeChapters = $manager->getList(0, $numberChapters);
 
    foreach ($listeChapters as $chapters)
    {
      if (strlen($chapters->contenu()) > $numberCaracteres)
      {
        $early = substr($chapters->contenu(), 0, $numberCaracteres);
        $early = substr($early, 0, strrpos($early, ' ')) . '...';
 
        $chapters->setContenu($early);
      }
    }
 
    // Add the variable $listChapters to the view.
    $this->page->addVar('listeChapters', $listeChapters);
  }
 
  public function executeShow(HTTPRequest $request)
  {
    $chapters = $this->managers->getManagerOf('Chapters')->getUnique($request->getData('id'));
 
    if (empty($chapters))
    {
      $this->app->httpResponse()->redirect404();
    }
 
    $this->page->addVar('title', $chapters->titre());
    $this->page->addVar('chapters', $chapters);
    $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf($chapters->id()));
  }
 
  public function executeInsertComment(HTTPRequest $request)
  {
    // If the form has been sent.
    if ($request->method() == 'POST')
    {
      $comment = new Comment([
        'chapters' => $request->getData('chapters'),
        'auteur' => $request->postData('auteur'),
        'contenu' => $request->postData('contenu')
      ]);
    }
    else
    {
      $comment = new Comment;
    }
 
    $formBuilder = new CommentFormBuilder($comment);
    $formBuilder->build();
 
    $form = $formBuilder->form();
 
    $formHandler = new \OCFram\FormHandler($form, $this->managers->getManagerOf('Comments'), $request);
    
    if ($formHandler->process())
    {
      $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');
 
      $this->app->httpResponse()->redirect('chapters-'.$request->getData('chapters').'.html');
    }
 
    $this->page->addVar('comment', $comment);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Ajout d\'un commentaire');
  }
}