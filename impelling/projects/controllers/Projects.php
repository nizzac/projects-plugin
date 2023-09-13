<?php namespace Impelling\Projects\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Impelling\Projects\Models\Record;

/**
 * Projects Backend Controller
 *
 * @link https://docs.octobercms.com/3.x/extend/system/controllers.html
 */
class Projects extends Controller
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
    public $requiredPermissions = ['impelling.projects.projects'];

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Impelling.Projects', 'projects', 'projects');
    }

    public function update($projectId = null)
    {
        $totalThisMonth = $this->vars['total_this_month'] = Record::where('project_id', $projectId)->thisMonth()->get()->sum('duration_value');
        $totalLastMonth = $this->vars['total_last_month'] = Record::where('project_id', $projectId)->lastMonth()->get()->sum('duration_value');
        $billableThisMonth = $this->vars['billable_this_month'] = Record::where('project_id', $projectId)->billableThisMonth()->get()->sum('duration_value');
        $billableLastMonth = $this->vars['billable_last_month'] = Record::where('project_id', $projectId)->billableLastMonth()->get()->sum('duration_value');

        return parent::update($projectId);
    }
}
