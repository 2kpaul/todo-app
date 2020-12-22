<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TaskList;
use App\Models\Comment;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function list()
    {
        return $this->belongsTo(TaskList::class, 'task_list_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
