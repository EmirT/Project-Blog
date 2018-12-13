<?php
namespace Entity;
 
use \OCFram\Entity;
 
class Comment extends Entity
{
  protected $chapters,
            $writer,
            $content,
            $creationDate;
 
  const WRITER_INVALIDE = 1;
  const CONTENT_INVALIDE = 2;
 
  public function isValid()
  {
    return !(empty($this->writer) || empty($this->content));
  }
 
  // SETTERS //
  public function setChapters($chapters)
  {
    $this->chapters = (int) $chapters;
  }
 
  public function setWriter($writer)
  {
    if (!is_string($writer) || empty($writer))
    {
      $this->erreurs[] = self::WRITER_INVALIDE;
    }
 
    $this->writer = $writer;
  }
 
  public function setContent($content)
  {
    if (!is_string($content) || empty($content))
    {
      $this->erreurs[] = self::CONTENT_INVALIDE;
    }
 
    $this->content = $content;
  }
 
  public function setDate(\DateTime $creationDate)
  {
    $this->creationDate = $creationDate;
  }
 
  // GETTERS //
  
  public function chapters()
  {
    return $this->chapters;
  }
 
  public function writer()
  {
    return $this->writer;
  }
 
  public function content()
  {
    return $this->content;
  }
 
  public function creationDate()
  {
    return $this->creationDate;
  }
}