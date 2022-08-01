<?php

namespace App\Http\Services;

use App\Models\School;

class SchoolService
{
    public $schoolModel;

    public function __construct(School $school)
    {
        $this->schoolModel = $school;
    }

    public function store($request)
    {
        return $this->schoolModel->create([
            'name' => $request->name
        ]);
    }

    public function update($request)
    {
        return $this->schoolModel->find($request->id)->update([
            'name'=> $request->name
        ]);
    }

    public function delete($request)
    {
        return $this->schoolModel->find($request->id)->delete();
    }
}
