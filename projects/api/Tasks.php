<?php

namespace Impelling\Projects\Api;

use Impelling\Projects\Models\Project;

class Tasks
{
    public function index($projectId)
    {
        $project = Project::with('tasks')->where('api_id', $projectId)->first();

        return response()->json(['tasks' => $project->tasks], 200);
    }
}