<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskStep;
use Illuminate\Http\Request;

class TaskStepController extends Controller
{

    public function store(Request $request, $task_id)
    {
        $task = Task::findOrFail($task_id);
        $step = [];
        foreach ($request->step as $value) {
            array_push(
                $step,
                [
                    'task_id' => $task_id,
                    'description' => $value,
                ]
            );
        }

        $taskStep = $task->taskStep()->createMany($step);

        return response()->json(['task_steps' => $taskStep]);
    }

    public function update(Request $request, string $task_step_id)
    {
        $task_step = TaskStep::findOrFail($task_step_id);
        $task_step->description = $request->description;
        $task_step->save();

        return $task_step;
    }
    public function destroy(string $task_step_id)
    {
        $taskStep = TaskStep::findOrFail($task_step_id);
        $taskStep->delete();

        return response()->noContent();
    }
}
