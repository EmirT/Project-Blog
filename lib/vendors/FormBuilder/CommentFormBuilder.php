<?php
namespace FormBuilder;
 
use \ETFram\FormBuilder;
use \ETFram\StringField;
use \ETFram\TextField;
use \ETFram\MaxLengthValidator;
use \ETFram\NotNullValidator;
 
class CommentFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new StringField([
        'label' => 'Writer',
        'name' => 'writer',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('L\'auteur spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Merci de spécifier l\'auteur du commentaire'),
        ],
       ]))
       ->add(new TextField([
        'label' => 'Content',
        'name' => 'content',
        'rows' => 7,
        'cols' => 50,
        'validators' => [
          new NotNullValidator('Merci de spécifier votre commentaire'),
        ],
       ]));
  }
}