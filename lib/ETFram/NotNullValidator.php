<?php
namespace ETFram;
 
class NotNullValidator extends Validator
{
  public function isValid($value)
  {
    return $value != '';
  }
}