<?php namespace Wadwettay\Announcements;

use Backend;
use System\Classes\PluginBase;

/**
 * announcements Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Анонсы',
            'description' => 'Модуль для анонсов',
            'author'      => 'wadwettay',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {

        return [
            'Wadwettay\Announcements\Components\Announcements' => 'announcements',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'wadwettay.announcements.some_permission' => [
                'tab' => 'announcements',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
//        return []; // Remove this line to activate

        return [
            'announcements' => [
                'label'       => 'Анонсы',
                'url'         => Backend::url('wadwettay/announcements/announcements'),
                'icon'        => 'icon-leaf',
                'permissions' => ['wadwettay.announcements.*'],
                'order'       => 500,
                'sideMenu' => [
                    'products' => [
                        'label'       => 'Анонсы',
                        'icon'        => 'icon-list-alt',
                        'url'         => \Backend::url('wadwettay/announcements/announcements'),
                    ]
                ]
            ],
        ];
    }
}
