<<<<<<< HEAD
<?php namespace Impelling\Projects\Models;
=======
<?php namespace Unspun\Projects\Models;
>>>>>>> add-access-tokens

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
<<<<<<< HEAD
    public $table = 'impelling_projects_access_tokens';
=======
    public $table = 'unspun_projects_access_tokens';
>>>>>>> add-access-tokens

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public $belongsTo = [
        'project' => Project::class
    ];
}
