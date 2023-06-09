<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    use HasEvents;

    protected $fillable = [
        'title',
        'position',
        'description',
        'parent_id',
        'created_at',
        'updated_at',
        'published_at',
    ];
}
