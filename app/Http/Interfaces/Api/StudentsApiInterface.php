<?php
namespace App\Http\Interfaces\Api;

interface StudentsApiInterface
{
    public function index();
    public function store($request);
    public function update($request);
    public function delete($request);
}
