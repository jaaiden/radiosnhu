<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;

class Shows extends Eloquent implements UserInterface {

  use UserTrait;

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'shows';

  public function scopeToday($query)
  {
    return $query->where('showday', date('l'));
  }

}
