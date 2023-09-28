<<<<<<< HEAD
<?php namespace Impelling\Projects\Models;
=======
<?php namespace Unspun\Projects\Models;
>>>>>>> add-access-tokens

use Str;
use Model;
use RainLab\User\Facades\Auth;
<<<<<<< HEAD
use Impelling\Projects\Classes\Traits\HasApiTokens;
use Impelling\Projects\Classes\Contracts\HasApiTokens as HasApiTokensContract;
=======
use Unspun\Projects\Classes\Traits\HasApiTokens;
use Unspun\Projects\Classes\Contracts\HasApiTokens as HasApiTokensContract;
>>>>>>> add-access-tokens

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
<<<<<<< HEAD
    public $table = 'impelling_projects_projects';
=======
    public $table = 'unspun_projects_projects';
>>>>>>> add-access-tokens

    /**
     * @var array rules for validation
     */
    public $rules = [
        'name' => 'required',
        'allowance' => 'required|integer',
        'rate' => 'required|integer',
    ];

    public $hasMany = [
        'tasks' => Task::class
    ];

    public $hasManyThrough = [
        'records' => [
            Record::class,
            'through' => Task::class
        ]
    ];

<<<<<<< HEAD
    public function afterCreate()
    {
        $this->project_id = Str::random(32);
=======
    public function beforeCreate()
    {
        $this->api_id = Str::random(32);
>>>>>>> add-access-tokens
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
        $loggedIn = Auth::check();
        return $this->allowance - (Record::where('project_id', $this->id)->billableThisMonth()->get()->sum('duration_value') / 60);
    }
}
