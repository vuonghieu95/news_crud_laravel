<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert(
            [
                [
                    'username' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('admin123'),
                    'role_type' => 1,
                    'ins_id' => 1,
                ]
            ]
        );
        DB::table('admin')->insert([
            'username' => 'superadmin',
            'password' => bcrypt('admin123'),
            'email' => 'superadmin@gmail.com',
            'role_type' => 2,
            'ins_id' => 1,
        ]);
    }
}
