<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;
    use HasEvents;

    protected $fillable = [
        'title',
        'menu_id',
        'created_at',
        'updated_at',
        'published_at',
    ];
}
