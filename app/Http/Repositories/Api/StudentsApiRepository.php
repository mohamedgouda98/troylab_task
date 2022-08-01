<?php
namespace App\Http\Repositories\Api;

use App\Http\Interfaces\Api\StudentsApiInterface;
use App\Http\Services\StudentService;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\StudentTrait;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentsApiRepository implements StudentsApiInterface {

    use StudentTrait,
        ApiResponseTrait;

    private $studentModel;
    private $studentService;

    public function __construct(Student $student, StudentService $studentService)
    {
        $this->studentModel = $student;
        $this->studentService = $studentService;
    }

    public function index()
    {
        $schools = $this->studentModel::paginate(20);
        return $this->apiResponse(200, 'Students Data', $schools);
    }

    public function store($request)
    {
        $validations = Validator::make(request()->all(), [
            'school_id' => 'required|exists:schools,id',
            'name' => 'required'
        ]);

        if($validations->fails())
        {
            return $this->apiResponse(400, 'Validation error', $validations->errors());
        }

        $this->studentService->store($request);
        return $this->apiResponse(201, 'Student was Created');
    }

    public function update($request)
    {
        $validations = Validator::make(request()->all(), [
            'school_id' => 'required|exists:schools,id',
            'id' => 'required|exists:students,id',
            'name' => 'required'
        ]);

        if($validations->fails())
        {
            return $this->apiResponse(400, 'Validation error', $validations->errors());
        }

        $this->studentService->update($request);
        return $this->apiResponse(201, 'Student was Updated');
    }

    public function delete($request)
    {
        $validations = Validator::make(request()->all(), [
            'id' => 'required|exists:students,id',
        ]);

        if($validations->fails())
        {
            return $this->apiResponse(400, 'Validation error', $validations->errors());
        }

        $this->studentService->delete($request);
        return $this->apiResponse(201, 'Student was Deleted');
    }
}
