<?php
namespace Model;
 
use \Entity\Comment;
 
class CommentsManagerPDO extends CommentsManager
{
  protected function add(Comment $comment)
  {
    $q = $this->dao->prepare('INSERT INTO comments SET chapters = :chapters, writer = :writer, content = :content, creationDate = NOW()');
 
    $q->bindValue(':chapters', $comment->chapters(), \PDO::PARAM_INT);
    $q->bindValue(':writer', $comment->writer());
    $q->bindValue(':content', $comment->content());
 
    $q->execute();
 
    $comment->setId($this->dao->lastInsertId());
  }
 
  public function delete($id)
  {
    $this->dao->exec('DELETE FROM comments WHERE id = '.(int) $id);
  }
 
  public function deleteFromChapters($chapters)
  {
    $this->dao->exec('DELETE FROM comments WHERE chapters = '.(int) $chapters);
  }
 
  public function getListOf($chapters)
  {
    if (!ctype_digit($chapters))
    {
      throw new \InvalidArgumentException('L\'identifiant de la chapters passé doit être un nombre entier valide');
    }
 
    $q = $this->dao->prepare('SELECT id, chapters, writer, content, reported, creationDate FROM comments WHERE chapters = :chapters');
    $q->bindValue(':chapters', $chapters, \PDO::PARAM_INT);
    $q->execute();
 
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
 
    $comments = $q->fetchAll();
 
    foreach ($comments as $comment)
    {
      $comment->setDate(new \DateTime($comment->creationDate()));
    }
 
    return $comments;
  }
 
  protected function modify(Comment $comment)
  {
    $q = $this->dao->prepare('UPDATE comments SET writer = :writer, content = :content WHERE id = :id');
 
    $q->bindValue(':writer', $comment->writer());
    $q->bindValue(':content', $comment->content());
    $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);
 
    $q->execute();
  }
 
  public function get($id)
  {
    $q = $this->dao->prepare('SELECT id, chapters, writer, content FROM comments WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();
 
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
 
    return $q->fetch();
  }
  
  public function reported($id)
  {
    $q = $this->dao->prepare('UPDATE comments SET reported = :reported WHERE id = :id');
    
    $q->bindValue(':reported', 'yes');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();
  }

  public function valid($id)
  {
    $q = $this->dao->prepare('UPDATE comments SET reported = :reported WHERE id = :id');
    
    $q->bindValue(':reported', 'no');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();
  }

  public function getListReported()
  {
    $q = $this->dao->prepare('SELECT id, chapters, writer, content, reported, creationDate FROM comments WHERE reported = :reported');
    $q->bindValue(':reported', 'yes');
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
    
    $comments = $q->fetchAll();

    foreach ($comments as $comment)
    {
      $comment->setDate(new \DateTime($comment->creationDate()));
    }
    
    return $comments;
  }

  public function getListComments()
  {
    $q = $this->dao->query('SELECT id, chapters, writer, content, creationDate FROM comments ORDER BY id DESC');
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');

    $comments = $q->fetchAll();

    foreach ($comments as $comment)
    {
      $comment->setDate(new \DateTime($comment->creationDate()));
    }

    return $comments;
  }



 


}