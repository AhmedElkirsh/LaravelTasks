<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'gender',
        'grade',
        'address',
        'image',
        'track_id'
    ];
    // to connect to the tracks table
    public function track()
    {
        return $this->belongsTo(Track::class);
    }
    
}
