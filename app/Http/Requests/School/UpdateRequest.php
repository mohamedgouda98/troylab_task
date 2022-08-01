<?php

namespace App\Http\Requests\School;

use App\Http\Requests\BaseApiRequest;
use App\Models\School;

class UpdateRequest extends BaseApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return array_merge(School::rules(), [
            'id' => 'required|exists:schools,id'
        ]);

    }
}
