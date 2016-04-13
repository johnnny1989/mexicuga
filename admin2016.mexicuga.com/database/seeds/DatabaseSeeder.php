<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(WebconfigTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(DepartmentSeeder::class);
    }
}
