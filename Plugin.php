<?php namespace Nizzac\Projects;

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
            'author' => 'Nizzac',
            'icon' => 'icon-leaf'
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
                'url' => Backend::url('nizzac/projects/projects'),
                'icon' => 'icon-leaf',
                'permissions' => ['nizzac.projects.*'],
                'order' => 500,
                
                'sideMenu' => [
                    'projects' => [
                        'label' => 'Projects',
                        'url' => Backend::url('nizzac/projects/projects'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['nizzac.projects.*'],
                        'order' => 500,
                    ],
                    'tasks' => [
                        'label' => 'Tasks',
                        'url' => Backend::url('nizzac/projects/tasks'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['nizzac.projects.*'],
                        'order' => 501,
                    ],
                    'records' => [
                        'label' => 'Records',
                        'url' => Backend::url('nizzac/projects/records'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['nizzac.projects.*'],
                        'order' => 502,
                    ],
                    'access_tokens' => [
                        'label' => 'Access Tokens',
                        'url' => Backend::url('nizzac/projects/accesstokens'),
                        'icon' => 'icon-lock',
                        'permissions' => ['nizzac.projects.*'],
                        'order' => 503
                    ]
                ]
            ],
        ];
    }
}
