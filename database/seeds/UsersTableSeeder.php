<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'=>'admin',
            'permissions'=> '{"user":{"can-add":"1","can-edit":"1","can-delete":"1","can-view":"1","can-list":"1"},"role":{"can-add":"1","can-edit":"1","can-delete":"1","can-view":"1","can-list":"1"}}',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'name'=>'user',
            'permissions'=> '{"user":{"can-add":"0","can-edit":"0","can-delete":"0","can-view":"0","can-list":"1"},"role":{"can-add":"0","can-edit":"0","can-delete":"0","can-view":"0","can-list":"1"}}',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('users')->insert([
            'role_id' => '1',
            'username' => 'admin',
            'mobile' => '01680800810',
            'password' => Hash::make('123456'),
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'username' => 'user',
            'mobile' => '01911908431',
            'password' => Hash::make('123456'),
            'created_at' => now(),
            'updated_at' => now()
            
        ]);


        DB::table('userinfos')->insert([
            'user_id' => '1',
            'name' => 'Sazid Ahmed',
            'father' => 'Hannan',
            'date' => '15-05-2020',
            'dob' => '15-01-1990',
            'married' => 'No',
            'address' => 'Dhaka',
            'occupation' => 'Bussiness',
            'office' => 'Technocean',
            'religion' => 'Islam',
            'education' => 'BSC',
            'contact' => '01911908431',
            'email' => 'sazid@gmail.com',
            'nid' => '445545119',
            'passport' => '95454608431',
            'image' => 'avatar.png',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);
        
        DB::table('userinfos')->insert([
            'user_id' => '2',
            'name' => 'Sadia Ahmed',
            'father' => 'Hannan',
            'date' => '15-05-2020',
            'dob' => '17-05-1997',
            'married' => 'No',
            'address' => 'Dhaka',
            'occupation' => 'Student',
            'office' => 'Technocean',
            'religion' => 'Islam',
            'education' => 'Honors',
            'contact' => '01911908431',
            'email' => 'sazid@gmail.com',
            'nid' => '445545119',
            'passport' => '95454608431',
            'image' => 'avatar.png',
            'created_at' => now(),
            'updated_at' => now()
            
        ]);

        DB::table('families')->insert([
            'user_id' => '1',
            'name' => 'Hannan',
            'relation' => 'Father',
            'contact' => '01911908881',
            'occupation'=>'Business',
            'age'=>'50',
            'created_at' => now(),
            'updated_at' => now()  
        ]);

        DB::table('families')->insert([
            'user_id' => '1',
            'name' => 'Sajeda',
            'relation' => 'Mother',
            'contact' => '01881908844',
            'occupation'=>'Homemaker',
            'age'=>'45',
            'created_at' => now(),
            'updated_at' => now()  
        ]);

        DB::table('families')->insert([
            'user_id' => '1',
            'name' => 'Sadia',
            'relation' => 'Sister',
            'contact' => '01633908445',
            'occupation'=>'Student',
            'age'=>'30',
            'created_at' => now(),
            'updated_at' => now()  
        ]);

        //Emergency
        DB::table('emergencies')->insert([
            'user_id' => '1',
            'name' => 'Rabbi',
            'relation' => 'Cousin',
            'contact' => '01633908333',
            'address'=>'Uttarkhan',
            'created_at' => now(),
            'updated_at' => now()  
        ]);

        DB::table('emergencies')->insert([
            'user_id' => '1',
            'name' => 'Sultan',
            'relation' => 'Uncle',
            'contact' => '01911908311',
            'address'=>'Mazar',
            'created_at' => now(),
            'updated_at' => now()  
        ]);

        //Extrainfo
        DB::table('extrainfos')->insert([
            'user_id' => '1',
            'type' => 'homemaid',
            'name' => 'Jorina',
            'contact' => '01633908666',
            'address'=>'kachabazar',
            'nid'=>'997996335',
            'remarks'=>'No',
            'created_at' => now(),
            'updated_at' => now()  
        ]);

        //Payment
        DB::table('payments')->insert([
            'user_id' => '1',
            'status' => 'pending',
            'month' => 'January',
            'rent' => '10000',
            'waterbill'=>'200',
            'electbill'=>'200',
            'services'=>'1000',
            'others'=>'0',
            'due'=>'0',
            'total'=>'11400',
            'created_at' => now(),
            'updated_at' => now()  
        ]);

        DB::table('payments')->insert([
            'user_id' => '1',
            'status' => 'pending',
            'month' => 'February',
            'rent' => '10000',
            'waterbill'=>'200',
            'electbill'=>'200',
            'services'=>'1000',
            'others'=>'0',
            'due'=>'500',
            'total'=>'11900',
            'created_at' => now(),
            'updated_at' => now()  
        ]);
        
        
    }
}

