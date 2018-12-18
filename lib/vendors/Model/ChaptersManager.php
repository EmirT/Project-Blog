<?php
namespace Model;
 
use \ETFram\Manager;
use \Entity\Chapters;
 
abstract class ChaptersManager extends Manager
{
  /**
   * Method to add a chapters.
   * @param $chapters Chapters to add
   * @return void
   */
  abstract protected function add(Chapters $chapters);
 
  /**
   * Method to record a chapters.
   * @param $chapters Chapters to save
   * @see self::add()
   * @see self::modify()
   * @return void
   */
  public function save(Chapters $chapters)
  {
    if ($chapters->isValid())
    {
      $chapters->isNew() ? $this->add($chapters) : $this->modify($chapters);
    }
    else
    {
      throw new \RuntimeException('Les chapitres doit être validée pour être enregistrée');
    }
  }
 
  /**
   * Method returning the number of total chapters.
   * @return int
   */
  abstract public function count();
 
  /**
   * Method to delete a chapters.
   * @param $id int The ID of the chapters to delete
   * @return void
   */
  abstract public function delete($id);
 
  /**
   * Method returning a list of requested chapters.
   * @param $debut int The first chapters to select
   * @param $limite int The number of chapters to select
   * @return array The list of chapters. Each entry is an instance (create) of chapters
   */
  abstract public function getList($debut = -1, $limite = -1);
 
  /**
   * Method returning a specific chapters.
   * @param $id int The identifier of the chapters to retrieve
   * @return Chapters The requested chapters
   */
  abstract public function getUnique($id);
 
  /**
   * Method to edit a chapters.
   * @param $chapter chapters to change
   * @return void
   */
  abstract protected function modify(Chapters $chapters);
}