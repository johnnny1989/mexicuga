<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert([ 'department' => 'Herramientas','orderset' =>  1,'created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('department')->insert([ 'department' => 'Ferretería en general','orderset' =>  2,'created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('department')->insert([ 'department' => 'Plomería','orderset' =>  3,'created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('department')->insert([ 'department' => 'Tubos y conexiones','orderset' =>  4,'created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('department')->insert([ 'department' => 'Cerraduras y candados','orderset' =>  5,'created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('department')->insert([ 'department' => 'Material eléctrico','orderset' =>  6,'created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('department')->insert([ 'department' => 'Iluminación','orderset' =>  7,'created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('department')->insert([ 'department' => 'Clavos y tornillos','orderset' =>  8,'created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('department')->insert([ 'department' => 'Pinturas y brochas','orderset' =>  9,'created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
    }
}
