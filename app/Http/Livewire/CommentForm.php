<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\Comment;

class CommentForm extends Component
{
    public $task, $comment, $comments;
    public $load_comments = false;

    protected $listeners = ['toggleCommentsModal' => 'toggleCommentsModal'];


    public function toggleCommentsModal(Task $task)
    {
        $this->load_comments = true;
        $this->task = $task;
    }

    public function postComment()
    {
        $this->validate(['comment' => 'required']);

        $comment = Comment::create([
            'task_id' => $this->task->id,
            'body' => $this->comment,
        ]);
        $this->emitTo('alerts', 'alert', ['type' => 'success', 'message' => 'Comment "' . $this->comment . '" was created on task "' . $this->task->name . '"']);
        $this->resetInputFields();
        $this->emit('hideCreateComment');
    }

    public function resetInputFields()
    {
        $this->comment = '';
    }

    public function render()
    {
        return view('livewire.comment-form');
    }
}
