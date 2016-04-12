<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([ 'name' => 'Caja','created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('units')->insert([ 'name' => 'Juego','created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('units')->insert([ 'name' => 'Kilogramo','created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('units')->insert([ 'name' => 'Kilogramos','created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('units')->insert([ 'name' => 'Litro','created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('units')->insert([ 'name' => 'Litros','created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('units')->insert([ 'name' => 'Metro','created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('units')->insert([ 'name' => 'Metros','created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('units')->insert([ 'name' => 'Mililitros','created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('units')->insert([ 'name' => 'Pieza','created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('units')->insert([ 'name' => 'Piezas','created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('units')->insert([ 'name' => 'Rollo','created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
        DB::table('units')->insert([ 'name' => 'Tramo','created_at'   => new DateTime(), 'updated_at'   => new DateTime(),]);
    }
}
