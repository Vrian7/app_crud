<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;

class UpdateRecordTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_update_record()
    {        		
        $record = factory(\App\Record::class)->create();       
        $data = factory(\App\Record::class)->make();
		$data_update = [
        'uuid' => $data->uuid,
		'name' => 'bbr'.$data->name,
		'description' => $data->description,
		'code' => $data->code,
		'status_id' => $data->status_id
		];
        //$record =  factory(App\Record::class,100)->create();

        $recordRepo = new \App\Record($data_update);        

        $response = $this->json('PUT', '/record/1', $data_update);

        $response->assertStatus(200);            
    }
}
