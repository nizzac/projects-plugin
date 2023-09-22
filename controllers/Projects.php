<?php namespace Impelling\Projects\Controllers;

use Str;
use BackendMenu;
use Backend\Classes\Controller;
use Impelling\Projects\Models\Record;
use Impelling\Projects\Models\Project;
use Impelling\Projects\Models\AccessToken;

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
        $project = Project::find($projectId);
        $billableLastMonth = $this->vars['billable_last_month'] = Record::where('project_id', $project->id)->billableLastMonth()->get()->sum('duration_value') / 60;
        $allowance = $this->vars['allowance'] = $project->allowance;

        return parent::update($projectId);
    }

    public function update_onCreateAccessToken()
    {
        $code = Str::random(40);

        AccessToken::where('project_id', request()->project_id)->update(['enabled' => false]);

        $accessToken = new AccessToken;
        $accessToken->access_token = hash('sha256', $code);
        $accessToken->project_id = request()->project_id;
        $accessToken->enabled = true;
        $accessToken->url = "https://nizzac.loc";
        $accessToken->save();

        $this->vars['accessToken'] = $code;
        
        return [
            '#accessToken' => $this->makePartial('access_token')
        ];
    }
}
