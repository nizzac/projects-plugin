<?php namespace Impelling\Projects\Models;

use Model;

/**
 * Project Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Project extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'impelling_projects_projects';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public $hasMany = [
        'tasks' => Task::class
    ];

    public $hasManyThrough = [
        'records' => [
            Record::class,
            'through' => Task::class
        ]
    ];
}
