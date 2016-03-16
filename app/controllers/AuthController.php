<?php

class AuthController extends BaseController {

  // public function doDJCreation()
  // {
  //   $dj = new DJ;
  //   $dj->name = Input::get('firstname') . " " . Input::get('lastname');
  //   $dj->showname = Input::get('showname');
  //   $dj->showtime = Input::get('showtime');
  //   $dj->twitter = Input::get('twitter');
  //   $dj->aboutdj = Input::get('aboutdj');
  //   $dj->aboutshow = Input::get('aboutshow');
  //   if(Input::hasFile('profileimg') && Input::file('profileimg')->isValid())
  //   {
  //     Input::file('profileimg')->move(public_path() . '/profileimages/', Input::get('firstname') . Input::get('lastname') . "." . Input::file('profileimg')->getClientOriginalExtension());
  //     $dj->profileimg = URL::asset('profileimages/' . Input::get('firstname') . Input::get('lastname') . "." . Input::file('profileimg')->getClientOriginalExtension());
  //   }else
  //   {
  //     $dj->profileimg = "";
  //   }
  //   $dj->save();

  //   $code = Code::where('code', '=', Input::get('code'))->firstOrFail();
  //   $code->delete();

  //   return Redirect::to('data/confirmation');
  // }

  public function doAdminLogin()
  {
    $userdata = array('username' => Input::get('username'), 'password' => Input::get('password'));
    if(Auth::attempt($userdata))
    {
      return Redirect::to('admin/');
    }else
    {
      return Redirect::to('admin/login');
    }
  }

  public function doLogout()
  {
    Auth::logout();
    return Redirect::to('admin');
  }

}
