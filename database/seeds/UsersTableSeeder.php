<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'   => '1',
            'name'      =>'Admin',
            'username'  =>'admin',
            'email'     =>'admin@tms.com',
            'password'  => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'role_id'   => '1',
            'name'      =>'Sazid Ahmed',
            'username'  =>'sazid',
            'email'     =>'sazidahmed.official@gmail.com',
            'password'  => bcrypt('01680800810'),
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'name'      =>'Ground West',
            'username'  =>'gfw',
            'email'     =>'gfw@tms.com',
            'password'  => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'name'      =>'Ground East',
            'username'  =>'gfe',
            'email'     =>'gfe@tms.com',
            'password'  => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'name'      =>'1st East',
            'username'  =>'ffe',
            'email'     =>'ffe@tms.com',
            'password'  => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'name'      =>'1st West',
            'username'  =>'ffw',
            'email'     =>'ffw@tms.com',
            'password'  => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'name'      =>'2nd East',
            'username'  =>'sfe',
            'email'     =>'sfe@tms.com',
            'password'  => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'name'      =>'2nd Wast',
            'username'  =>'sfw',
            'email'     =>'sfw@tms.com',
            'password'  => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'name'      =>'4th East',
            'username'  =>'fofe',
            'email'     =>'fofe@tms.com',
            'password'  => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'name'      =>'4th Wast',
            'username'  =>'fofw',
            'email'     =>'fofw@tms.com',
            'password'  => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'name'      =>'5th East',
            'username'  =>'fife',
            'email'     =>'fife@tms.com',
            'password'  => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'name'      =>'5th Wast',
            'username'  =>'fifw',
            'email'     =>'fifw@tms.com',
            'password'  => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'name'      =>'6th East',
            'username'  =>'sife',
            'email'     =>'sife@tms.com',
            'password'  => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'name'      =>'6th Wast',
            'username'  =>'sifw',
            'email'     =>'sifw@tms.com',
            'password'  => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'name'      =>'7th North',
            'username'  =>'sefn',
            'email'     =>'sefn@tms.com',
            'password'  => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
            'role_id'   => '2',
            'name'      =>'7th South',
            'username'  =>'sefs',
            'email'     =>'sefs@tms.com',
            'password'  => bcrypt('123456789'),
        ]);

    }
}
