<?php
class UsersTableSeeder extends Seeder {

	public function run()
	{
		$us=new User;
		$us->f_name="mehreen";
		$us->l_name="tahir";
		$us->pass=Hash::make("mehreen1993");
		$us->phone="090078601";
		$us->email="pingpong@gmail.com";
		$us->admin=1;
		$us->save();
	}
}