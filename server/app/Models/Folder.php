<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory, Uuids;

    protected $fillable = ['name', 'parent_folder_id'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function document()
    {
        return $this->hasMany(Document::class);
    }
}
