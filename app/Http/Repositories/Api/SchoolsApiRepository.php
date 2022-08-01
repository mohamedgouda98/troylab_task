<?php

namespace App\Http\Repositories\Api;

use App\Http\Interfaces\Api\SchoolsApiInterface;
use App\Http\Services\SchoolService;
use App\Http\Traits\ApiResponseTrait;
use App\Models\School;
use Illuminate\Support\Facades\Validator;

class SchoolsApiRepository implements SchoolsApiInterface
{
    use ApiResponseTrait;

    private $schoolModel;
    private $schoolService;

    public function __construct(School $school, SchoolService $schoolService)
    {
        $this->schoolModel = $school;
        $this->schoolService = $schoolService;
    }

    public function index()
    {
        $schools = $this->schoolModel::paginate(20);
        return $this->apiResponse(200, 'Schools Data', $schools);
    }

    public function store($request)
    {
        $validations = Validator::make(request()->all(), [
            'name' => 'required'
        ]);

        if($validations->fails())
        {
            return $this->apiResponse(400, 'Validation error', $validations->errors());
        }

        $this->schoolService->store($request);
        return $this->apiResponse(201, 'School Created Successfully');
    }

    public function update($request)
    {
        $validations = Validator::make(request()->all(), [
            'name' => 'required',
            'id' => 'required|exists:schools,id'
        ]);

        if($validations->fails())
        {
            return $this->apiResponse(400, 'Validation error', $validations->errors());
        }

       $this->schoolService->update($request);
       return $this->apiResponse(202, 'School Updated Successfully');
    }

    public function delete($request)
    {
        $validations = Validator::make(request()->all(), [
            'id' => 'required|exists:schools,id'
        ]);

        if($validations->fails())
        {
            return $this->apiResponse(400, 'Validation error', $validations->errors());
        }

        $this->schoolService->delete($request);
        return $this->apiResponse(200, 'School Deleted Successfully');
    }
}
