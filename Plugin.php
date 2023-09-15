<?php namespace Ncarps\Projects;

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
            'author' => 'Ncarps',
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
            'Ncarps\Projects\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'ncarps.projects.some_permission' => [
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
                'url' => Backend::url('ncarps/projects/projects'),
                'icon' => 'icon-leaf',
                'permissions' => ['ncarps.projects.*'],
                'order' => 500,

                'sideMenu' => [
                    'projects' => [
                        'label' => 'Projects',
                        'url' => Backend::url('ncarps/projects/projects'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['ncarps.projects.*'],
                        'order' => 500,
                    ],
                    'tasks' => [
                        'label' => 'Tasks',
                        'url' => Backend::url('ncarps/projects/tasks'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['ncarps.projects.*'],
                        'order' => 500,
                    ],
                    'records' => [
                        'label' => 'Records',
                        'url' => Backend::url('ncarps/projects/records'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['ncarps.projects.*'],
                        'order' => 500,
                    ],
                ]
            ],
        ];
    }
}
