<?php
namespace Model;
 
use \ETFram\Manager;
use \Entity\Comment;
 
abstract class CommentsManager extends Manager
{
  /**
   * Method to add a comment.
   * @param $comment The comment to add
   * @return void
   */
  abstract protected function add(Comment $comment);
 
  /**
   * Method to delete a comment.
   * @param $id The identifier of the comment to delete
   * @return void
   */
  abstract public function delete($id);
 
  /**
   * How to remove all comments related to chapters
   * @param $chapters The ID of the chapters whose comments must be deleted
   * @return void
   */
  abstract public function deleteFromChapters($chapters);
 
  /**
   * Method to record a comment.
   * @param $comment The comment to save
   * @return void
   */
  public function save(Comment $comment)
  {
    if ($comment->isValid())
    {
      $comment->isNew() ? $this->add($comment) : $this->modify($comment);
    }
    else
    {
      throw new \RuntimeException('Le commentaire doit être validé pour être enregistré');
    }
  }
 
  /**
   * Method to retrieve a list of comments.
   * @param $chapters The chapters on which we want to retrieve the comments
   * @return array
   */
  abstract public function getListOf($chapters);
 
  /**
   * Method for modifying a comment.
   * @param $comment The comment to modify
   * @return void
   */
  abstract protected function modify(Comment $comment);
 
  /**
   * Method to obtain a specific comment.
   * @param $id The comment id
   * @return Comment
   */
  abstract public function get($id);


  /**
   * Method to obtain a reported comments.
   * @param $id The comment id
   * @return Comment
   */
  abstract public function reported($id);


  /**
   * Method to validate reported comments.
   * @param $id The comment id
   * @return Comment
   */
  abstract public function valid($id);
}