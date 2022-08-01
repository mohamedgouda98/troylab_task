<?php

namespace App\Http\Controllers;

use App\DataTables\SchoolDataTable;
use App\Http\Interfaces\SchoolsInterface;
use App\Http\Requests\School\DeleteRequest;
use App\Http\Requests\School\StoreRequest;
use App\Http\Requests\School\UpdateRequest;

class SchoolsController extends Controller
{
    private $schoolsInterface;

    public function __construct(SchoolsInterface $schoolsInterface)
    {
        $this->schoolsInterface = $schoolsInterface;
    }

    public function index(SchoolDataTable $dataTable)
    {
        return $this->schoolsInterface->index($dataTable);
    }

    public function create()
    {
        return $this->schoolsInterface->create();
    }

    public function store(StoreRequest $request)
    {
        return $this->schoolsInterface->store($request);
    }

    public function edit($id)
    {
        return $this->schoolsInterface->edit($id);
    }

    public function update(UpdateRequest $request)
    {
        return $this->schoolsInterface->update($request);
    }

    public function delete(DeleteRequest $request)
    {
        return $this->schoolsInterface->delete($request);
    }
}
