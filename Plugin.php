<<<<<<< HEAD
<?php namespace Impelling\Projects;
=======
<?php namespace Unspun\Projects;
>>>>>>> add-access-tokens

use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Projects',
            'description' => 'Time management for web projects',
<<<<<<< HEAD
            'author' => 'Impelling',
=======
            'author' => 'Unspun',
>>>>>>> add-access-tokens
            'icon' => 'icon-leaf'
        ];
    }

    /**
<<<<<<< HEAD
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        //
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        //
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Impelling\Projects\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'impelling.projects.some_permission' => [
                'tab' => 'Projects',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
=======
>>>>>>> add-access-tokens
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return [
            'projects' => [
                'label' => 'Projects',
<<<<<<< HEAD
                'url' => Backend::url('impelling/projects/projects'),
                'icon' => 'icon-leaf',
                'permissions' => ['impelling.projects.*'],
=======
                'url' => Backend::url('unspun/projects/projects'),
                'icon' => 'icon-leaf',
                'permissions' => ['unspun.projects.*'],
>>>>>>> add-access-tokens
                'order' => 500,
                
                'sideMenu' => [
                    'projects' => [
                        'label' => 'Projects',
<<<<<<< HEAD
                        'url' => Backend::url('impelling/projects/projects'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['impelling.projects.*'],
=======
                        'url' => Backend::url('unspun/projects/projects'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['unspun.projects.*'],
>>>>>>> add-access-tokens
                        'order' => 500,
                    ],
                    'tasks' => [
                        'label' => 'Tasks',
<<<<<<< HEAD
                        'url' => Backend::url('impelling/projects/tasks'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['impelling.projects.*'],
=======
                        'url' => Backend::url('unspun/projects/tasks'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['unspun.projects.*'],
>>>>>>> add-access-tokens
                        'order' => 501,
                    ],
                    'records' => [
                        'label' => 'Records',
<<<<<<< HEAD
                        'url' => Backend::url('impelling/projects/records'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['impelling.projects.*'],
=======
                        'url' => Backend::url('unspun/projects/records'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['unspun.projects.*'],
>>>>>>> add-access-tokens
                        'order' => 502,
                    ],
                    'access_tokens' => [
                        'label' => 'Access Tokens',
<<<<<<< HEAD
                        'url' => Backend::url('impelling/projects/accesstokens'),
                        'icon' => 'icon-lock',
                        'permissions' => ['impelling.projects.*'],
=======
                        'url' => Backend::url('unspun/projects/accesstokens'),
                        'icon' => 'icon-lock',
                        'permissions' => ['unspun.projects.*'],
>>>>>>> add-access-tokens
                        'order' => 503
                    ]
                ]
            ],
        ];
    }
}
