<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function task()
    {
        $this->belongsTo(Task::class, 'task_id');
    }
}
