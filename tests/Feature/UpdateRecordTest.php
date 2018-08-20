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
		'name' => $data->name,
		'description' => $data->description,
		'code' => $data->code,
		'status_id' => $data->status_id
		];
        //$record =  factory(App\Record::class,100)->create();

        $recordRepo = new \App\Record($data_update);

        $response = $this->update('/record',$data_update);
        //$update = $recordRepo->updateRecord($data);

        $this->assertTrue($update);
        $this->assertEquals($data['uuid'], $carousel->uuid);
        $this->assertEquals($data['name'], $carousel->name);
        $this->assertEquals($data['description'], $carousel->description);
        $this->assertEquals($data['code'], $carousel->code);
        $this->assertEquals($data['status_id'], $carousel->status_id);
    }
}
