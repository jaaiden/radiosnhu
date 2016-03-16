<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('ShowsTableSeeder');
	}

}

class ShowsTableSeeder extends Seeder {
  public function run()
  {
    Shows::create(array(
      'showname' => '',
      'description' => '',
      'hosts' => '',
      'starttime' => '',
      'endtime' => '',
      'showday' => '',
      'optin_sotw' => true
    ));
  }
}

class AdminTableSeeder extends Seeder {
    public function run()
    {
        User::create(array(
            'username' => '',
            'password' => Hash::make('')
        ));
    }
}

class ContentTableSeeder extends Seeder {
  public function run()
  {
    Content::create(array(
      'section' => 'eventimg',
      'content' => ''
    ));
  }
}

class ContactTableSeeder extends Seeder {
  public function run()
  {
    Contact::create(array(
      'name' => '',
      'email' => '',
      'position' => ''
    ));
  }
}

class AlumniTableSeeder extends Seeder {
  public function run()
  {
    Alumni::create(array(
      'name' => '',
      'description' => ''
    ));
  }
}