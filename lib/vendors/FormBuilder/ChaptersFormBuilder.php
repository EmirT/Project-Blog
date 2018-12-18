<?php
namespace FormBuilder;
 
use \ETFram\FormBuilder;
use \ETFram\StringField;
use \ETFram\TextField;
use \ETFram\MaxLengthValidator;
use \ETFram\NotNullValidator;
 
class ChaptersFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new StringField([
        'label' => 'Writer',
        'name' => 'writer',
        'maxLength' => 20,
        'validators' => [
          new MaxLengthValidator('L\'auteur spécifié est trop long (20 caractères maximum)', 20),
          new NotNullValidator('Merci de spécifier l\'auteur des chapitres'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Title',
        'name' => 'title',
        'maxLength' => 100,
        'validators' => [
          new MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
          new NotNullValidator('Merci de spécifier le titre des chapitres'),
        ],
       ]))
       ->add(new TextField([
        'label' => 'Content',
        'name' => 'content',
        'rows' => 8,
        'cols' => 60,
        'validators' => [
          new NotNullValidator('Merci de spécifier le contenu des chapitres'),
        ],
       ]));
  }
}