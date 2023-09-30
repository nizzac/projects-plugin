<?php namespace Nizzac\Projects\Models;

use Str;
use Model;
use RainLab\User\Facades\Auth;
use Nizzac\Projects\Classes\Traits\HasApiTokens;
use Nizzac\Projects\Classes\Contracts\HasApiTokens as HasApiTokensContract;

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
    public $table = 'nizzac_projects_projects';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'name' => 'required',
        'allowance' => 'required|integer',
        'rate' => 'required|integer',
    ];

    public $hasMany = [
        'tasks' => Task::class,
        'access_tokens' => AccessToken::class,
        'active_access_tokens' => [
            AccessToken::class,
            'scope' => 'active'
        ]
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
