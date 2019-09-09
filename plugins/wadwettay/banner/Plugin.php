<?php namespace Wadwettay\Banner;

use Backend;
use System\Classes\PluginBase;

/**
 * banner Plugin Information File
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
            'name'        => 'Баннеры',
            'description' => 'No description provided yet...',
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
            'Wadwettay\Banner\Components\Banners' => 'banners',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'wadwettay.banner.some_permission' => [
                'tab' => 'banner',
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
        return [
            'banner' => [
                'label'       => 'Баннеры',
                'url'         => Backend::url('wadwettay/banner/banners'),
                'icon'        => 'icon-leaf',
                'permissions' => ['wadwettay.banner.*'],
                'order'       => 500,
            ],
        ];
    }
}
