<?php namespace Wadwettay\Trinsling;

use Backend;
use System\Classes\PluginBase;

/**
 * trinsling Plugin Information File
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
            'name'        => 'trinsling',
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
//        return []; // Remove this line to activate

        return [
            'Wadwettay\Trinsling\Components\Streams' => 'trinsling',
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
            'wadwettay.trinsling.some_permission' => [
                'tab' => 'trinsling',
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
            'trinsling' => [
                'label'       => 'Трансляция',
                'url'         => Backend::url('wadwettay/trinsling/streams'),
                'icon'        => 'icon-leaf',
                'permissions' => ['wadwettay.trinsling.*'],
                'order'       => 500
            ],
        ];
    }
}
