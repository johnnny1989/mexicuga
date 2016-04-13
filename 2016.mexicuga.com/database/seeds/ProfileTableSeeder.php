<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile')->insert([
            'user_id'           => 2,
            'lastname'          => 'Last name',
            'phone'             => '919044222629',
            'mobile'            => '918417977992',
            'company'           => 'company',
            'webpage'           => 'http://www.website.com',
            'bill_name'         => 'Enterprises',
            'bill_rfc'          => 'rfc',
            'bill_cp'           => 'address cp',
            'bill_street'       => 'address line 1',
            'bill_noext'        => 'no ext',
            'bill_noint'        => 'no int',
            'bill_colony'       => 'colony',
            'bill_muncipility'  => 'muncipality',
            'bill_state'        => 'state',
            'bill_country'      => 'country',
            'ship_cp'           => 'ship cp',
            'ship_street'       => 'ship street',
            'ship_noext'        => 'no ext',
            'ship_noint'        => 'no int',
            'ship_colony'       => 'colony',
            'ship_muncipility'  => 'muncipility',
            'ship_state'        => 'state',
            'ship_country'      => 'country',
            'status'            => 1,
            
        ]);
    }
}
