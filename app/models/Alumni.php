<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;

class Alumni extends Eloquent implements UserInterface {

  use UserTrait;

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'alumni';

}
