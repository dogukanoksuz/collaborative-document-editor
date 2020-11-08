<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'content'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
