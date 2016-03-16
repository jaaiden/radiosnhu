<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;

class Content extends Eloquent implements UserInterface {

  use UserTrait;

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'content';

  public function scopeSection($query, $section)
  {
    return $query->where('section', $section)->first();
  }

}
