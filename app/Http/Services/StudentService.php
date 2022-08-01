<?php

namespace App\Http\Services;

use App\Http\Traits\StudentTrait;
use App\Models\Student;

class StudentService
{
    use StudentTrait;

    public $studentModel;

    public function __construct(Student $student)
    {
        $this->studentModel = $student;
    }

    public function store($request)
    {
        return $this->studentModel->create([
            'name' => $request->name,
            'school_id' => $request->school_id,
            'order' => $this->setStudentOrder()
        ]);
    }

    public function update($request)
    {
        return $this->studentModel->find($request->id)->update([
            'name'=> $request->name,
            'school_id' => $request->school_id
        ]);
    }

    public function delete($request)
    {
        return $this->studentModel->find($request->id)->delete();
    }
}
