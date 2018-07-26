<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
           [
               [
                   'username' => 'admin',
                   'password' => bcrypt('admin123'),
                   'level' => 1,
                   'created_at' => new DateTime()
               ],
               [
                   'username' => 'user',
                   'password' => bcrypt('user123'),
                   'level' => 2,
                   'created_at' => new DateTime()
               ]
           ]
        );
    }
}
