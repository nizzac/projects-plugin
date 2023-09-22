<?php

use Impelling\Projects\Api\Tasks;
use Impelling\Projects\Middleware\ProjectsMiddleware;

Route::group(['middleware' => ProjectsMiddleware::class], function() {
    Route::get('/api/tasks/{id}', [Tasks::class, 'index']);
});
