<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable= ['name', 'school_id', 'order'];

    public static function rules()
    {
        return [
            'name' => 'required|min:3',
            'school_id' => 'required|exists:schools,id'
        ];
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
}
