<<<<<<< HEAD
<?php namespace Impelling\Projects\Controllers;
=======
<?php namespace Unspun\Projects\Controllers;
>>>>>>> add-access-tokens

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Tasks Backend Controller
 *
 * @link https://docs.octobercms.com/3.x/extend/system/controllers.html
 */
class Tasks extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string listConfig file
     */
    public $listConfig = 'config_list.yaml';

    /**
     * @var array required permissions
     */
<<<<<<< HEAD
    public $requiredPermissions = ['impelling.projects.tasks'];
=======
    public $requiredPermissions = ['unspun.projects.tasks'];
>>>>>>> add-access-tokens

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

<<<<<<< HEAD
        BackendMenu::setContext('Impelling.Projects', 'projects', 'tasks');
=======
        BackendMenu::setContext('Unspun.Projects', 'projects', 'tasks');
>>>>>>> add-access-tokens
    }
}
