<?php

namespace Tests\Feature;

use App\Models\School;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentsTest extends TestCase
{
    private $studentData = [
        'name' => 'new Student',
    ];

    private $baseUrl = '/api/students';


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_students()
    {
        $response = $this->get($this->baseUrl);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_students()
    {
        $data = array_merge($this->studentData, [
            'id' => $this->getStudentId(),
            'school_id' => $this->getSchoolId(),
        ]);
        $response = $this->post($this->baseUrl . '/store', $data);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_students()
    {
        $data = array_merge($this->studentData, [
            'id' => $this->getStudentId(),
            'school_id' => $this->getSchoolId(),
        ]);
        $response = $this->post($this->baseUrl . '/update', $data);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete_students()
    {
        $data = ['id' => $this->getStudentId()];
        $response = $this->post($this->baseUrl . '/delete', $data);

        $response->assertStatus(200);
    }


    private function getStudentId()
    {
        $school  = Student::create([
            'name' => 'test student'
        ]);
        return $school->id;
    }

    private function getSchoolId()
    {
        $school  = School::create([
            'name' => 'test school'
        ]);
        return $school->id;
    }

}
