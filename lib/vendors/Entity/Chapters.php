<?php
namespace Entity;
 
use \ETFram\Entity;
 
class Chapters extends Entity
{
  protected $writer,
            $title,
            $content,
            $dateAd,
            $dateModif;
 
  const WRITER_INVALID = 1;
  const TITLE_INVALID = 2;
  const CONTENT_INVALID = 3;
 
  public function isValid()
  {
    return !(empty($this->writer) || empty($this->title) || empty($this->content));
  }
 
 
  // SETTERS //
 
  public function setWriter($writer)
  {
    if (!is_string($writer) || empty($writer))
    {
      $this->erreurs[] = self::WRITER_INVALID;
    }
 
    $this->writer = $writer;
  }
 
  public function setTitle($title)
  {
    if (!is_string($title) || empty($title))
    {
      $this->erreurs[] = self::TITLE_INVALID;
    }
 
    $this->title = $title;
  }
 
  public function setContent($content)
  {
    if (!is_string($content) || empty($content))
    {
      $this->erreurs[] = self::CONTENT_INVALID;
    }
 
    $this->content = $content;
  }
 
  public function setDateAd(\DateTime $dateAd)
  {
    $this->dateAd = $dateAd;
  }
 
  public function setDateModif(\DateTime $dateModif)
  {
    $this->dateModif = $dateModif;
  }
 
  // GETTERS //
 
  public function writer()
  {
    return $this->writer;
  }
 
  public function title()
  {
    return $this->title;
  }
 
  public function content()
  {
    return $this->content;
  }
 
  public function dateAd()
  {
    return $this->dateAd;
  }
 
  public function dateModif()
  {
    return $this->dateModif;
  }
}