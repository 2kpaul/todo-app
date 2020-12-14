<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TaskList;

class Task extends Model
{
    use HasFactory;

    public function list()
    {
        return $this->belongsTo(TaskList::class, 'task_list_id');
    }
}
