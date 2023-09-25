<?php

namespace Unspun\Projects\Api;

use Unspun\Projects\Models\Project;
use Unspun\Projects\Models\Task;

class Tasks
{
    public function index($projectId)
    {
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
}