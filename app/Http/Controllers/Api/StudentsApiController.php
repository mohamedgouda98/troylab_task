<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Api\StudentsApiInterface;
use App\Http\Requests\Student\DeleteRequest;
use App\Http\Requests\Student\StoreRequest;

class StudentsApiController extends Controller
{
    private $studentsInterface;

    public function __construct(StudentsApiInterface $studentsInterface)
    {
        $this->studentsInterface = $studentsInterface;
    }

    public function index()
    {
        return $this->studentsInterface->index();
    }

    public function store(StoreRequest $request)
    {
        return $this->studentsInterface->store($request);
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
