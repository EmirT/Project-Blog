<?php
namespace Entity;
 
use \OCFram\Entity;
 
class Comment extends Entity
{
  protected $chapters,
            $writer,
            $content,
            $reported,
            $creationDate;
 
  const WRITER_INVALIDE = 1;
  const CONTENT_INVALIDE = 2;
  const REPORTED_INVALIDE = 3;
 
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

  public function setReported($reported)
  {
    if (($reported != 'no') || ($reported != 'yes'))
    {
      $this->errors[] = self::REPORTED_INVALIDE;
    }

    $this->reported = $reported;
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

  public function reported()
  {
    return $this->reported;
  }

}