<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerCategory extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'status'];

    public function getRules(array $validate)
    {
        return validator($validate, [
            'title' => 'required | string | min:2 | max:100',
            'status' => 'nullable | boolean',
        ]);
    }
}
