<?php
namespace ETFram;
 
class HTTPResponse extends ApplicationComponent
{
  protected $page;
 
  public function addHeader($header)
  {
    header($header);
  }
 
  public function redirect($location)
  {
    header('Location: '.$location);
    exit;
  }
 
  public function redirect404()
  {
    $this->page = new Page($this->app);
    $this->page->setContentFile(__DIR__.'/../../App/Errors/404.html');
 
    $this->addHeader('HTTP/1.0 404 Not Found');
 
    $this->send();
  }
 
  public function send()
  {
    exit($this->page->getGeneratedPage());
  }
 
  public function setPage(Page $page)
  {
    $this->page = $page;
  }
 
  // Change from the setcookie () function: the last argument defaults to true
  public function setCookie($name, $value = '', $expire = 0, $path = null, $domain = null, $secure = false, $httpOnly = true)
  {
    setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
  }
}