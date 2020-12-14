<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $task_lists = TaskList::pluck('id')->toArray();
        return [
            'task_list_id' => $this->faker->randomElement($task_lists),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
        ];
    }
}
