<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 */
class Category extends Model
{
    use HasFactory;
    use HasEvents;

    protected $table = 'd_categories';

    protected $fillable = [
        'title',
        'code',
        'parent_id',
        'created_at',
        'updated_at',
    ];
}
