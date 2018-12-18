<?php
namespace App\Backend\Modules\Connexion;
 
use \ETFram\BackController;
use \ETFram\HTTPRequest;
 
class ConnexionController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Connexion');
 
    if ($request->postExists('login'))
    {
      $login = $request->postData('login');
      $password = $request->postData('password');
 
      if ($login == $this->app->config()->get('login') && $password == $this->app->config()->get('pass'))
      {
        $this->app->user()->setAuthenticated(true);
        $this->app->httpResponse()->redirect('.');
      }
      else
      {
        $this->app->user()->setFlash('Le pseudo ou le mot de passe est incorrect.');
      }
    }
  }

  public function executeLogOut(HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      if (isset($_POST['log_out'])) {
        $this->app->user()->setAuthenticated(false);
        $this->app->httpResponse()->redirect('/');
      }
    }
    
    $this->page->addVar('title', 'Déconnexion');
  }
}