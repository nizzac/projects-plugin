<?php namespace Nizzac\Projects\Models;

use Model;
use Backend;
use stdClass;
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
    public $table = 'nizzac_projects_tasks';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'project' => 'required',
        'user' => 'required',
        'title' => 'required',
    ];

    public $dates = ['due_date'];

    public $appends = ['url', 'formatted_due_date', 'assignee_name', 'estimate_string'];

    public $belongsTo = [
        'project' => [Project::class],
        'user' => [User::class]
    ];

    public $hasMany = [
        'records' => [Record::class]
    ];

    public function beforeCreate()
    {
        $otherTasksWithSameStatus = self::where('project_id', $this->project_id)->where('status', $this->status)->orderBy('sort_order', 'desc')->first();
        $this->sort_order = $otherTasksWithSameStatus ? $otherTasksWithSameStatus->sort_order+1 : 0;
    }

    public function beforeSave()
    {
        $hours = (int) (post('Task.estimate_hours') ?: 0) * 60;
        $minutes = (int) post('Task.estimate_minutes') ?: 0;
        $estimate = $hours + $minutes;
        $this->estimate = $estimate > 0 ? $estimate : null;
    }

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

    public function getEstimateHoursAttribute()
    {
        return $this->estimate ? floor($this->estimate / 60) : 0;
    }

    public function getEstimateMinutesAttribute()
    {
        return $this->estimate ? $this->estimate - ($this->estimate_hours * 60) : 0;
    }

    public function getEstimateStringAttribute()
    {
        $estimate = [];
        
        if (!$this->estimate) {
            return;
        }
        
        if ($this->estimate_hours > 0) {
            $estimate['hours'] = "{$this->estimate_hours}h";
        }
        
        if ($this->estimate_minutes > 0) {
            $estimate['minutes'] = "{$this->estimate_minutes}m";
        }

        if (empty($estimate)) {
            return;
        }

        return implode(' ', $estimate);
    }

    public static function getTasksByStatus($projectId) {
        $tasks = collect();

        foreach((new self)->getStatusOptions() as $status => $label) {
            $t = new stdClass;
            $t->name = $label;
            $t->status = $status;
            $t->tasks = self::forProject($projectId)->with(['user', 'records'])->status($status)->orderBy('sort_order')->get();

            $tasks->push($t);
        }

        return $tasks;
    }

    public function scopeForProject($query, $projectId)
    {
        $query->whereHas('project', function ($project) use ($projectId) {
            $project->where('api_id', $projectId);
        });
    }

    public function scopeStatus($query, $status)
    {
        $query->where('status', $status);
    }

    public function getUrlAttribute()
    {
        return Backend::url("nizzac/projects/tasks/update/".$this->id);
    }

    public function getFormattedDueDateAttribute()
    {
        return $this->due_date ? $this->due_date->format('d/m/Y') : null;
    }

    public function getAssigneeNameAttribute()
    {
        return $this->user ? $this->user->full_name : null;
    }
}
