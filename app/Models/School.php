<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static function rules()
    {
        return [
            'name'=> 'required|min:3'
        ];
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'school_id', 'id');
    }
}
