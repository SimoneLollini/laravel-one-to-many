<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'slug', 'image'];

    public static function generateSlug($title)
    {
        $project_slug = Str::slug($title);
        return $project_slug;
    }
}
