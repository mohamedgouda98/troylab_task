<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\StudentsInterface;
use App\Http\Traits\StudentTrait;
use App\Models\School;
use App\Models\Student;

class StudentsRepository implements StudentsInterface {

    use StudentTrait;

    private $studentModel;
    private $schoolModel;

    public function __construct(Student $student, School $school)
    {
        $this->studentModel = $student;
        $this->schoolModel = $school;
    }

    public function index($dataTable)
    {
        return $dataTable->render('students.index');
    }

    public function create()
    {
        return view('students.create');
    }

    public function store($request)
    {
        $this->studentModel->create([
            'name' => $request->name,
            'school_id' => $request->school_id,
            'order' => $this->setStudentOrder()
        ]);
        toast( 'School Created Successfully', 'success');
        return redirect(route('students.index'));
    }

    public function edit($id)
    {
        $student = $this->studentModel::find($id);
        return view('students.edit', compact('student')) ?? redirect()->back();
    }

    public function update($request)
    {
        $this->studentModel->find($request->id)->update([
            'name'=> $request->name,
            'school_id' => $request->school_id
        ]);
        toast( 'Student Updated Successfully', 'success');
        return redirect(route('students.index'));
    }

    public function delete($request)
    {
        $this->studentModel->find($request->id)->delete();
        toast( 'Student Delete Successfully', 'success');
        return redirect()->back();
    }
}
