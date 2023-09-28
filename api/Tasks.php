<?php

<<<<<<< HEAD
namespace Impelling\Projects\Api;

use Impelling\Projects\Models\Project;
=======
namespace Unspun\Projects\Api;

use Backend\Models\User;
use Carbon\Carbon;
use Exception;
use Unspun\Projects\Models\Project;
use Unspun\Projects\Models\Task;
>>>>>>> add-access-tokens

class Tasks
{
    public function index($projectId)
    {
<<<<<<< HEAD
        $project = Project::with('tasks')->where('api_id', $projectId)->first();

        return response()->json(['tasks' => $project->tasks], 200);
=======
        $project = Project::with(['tasks.user'])->where('api_id', $projectId)->first();

        return response()->json($project->tasks, 200);
    }

    public function tasksByStatus($projectId)
    {
        return response()->json(Task::getTasksByStatus($projectId), 200);
    }

    public function updateTaskStatus($projectId)
    {
        $taskId = post('taskId');
        $status = post('status');
        Task::forProject($projectId)->where('id', $taskId)->update(['status' => $status]);
        return response()->json(200);
    }

    public function updateTasksOrder($projectId)
    {
        $tasks = post('tasks');

        foreach ($tasks as $key => $id) {
            Task::forProject($projectId)->where('id', $id)->update(['sort_order' => $key]);
        }

        return response()->json(200);
    }

    public function createTask($projectId)
    {
        try {
            $project = Project::where('api_id', $projectId)->first();
            $user = User::find(1);
    
            $task = new Task;
            $task->project = $project;
            $task->title = post('title');
            $task->description = post('description');
            $task->status = 'new';
            $task->user = $user;
            $task->due_date = Carbon::parse(post('due_date'));
            $task->save();
            
            return response()->json(200);
        } catch(Exception $exception) {
            return response()->json($exception->getMessage(), 200);
        };

>>>>>>> add-access-tokens
    }
}