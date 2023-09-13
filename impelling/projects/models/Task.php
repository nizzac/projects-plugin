<?php namespace Impelling\Projects\Models;

use Model;

/**
 * Task Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Task extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'impelling_projects_tasks';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public $belongsTo = [
        'project' => [
            Project::class,
            'key' => 'project_id',
            'otherKey' => 'id'
        ],
        'user' => [
            \Backend\Models\User::class,
            'key' => 'backend_user_id',
            'otherKey' => 'id'
        ]
    ];

    public function getStatusOptions()
    {
        return [
            'new' => "New",
            'assessing' => "Assessing",
            'pending' => "Pending",
            'approval' => "Approval",
            "complete" => "Complete",
        ];
    }
}
