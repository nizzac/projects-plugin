<?php

use Unspun\Projects\Api\Tasks;
use Unspun\Projects\Middleware\ProjectsMiddleware;

Route::group(['middleware' => ProjectsMiddleware::class], function() {
    Route::get('/api/tasks/{id}', [Tasks::class, 'index']);
    Route::get('/api/task-statuses/{id}', [Tasks::class, 'tasksByStatus']);
    Route::post('/api/task-status/{id}', [Tasks::class, 'updateTaskStatus']);
});