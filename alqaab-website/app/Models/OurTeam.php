<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // For soft delete functionality

class OurTeam extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'short_description',
        'image',
        'designation',
        'display_order',
        'status'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
        'display_order' => 'integer'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at']; // For soft deletes

    /**
     * Accessor for image URL
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset($this->image);
        }
        return asset('images/default-profile.jpg'); // Default image if none exists
    }
}