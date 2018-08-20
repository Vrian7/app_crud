<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->command->info('Unguarding models');
    	Model::unguard();
  //   	$tables = [
  //   		'states',
  //   		'records'
  //   	];
  //   	$this->command->info('Truncating existing tables');
		// foreach ($tables as $table) {
		// 	DB::statement('TRUNCATE TABLE ' . $table . ' CASCADE;');
		// }
        //$this->call(UsersTableSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(RecordSeeder::class);
    }
}
