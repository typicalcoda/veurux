<?php

use Illuminate\Database\Seeder;

class PracticesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = array(

    		array('name' => 'Palfrey Health Centre', 'address' => 'Milton House, 151 Wednesbury Road, Walsall', 'postcode'=>'WS1 4JQ','telephone'=>'01922627788'),


    		);

    	DB::table('pickups')->insert($data);
    }
}
