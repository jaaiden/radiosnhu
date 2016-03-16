<?php

class AdminController extends BaseController {
  
  public function createAdminAccount()
  {
    $username = Input::get('username');
    $email = Input::get('email');
    $password = Hash::make(Input::get('password'));
    $fname = Input::get('firstname');
    $lname = Input::get('lastname');
    $user = new User;
    $user->username = $username;
    $user->password = $password;
    $user->email = $email;
    $user->firstname = $fname;
    $user->lastname = $lname;
    $user->save();
    return Redirect::to('admin/accounts');
  }
  
  public function updateAccount()
  {
    DB::table('users')
      ->where('id', Input::get('pk'))
      ->update(array(Input::get('name') => Input::get('value')));
  }

  public function deleteAccount($email)
  {
    $user = User::where('username', '=', $email)->firstOrFail();
    $user->delete();
    return Redirect::to('admin/accounts');
  }

  public function updateAboutPage()
  {
    // $content = Input::get('content');
    // $aboutpage = Content::where('section', 'about')->first();
    // $aboutpage->content = $content;
    // if($aboutpage->save())
    // {
    //   return Response::json(array('success' => 'yes'));
    // }else{
    //   return Response::json(array('success' => 'no'));
    // }

    DB::table('content')
      ->where('id', Input::get('pk'))
      ->update(array('content' => Input::get('value')));
  }
  
  public function updateNewsPage()
  {
    DB::table('content')
      ->where('id', Input::get('pk'))
      ->update(array(Input::get('name') => Input::get('value')));
  }

  public function updateEventsPage()
  {
    $name = Input::get('eventname');
    $desc = Input::get('eventdesc');
    $img = Input::get('eventimg');

    $ename = Content::section('eventname');
    $ename->content = $name;
    $ename->save();

    $edesc = Content::section('eventdesc');
    $edesc->content = $desc;
    $edesc->save();

    $eimg = Content::section('eventimg');
    $eimg->content = $img;
    $eimg->save();

    return Redirect::to('admin/edit/events');
  }
  
  public function addEvent()
  {
    $priority = Input::get('priority');
    $name = Input::get('name');
    $desc = Input::get('desc');
    $loc = Input::get('loc');
    $datetime = Input::get('datetime');
    $img = Input::get('img');
    
    $event = new Events;
    $event->priority = $priority;
    $event->name = $name;
    $event->eventdesc = $desc;
    $event->eventloc = $loc;
    $event->eventdatetime = $datetime;
    $event->imgloc = $img;
    $event->save();
    return Redirect::to('admin/edit/events');
  }
  
  public function updateEvent()
  {
    DB::table('events')
      ->where('id', Input::get('pk'))
      ->update(array(Input::get('name') => Input::get('value')));
  }
  
  public function deleteEvent($id)
  {
    $alumni = Events::find($id);
    $alumni->delete();
    return Redirect::to('admin/edit/events');
  }

  public function addAlumni()
  {
    $name = Input::get('name');
    $desc = Input::get('desc');
    $alumni = new Alumni;
    $alumni->name = $name;
    $alumni->description = $desc;
    $alumni->save();
    return Redirect::to('admin/edit/alumni');
  }

  public function updateAlumni()
  {
    DB::table('alumni')
      ->where('id', Input::get('pk'))
      ->update(array(Input::get('name') => Input::get('value')));
  }

  public function deleteAlumni($id)
  {
    $alumni = Alumni::find($id);
    $alumni->delete();
    return Redirect::to('admin/edit/alumni');
  }

  public function addContact()
  {
    $name = Input::get('name');
    $position = Input::get('position');
    $email = Input::get('email');
    $contact = new Contact;
    $contact->name = $name;
    $contact->position = $position;
    $contact->email = $email;
    $contact->save();
    return Redirect::to('admin/edit/contact');
  }

  public function updateContact()
  {
    DB::table('contact')
      ->where('id', Input::get('pk'))
      ->update(array(Input::get('name') => Input::get('value')));
  }

  public function deleteContact($id)
  {
    $contact = Contact::find($id);
    $contact->delete();
    return Redirect::to('admin/edit/contact');
  }

  public function addShow()
  {
    $name = Input::get('showname');
    $desc = Input::get('description');
    $hosts = Input::get('hosts');
    $start = Input::get('starttime');
    $end = Input::get('endtime');
    $day = Input::get('showday');
    $sotw = Input::get('optin_sotw');

    if($sotw != 1)
    {
      $sotw = 0;
    }

    $show = new Shows;
    $show->showname = $name;
    $show->description = $desc;
    $show->hosts = $hosts;
    $show->starttime = $start;
    $show->endtime = $end;
    $show->showday = $day;
    $show->optin_sotw = $sotw;
    $show->save();
    return Redirect::to('admin/shows');
  }

  public function updateShow()
  {
    DB::table('shows')
      ->where('id', Input::get('pk'))
      ->update(array(Input::get('name') => Input::get('value')));
  }

  public function deleteShow($id)
  {
    $show = Shows::find($id);
    $show->delete();
    return Redirect::to('admin/shows');
  }

}
