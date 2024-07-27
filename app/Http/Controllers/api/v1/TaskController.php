<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Models\TaskStep;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return TaskResource::collection(Task::with('taskStep')->get());
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        $step = [];
        foreach ($request->step as $value) {
            array_push(
                $step,
                [
                    'task_id'=> $task->id,
                    'description'=> $value,
                ]
            );
        }

        TaskStep::insert($step);
        return TaskResource::make($task);
    }

    public function show(string $id)
    {
        return TaskResource::make(Task::find($id));
    }

    public function update(StoreTaskRequest $request, string $id)
    {
        $task = Task::findOrFail($id);

        $task->title = $request->title;
        $task->deadline = $request->deadline;
        $task->is_done = $request->is_done;

        $task->save();

        return TaskResource::make($task);
    }

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->noContent();
    }

    public function changeTaskStatus(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->is_done = $request->is_done;
        $task->save();

        return TaskResource::make($task);
    }
}
