<?php
namespace App\Backend\Modules\Chapters;
 
use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Chapters;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \FormBuilder\ChaptersFormBuilder;
use \OCFram\FormHandler;
 
class ChaptersController extends BackController
{
  
  public function executeDelete(HTTPRequest $request)
  {
    $chaptersId = $request->getData('id');
 
    $this->managers->getManagerOf('Chapters')->delete($chaptersId);
    $this->managers->getManagerOf('Comments')->deleteFromChapters($chaptersId);
 
    $this->app->user()->setFlash('<div class="alert alert-success" role="alert">Le chapitre a bien été supprimé !</div>');
 
    $this->app->httpResponse()->redirect('.');
  }
 
  public function executeDeleteComment(HTTPRequest $request)
  {
    $this->managers->getManagerOf('Comments')->delete($request->getData('id'));
 
    $this->app->user()->setFlash('<div class="alert alert-success" role="alert">Le chapitre a bien été supprimé !</div>');
 
    $this->app->httpResponse()->redirect('.');
  }
 
  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Gestion du backend');
 
    $manager = $this->managers->getManagerOf('Chapters');
 
    $this->page->addVar('listeChapters', $manager->getList());
    $this->page->addVar('numberChapters', $manager->count());
    
  }

  public function executeComments(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Commentaires postés');

    $managerChapter = $this->managers->getManagerOf('Chapters');
    $managerComment = $this->managers->getManagerOf('Comments');

    $this->page->addVar('comments', $managerComment->getListComments());
    $this->page->addVar('listChapters', $managerChapter->getList());
  }

  public function executeReported(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Commentaires signalés');

    $managerChapter = $this->managers->getManagerOf('Chapters');
    $managerComment = $this->managers->getManagerOf('Comments');

    $this->page->addVar('comments', $managerComment->getListReported());
    $this->page->addVar('listChapters', $managerChapter->getList());
  }

  public function executeInsert(HTTPRequest $request)
  {
    $this->processForm($request);
 
    $this->page->addVar('title', 'Ajout un chapitre');
  }
 
  public function executeUpdate(HTTPRequest $request)
  {
    $this->processForm($request);
 
    $this->page->addVar('title', 'Modification un chapitre');
  }
 
  public function executeUpdateComment(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Modification d\'un commentaire');
 
    if ($request->method() == 'POST')
    {
      $comment = new Comment([
        'id' => $request->getData('id'),
        'writer' => $request->postData('writer'),
        'content' => $request->postData('content')
      ]);
    }
    else
    {
      $comment = $this->managers->getManagerOf('Comments')->get($request->getData('id'));
    }
 
    $formBuilder = new CommentFormBuilder($comment);
    $formBuilder->build();
 
    $form = $formBuilder->form();
 
    $formHandler = new \OCFram\FormHandler($form, $this->managers->getManagerOf('Comments'), $request);
    
    if ($formHandler->process())
    {
      $this->app->user()->setFlash('Le commentaire a bien été modifié');
 
      $this->app->httpResponse()->redirect('/admin/');
    }
 
    $this->page->addVar('form', $form->createView());
  }
 
  public function processForm(HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      $chapters = new Chapters([
        'writer' => $request->postData('writer'),
        'title' => $request->postData('title'),
        'content' => $request->postData('content')
      ]);
 
      if ($request->getExists('id'))
      {
        $chapters->setId($request->getData('id'));
      }
    }
    else
    {
      // The identifier of the chapters is transmitted if we want to modify it
      if ($request->getExists('id'))
      {
        $chapters = $this->managers->getManagerOf('Chapters')->getUnique($request->getData('id'));
      }
      else
      {
        $chapters = new Chapters;
      }
    }
 
    $formBuilder = new ChaptersFormBuilder($chapters);
    $formBuilder->build();
 
    $form = $formBuilder->form();
 
    $formHandler = new \OCFram\FormHandler($form, $this->managers->getManagerOf('Chapters'), $request);
 
    if ($formHandler->process())
    {
      $this->app->user()->setFlash($chapters->isNew() ? 'Le chapitre a été ajouté !' : 'Le chapitre a été modifié !');
 
      $this->app->httpResponse()->redirect('/admin/');
    }
 
    $this->page->addVar('form', $form->createView());
  }

  public function executeReportedComment(HTTPRequest $request)
  {
    $chaptersId = $request->getData('id');

    $this->managers->getManagerOf('Comments')->reported($chaptersId);
    $this->app->user()->setFlash('<div class="alert alert-danger" role="alert">Le commentaire a bien été signalé !</div>');

    $comment = $this->managers->getManagerOf('Comments')->get($chaptersId);
    
    $this->app->httpResponse()->redirect('/chapters-'.$comment->chapters().'.html');
  }


  public function executeValidComment(HTTPRequest $request)
  {
    $this->managers->getManagerOf('Comments')->valid($request->getData('id'));
    $this->app->user()->setFlash('<div class="alert alert-success" role="alert">Le commentaire a bien été validé !</div>');
    $this->app->httpResponse()->redirect('.');
  }




}