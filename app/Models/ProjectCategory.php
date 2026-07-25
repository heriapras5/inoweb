<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', 'sort_order', 'status'];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'category_id');
    }
}
