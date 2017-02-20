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

    		array('name' => 'Ambar Medical Centre', 'address' => 'Milton House, 151 Wednesbury Road, Walsall', 'postcode'=>'WS1 4JQ','telephone'=>'01922626300'),

    		array('name' => 'Brace Street Health Centre', 'address' => '63 Brace Street Caldmore', 'postcode'=>'WS1 4PS','telephone'=>'01922605930'),

    		array('name' => 'Miscellaneous', 'address' => '', 'postcode'=>'','telephone'=>''),

    		array('name' => 'Pleck Health Centre', 'address' => '16 Oxford Street', 'postcode'=>'WS2 9HY','telephone'=>'01922604400'),

    		array('name' => 'Lichfield Street Surgery', 'address' => '19 Lichfield Street', 'postcode'=>'WS1 1UG','telephone'=>'01922620532'),

    		array('name' => 'Limes Medical Centre', 'address' => '5 Birmingham Road', 'postcode'=>'WS1 2LX','telephone'=>'01922612048'),

    		array('name' => 'Little London Surgery', 'address' => 'Little London', 'postcode'=>'WS1 3EW','telephone'=>'01922622898'),

    		array('name' => 'Sai Medical Centre', 'address' => '1 Forrester Street', 'postcode'=>'WS2 9PL','telephone'=>'01922604620'),

    		array('name' => 'Wharf Family Practice', 'address' => '145a Pleck Road', 'postcode'=>'WS2 9ES','telephone'=>'01922605850'),

    		array('name' => 'Wharf Practice', 'address' => '145a Pleck Road, Walsall, West Midlands', 'postcode'=>'WS2 9ES','telephone'=>'01922605850'),

    		array('name' => 'The Limes Medical Centre', 'address' => '5 Birmingham Road', 'postcode'=>'WS1 2LX','telephone'=>'01922612048'),

    		array('name' => 'Saddlers Health Centre', 'address' => '133 Hatherton Street, Walsall', 'postcode'=>'WS1 1YB','telephone'=>'01922622326'),

    		array('name' => 'Spires Health Centre', 'address' => 'Wednesbury, West Midlands', 'postcode'=>'WS1 4JQ','telephone'=>'01215314665'),

    		array('name' => 'Broadway Medical Centre', 'address' => '213 Broadway', 'postcode'=>'WS1 3HD','telephone'=>''),

    		array('name' => 'Sycamore House Medical Centre', 'address' => '111 Birmingham Road', 'postcode'=>'WS1 2NL','telephone'=>'(01922)624320'),

    		array('name' => 'Coalpool Surgery', 'address' => 'Harden Road', 'postcode'=>'WS3 1ET','telephone'=>'0192242326')

    		);

    	DB::table('practices')->insert($data);
    }
}
