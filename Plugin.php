<?php namespace Unspun\Projects;

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
            'author' => 'Unspun',
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
                'url' => Backend::url('unspun/projects/projects'),
                'icon' => 'icon-leaf',
                'permissions' => ['unspun.projects.*'],
                'order' => 500,
                
                'sideMenu' => [
                    'projects' => [
                        'label' => 'Projects',
                        'url' => Backend::url('unspun/projects/projects'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['unspun.projects.*'],
                        'order' => 500,
                    ],
                    'tasks' => [
                        'label' => 'Tasks',
                        'url' => Backend::url('unspun/projects/tasks'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['unspun.projects.*'],
                        'order' => 501,
                    ],
                    'records' => [
                        'label' => 'Records',
                        'url' => Backend::url('unspun/projects/records'),
                        'icon' => 'icon-leaf',
                        'permissions' => ['unspun.projects.*'],
                        'order' => 502,
                    ],
                    'access_tokens' => [
                        'label' => 'Access Tokens',
                        'url' => Backend::url('unspun/projects/accesstokens'),
                        'icon' => 'icon-lock',
                        'permissions' => ['unspun.projects.*'],
                        'order' => 503
                    ]
                ]
            ],
        ];
    }
}
