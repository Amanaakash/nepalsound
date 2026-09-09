<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'image',
        'description',
        'status',
        'visitor'
    ];

    public function getRules(array $validate)
    {
        return validator($validate, [
            'category_id' => 'required',
            'title' => 'required | string | min:2 | max:100',
            'description' => 'required | string ',
            'status' => 'nullable | boolean',
            'image' => 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10000'
        ]);
    }
    public function getCategory()
    {
        $data = DB::table('career_categories')->where('status', '=', 1)->get();
        return $data;
    }
    public function category()
    {
        return $this->belongsTo(CareerCategory::class, 'category_id');
    }
}
