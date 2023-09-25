<?php namespace Unspun\Projects\Models;

use Str;
use Model;
use RainLab\User\Facades\Auth;
use Unspun\Projects\Classes\Traits\HasApiTokens;
use Unspun\Projects\Classes\Contracts\HasApiTokens as HasApiTokensContract;

/**
 * Project Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Project extends Model implements HasApiTokensContract
{
    use HasApiTokens;
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'unspun_projects_projects';

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

    public function beforeCreate()
    {
        $this->api_id = Str::random(32);
    }

    public function beforeSave()
    {
        $this->allowance = $this->allowance * 60;
        $this->rate = $this->rate * 100;
    }
    
    public function afterFetch()
    {
        $this->allowance = $this->allowance / 60;
        $this->rate = $this->rate / 100;
    }

    public function getBillableHoursLastMonthAttribute()
    {
        return Record::where('project_id', $this->id)->billableLastMonth()->get()->sum('duration_value') / 60;
    }

    public function getTotalRemaningHoursThisMonthAttribute()
    {
        return $this->allowance - (Record::where('project_id', $this->id)->billableThisMonth()->get()->sum('duration_value') / 60);
    }
}
