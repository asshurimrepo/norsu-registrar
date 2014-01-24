<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('users')->truncate();

		$users = array(
			['username'=>'admin', 'password'=>Hash::make('secret'), 'fname'=>'Asshurim', 'lname'=>'Larita'],
			['username'=>'admin2', 'password'=>Hash::make('secret'), 'fname'=>'Geofry', 'lname'=>'Munchiso']
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}
