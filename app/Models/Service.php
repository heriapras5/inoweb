<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $fillable = ['icon', 'title', 'slug', 'description', 'features', 'sort_order', 'status'];

    protected function casts(): array
    {
        return ['features' => 'array'];
    }
}
