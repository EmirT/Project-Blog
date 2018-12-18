<?php
namespace App\Frontend\Modules\Chapters;
 
use \ETFram\BackController;
use \ETFram\HTTPRequest;
use \Entity\Chapters;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \ETFram\FormHandler;
 
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
      if (strlen($chapters->content()) > $numberCaracteres)
      {
        $early = substr($chapters->content(), 0, $numberCaracteres);
        $early = substr($early, 0, strrpos($early, ' ')) . '...';
 
        $chapters->setContent($early);
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
 
    $this->page->addVar('title', $chapters->title());
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
        'writer' => $request->postData('writer'),
        'content' => $request->postData('content')
      ]);
    }
    else
    {
      $comment = new Comment;
    }
 
    $formBuilder = new CommentFormBuilder($comment);
    $formBuilder->build();
 
    $form = $formBuilder->form();
 
    $formHandler = new \ETFram\FormHandler($form, $this->managers->getManagerOf('Comments'), $request);
    
    if ($formHandler->process())
    {
      $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');
 
      $this->app->httpResponse()->redirect('chapters-'.$request->getData('chapters').'.html');
    }
 
    $this->page->addVar('comment', $comment);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Ajout d\'un commentaire');
  }

  public function executeReportedComment(HTTPRequest $request)
  {
    $chaptersId = $request->getData('id');

    $this->managers->getManagerOf('Comments')->reported($chaptersId);
    $this->app->user()->setFlash('<div class="alert alert-danger" role="alert">Le commentaire a bien été signalé !</div>');

    $comment = $this->managers->getManagerOf('Comments')->get($chaptersId);
    
    $this->app->httpResponse()->redirect('/chapters-'.$comment->chapters().'.html');
  }

}