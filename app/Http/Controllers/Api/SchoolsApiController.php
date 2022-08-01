<?php

namespace App\Http\Controllers\Api;

use App\DataTables\SchoolDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Api\SchoolsApiInterface;
use App\Http\Requests\School\DeleteRequest;
use App\Http\Requests\School\StoreRequest;
use App\Http\Requests\School\UpdateRequest;
use Illuminate\Support\Facades\Request;

class SchoolsApiController extends Controller
{
    private $schoolsInterface;

    public function __construct(SchoolsApiInterface $schoolsInterface)
    {
        $this->schoolsInterface = $schoolsInterface;
    }

    public function index()
    {
        return $this->schoolsInterface->index();
    }

    public function store(Request $request)
    {
        return $this->schoolsInterface->store($request);
    }

    public function update(Request $request)
    {
        return $this->schoolsInterface->update($request);
    }

    public function delete(Request $request)
    {
        return $this->schoolsInterface->delete($request);
    }
}
