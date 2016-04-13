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
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'usertype' => 'admin',
            'password' => bcrypt('secret'),
            'created_at'   => new DateTime(),
            'updated_at'   => new DateTime(),
        ]);
        
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@user.com',
            'usertype' => 'user',
            'password' => bcrypt('secret'),
            'created_at'   => new DateTime(),
            'updated_at'   => new DateTime(),
        ]);
        
        DB::table('users')->insert([
            'name' => 'operator',
            'email' => 'operator@operator.com',
            'usertype' => 'operator',
            'password' => bcrypt('secret'),
            'created_at'   => new DateTime(),
            'updated_at'   => new DateTime(),
        ]);
        
        
    }
}
