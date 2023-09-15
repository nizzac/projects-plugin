<?php namespace Impelling\Projects\Models;

use Model;
use Backend\Models\User;

/**
 * Record Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Record extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'impelling_projects_records';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public $dates = ['start', 'end'];

    public $belongsTo = [
        'user' => [User::class],
        'task' => [Task::class]
    ];

    public function beforeSave()
    {   
        $this->duration = $this->calculateDuration();
        $this->project_id = $this->task->project_id;
    }

    public function calculateDuration()
    {
        return $this->start && $this->end ? $this->start->diffInMinutes($this->end) : null;
    }

    public function afterFetch()
    {
        $this->duration_value = $this->duration;
        $this->duration = $this->duration_string;
    }

    public function getDurationString()
    {
        $duration = [];
        
        if (!$this->duration) {
            return;
        }

        $hours = floor($this->duration / 60);        
        $minutes = $this->duration - ($hours * 60);
        
        if ($hours > 0) {
            $duration['hours'] = "{$hours}h";
        }
        
        if ($minutes > 0) {
            $duration['minutes'] = "{$minutes}m";
        }

        if (empty($duration)) {
            return;
        }

        return implode(' ', $duration);
    }

    public function getDurationStringAttribute()
    {
        return $this->getDurationString();    
    }

    public function filterFields($fields, $context)
    {
        $this->duration = $this->calculateDuration();
        $fields->duration->value = $this->duration_string;
    }

    public function scopeBillable($query)
    {
        return $query->where('billable', true);
    }

    public function scopeNonBillable($query)
    {
        return $query->where('billable', false);
    }

    public function scopeThisMonth($query)
    {
        return $query->whereBetween('start', [now()->startOfMonth(), now()->endOfMonth()]);
    }

    public function scopeLastMonth($query)
    {
        return $query->whereBetween('start', [now()->startOfMonth()->subMonth(), now()->endOfMonth()->subMonth()]);
    }
    
    public function scopeBillableThisMonth($query)
    {
        return $query->billable()->thisMonth();
    }

    public function scopeBillableLastMonth($query)
    {
        return $query->billable()->lastMonth();
    }

    public function scopeNonBillableThisMonth($query)
    {
        return $query->nonBillable()->thisMonth();
    }

    public function scopeNonBillableLastMonth($query)
    {
        return $query->nonBillable()->lastMonth();
    }
}
