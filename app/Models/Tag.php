<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tags';
    protected $guarded = [];

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'task_tags', 'tag_id', 'task_id');
    }
}
