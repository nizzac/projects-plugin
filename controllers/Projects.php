<?php namespace Ncarps\Projects\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Ncarps\Projects\Models\Record;
use Ncarps\Projects\Models\Project;

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
    public $requiredPermissions = ['ncarps.projects.projects'];

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Ncarps.Projects', 'projects', 'projects');
    }

    public function update($projectId = null)
    {
        // $project = Project::find($projectId);
        // $billableLastMonth = $this->vars['billable_last_month'] = Record::where('project_id', $project->id)->billableLastMonth()->get()->sum('duration_value') / 60;
        // $allowance = $this->vars['allowance'] = $project->allowance;

        return parent::update($projectId);
    }
}
