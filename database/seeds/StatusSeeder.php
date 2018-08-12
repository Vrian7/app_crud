<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$statuses = [
    		['name'	=>	'active'],
    		['name'	=>	'inactive']
    	];

    	foreach ($statuses as $status) {
    		App\Status::create($status);
    	}
    }
}
