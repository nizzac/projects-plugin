<?php namespace Impelling\Projects\Models;

use Model;
use Backend\Models\User;

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
        'project' => [Project::class],
        'user' => [User::class]
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
