<?php

namespace Tests\Feature;

use App\Models\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SchoolsTest extends TestCase
{
    private $schoolData = [
        'name' => 'new School'
    ];

    private $baseUrl = '/api/schools';


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_schools()
    {
        $response = $this->get($this->baseUrl);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_schools()
    {
        $response = $this->post($this->baseUrl . '/store', $this->schoolData);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_schools()
    {
        $data = array_merge($this->schoolData, [
            'id' => $this->getSchoolId()
        ]);
        $response = $this->post($this->baseUrl . '/update', $data);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete_schools()
    {
        $data = ['id' => $this->getSchoolId()];
        $response = $this->post($this->baseUrl . '/delete', $data);

        $response->assertStatus(200);
    }


    private function getSchoolId()
    {
        $school  = School::create([
            'name' => 'test'
        ]);
        return $school->id;
    }

}
