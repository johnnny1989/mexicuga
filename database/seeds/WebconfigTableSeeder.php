<?php

use Illuminate\Database\Seeder;

class WebconfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('webconfig')->insert(['id' => 1]);
    }
}
