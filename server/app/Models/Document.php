<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'content', 'folder_id'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
