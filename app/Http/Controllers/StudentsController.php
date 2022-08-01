<?php

namespace App\Http\Controllers;

use App\DataTables\StudentDataTable;
use App\Http\Interfaces\StudentsInterface;
use App\Http\Requests\Student\UpdateRequest;
use App\Http\Requests\Student\DeleteRequest;
use App\Http\Requests\Student\StoreRequest;

class StudentsController extends Controller
{
    private $studentsInterface;

    public function __construct(StudentsInterface $studentsInterface)
    {
        $this->studentsInterface = $studentsInterface;
    }

    public function index(StudentDataTable $dataTable)
    {
        return $this->studentsInterface->index($dataTable);
    }

    public function create()
    {
        return $this->studentsInterface->create();
    }

    public function store(StoreRequest $request)
    {
        return $this->studentsInterface->store($request);
    }

    public function edit($id)
    {
        return $this->studentsInterface->edit($id);
    }

    public function update(StoreRequest $request)
    {
        return $this->studentsInterface->update($request);
    }

    public function delete(DeleteRequest $request)
    {
        return $this->studentsInterface->delete($request);
    }
}
