<?php

namespace App\Http\Interfaces\Api;

interface SchoolsApiInterface
{
    public function index();
    public function store($request);
    public function update($request);
    public function delete($request);
}
