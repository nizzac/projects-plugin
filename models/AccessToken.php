<?php namespace Nizzac\Projects\Models;

use Model;

/**
 * AccessToken Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class AccessToken extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'nizzac_projects_access_tokens';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public $belongsTo = [
        'project' => Project::class
    ];

    public function scopeActive($query)
    {
        $query->where('enabled', true)->where(function($q) {
            $q->whereNull('expiry');
            $q->orWhere('expiry', '>', now());
        });
    }
}
