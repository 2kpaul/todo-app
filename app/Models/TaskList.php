<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class TaskList extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
