<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\SchoolsInterface;
use App\Http\Services\SchoolService;
use App\Models\School;

class SchoolsRepository implements SchoolsInterface
{
    private $schoolModel, $schoolService;

    public function __construct(School $school, SchoolService $schoolService)
    {
        $this->schoolModel = $school;
        $this->schoolService = $schoolService;
    }

    public function index($dataTable)
    {
        return $dataTable->render('Schools.index');
    }

    public function create()
    {
        return view('Schools.create');
    }

    public function store($request)
    {
        $this->schoolService->store($request);
        toast( 'School Created Successfully', 'success');
        return redirect(route('schools.index'));
    }

    public function edit($id)
    {
        $school = $this->schoolModel::find($id);
        return view('schools.edit', compact('school')) ?? redirect()->back();
    }

    public function update($request)
    {
        $this->schoolService->update($request);
        toast( 'School Updated Successfully', 'success');
        return redirect(route('schools.index'));
    }

    public function delete($request)
    {
        $this->schoolService->delete($request);
        toast( 'School Delete Successfully', 'success');
        return redirect()->back();
    }
}
