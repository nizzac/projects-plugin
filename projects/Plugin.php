<?php namespace Impelling\Projects;

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
            'author' => 'Impelling',
            'icon' => 'icon-leaf'
        ];
    }

    /**
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
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return [
            'projects' => [
                'label' => 'Projects',
                'url' => Backend::url('impelling/projects/projects'),
                'icon' => 'icon-leaf',
                'permissions' => ['impelling.projects.*'],
                'order' => 500,
                
                'sideMenu' => [
                    'projects' => [
                        'label' => 'Projects',
                        'url' => Backend::url('impelling/projects/projects'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['impelling.projects.*'],
                        'order' => 500,
                    ],
                    'tasks' => [
                        'label' => 'Tasks',
                        'url' => Backend::url('impelling/projects/tasks'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['impelling.projects.*'],
                        'order' => 501,
                    ],
                    'records' => [
                        'label' => 'Records',
                        'url' => Backend::url('impelling/projects/records'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['impelling.projects.*'],
                        'order' => 502,
                    ],
                    'access_tokens' => [
                        'label' => 'Access Tokens',
                        'url' => Backend::url('impelling/projects/accesstokens'),
                        'icon' => 'icon-lock',
                        'permissions' => ['impelling.projects.*'],
                        'order' => 503
                    ]
                ]
            ],
        ];
    }
}
