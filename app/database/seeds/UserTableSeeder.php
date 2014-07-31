<?php

class UserTableSeeder extends Seeder
{

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        // DB::table('users')->truncate();

        $user = array(
            'username' => 'usm4n',
            'password' => Hash::make('admin'),
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()'),
        );

        // Comment the below to stop the seeder
        DB::table('users')->insert($user);
    }

}
