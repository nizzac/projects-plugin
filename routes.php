<?php

use Nizzac\Projects\Api\Tasks;
use Nizzac\Projects\Middleware\ProjectsMiddleware;

Route::group(['middleware' => ProjectsMiddleware::class], function() {
    Route::get('/api/tasks/{id}', [Tasks::class, 'index']);
    Route::get('/api/task-statuses/{id}', [Tasks::class, 'tasksByStatus']);
    Route::post('/api/task-status/{id}', [Tasks::class, 'updateTaskStatus']);
    Route::post('/api/task/{id}', [Tasks::class, 'createTask']);
    Route::post('/api/tasks-order/{id}', [Tasks::class, 'updateTasksOrder']);
});