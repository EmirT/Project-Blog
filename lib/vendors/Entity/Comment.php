<?php
namespace Entity;
 
use \ETFram\Entity;
 
class Comment extends Entity
{
  protected $chapters,
            $writer,
            $content,
            $reported,
            $creationDate;
 
  const WRITER_INVALID = 1;
  const CONTENT_INVALID = 2;
  const REPORTED_INVALID = 3;
 
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
      $this->erreurs[] = self::WRITER_INVALID;
    }
 
    $this->writer = $writer;
  }
 
  public function setContent($content)
  {
    if (!is_string($content) || empty($content))
    {
      $this->erreurs[] = self::CONTENT_INVALID;
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
      $this->errors[] = self::REPORTED_INVALID;
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