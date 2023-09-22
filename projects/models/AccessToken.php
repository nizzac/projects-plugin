<?php namespace Impelling\Projects\Models;

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
    public $table = 'impelling_projects_access_tokens';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public $belongsTo = [
        'project' => Project::class
    ];
}
