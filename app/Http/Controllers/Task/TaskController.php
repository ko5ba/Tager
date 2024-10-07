<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Http\Resources\Task\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();

        return TaskResource::collection($tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $priority = ['Высокий', 'Средний', 'Низкий'];
        $status = ['Ожидание', 'В процессе', 'Выполнена', 'Отменена'];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $task = Task::create($data);

        return TaskResource::make($task);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return TaskResource::make($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return TaskResource::make($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $data = $request->validated();
        $task->update($data);
        $task->fresh();

        return TaskResource::make($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json([
            'message' => 'Задача была удалена',
            'success' => true,
        ]);
    }
}
