<?php
namespace Model;
 
use \Entity\Chapters;
 
class ChaptersManagerPDO extends ChaptersManager
{
  protected function add(Chapters $chapters)
  {
    $requete = $this->dao->prepare('INSERT INTO chapters SET writer = :writer, title = :title, content = :content, dateAd = NOW(), dateModif = NOW()');
 
    $requete->bindValue(':title', $chapters->title());
    $requete->bindValue(':writer', $chapters->writer());
    $requete->bindValue(':content', $chapters->content());
 
    $requete->execute();
  }
 
  public function count()
  {
    return $this->dao->query('SELECT COUNT(*) FROM chapters')->fetchColumn();
  }
 
  public function delete($id)
  {
    $this->dao->exec('DELETE FROM chapters WHERE id = '.(int) $id);
  }
 
  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, writer, title, content, dateAd, dateModif FROM chapters ORDER BY id DESC';
 
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
 
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Chapters');
 
    $listeChapters = $requete->fetchAll();
 
    foreach ($listeChapters as $chapters)
    {
      $chapters->setDateAd(new \DateTime($chapters->dateAd()));
      $chapters->setDateModif(new \DateTime($chapters->dateModif()));
    }
 
    $requete->closeCursor();
 
    return $listeChapters;
  }
 
  public function getUnique($id)
  {
    $requete = $this->dao->prepare('SELECT id, writer, title, content, dateAd, dateModif FROM chapters WHERE id = :id');
    $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $requete->execute();
 
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Chapters');
 
    if ($chapters = $requete->fetch())
    {
      $chapters->setDateAd(new \DateTime($chapters->dateAd()));
      $chapters->setDateModif(new \DateTime($chapters->dateModif()));
 
      return $chapters;
    }
 
    return null;
  }
 
  protected function modify(Chapters $chapters)
  {
    $requete = $this->dao->prepare('UPDATE chapters SET writer = :writer, title = :title, content = :content, dateModif = NOW() WHERE id = :id');
 
    $requete->bindValue(':title', $chapters->title());
    $requete->bindValue(':writer', $chapters->writer());
    $requete->bindValue(':content', $chapters->content());
    $requete->bindValue(':id', $chapters->id(), \PDO::PARAM_INT);
 
    $requete->execute();
  }
}