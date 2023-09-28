<<<<<<< HEAD
<?php namespace Impelling\Projects\Controllers;

use Str;
use BackendMenu;
use Backend\Classes\Controller;
use Impelling\Projects\Models\Record;
use Impelling\Projects\Models\Project;
use Impelling\Projects\Models\AccessToken;
=======
<?php namespace Unspun\Projects\Controllers;

use Str;
use stdClass;
use BackendMenu;
use Backend\Classes\Controller;
use Unspun\Projects\Models\Task;
use Unspun\Projects\Models\AccessToken;
>>>>>>> add-access-tokens

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
<<<<<<< HEAD
    public $requiredPermissions = ['impelling.projects.projects'];
=======
    public $requiredPermissions = ['unspun.projects.projects'];
>>>>>>> add-access-tokens

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

<<<<<<< HEAD
        BackendMenu::setContext('Impelling.Projects', 'projects', 'projects');
=======
        BackendMenu::setContext('Unspun.Projects', 'projects', 'projects');
>>>>>>> add-access-tokens
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

<<<<<<< HEAD
        AccessToken::where('project_id', request()->project_id)->update(['enabled' => false]);
=======
        // Delete any existing access tokens for this project
        AccessToken::where('project_id', request()->project_id)->delete();
>>>>>>> add-access-tokens

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
<<<<<<< HEAD
=======

    public function board($projectId)
    {
        $this->title = "Project Tasks";
        $this->vars['projectId'] = $projectId;
    }

    public function onGetTasks()
    {
        $tasks = collect();

        foreach((new Task)->getStatusOptions() as $status => $label) {
            $t = new stdClass;
            $t->name = $label;
            $t->status = $status;
            $t->tasks = Task::where('project_id', post('project'))->with(['user'])->orderBy('sort_order')->status($status)->get();

            $tasks->push($t);
        }

        return $tasks;
    }

    public function onUpdateTaskStatus()
    {
        Task::where('id', post('task'))->update(['status' => post('status')]);
        return response()->json(200);
    }

    public function onUpdateTasksorder()
    {
        $tasks = post('tasks');

        foreach ($tasks as $key => $id) {
            Task::where('id', $id)->update(['sort_order' => $key]);
        }

        return response()->json(200);
    }
>>>>>>> add-access-tokens
}
