<?php
namespace App\Http\Traits;

use App\Models\Student;

trait StudentTrait
{
    private function setStudentOrder()
    {
        $student = Student::select('order')->latest()->first();
        return $student->order + 1;
    }
}
