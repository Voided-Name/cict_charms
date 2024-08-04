<?php

function emailExists($email)
{
  /**
   * 
   * @var res $func
   */
  $selectUser = $func->select_one('users', array('username', '=', $email));

  return $selectUser;
}




















