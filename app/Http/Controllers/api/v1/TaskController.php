<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return TaskResource::collection(Task::all());
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());

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
}
