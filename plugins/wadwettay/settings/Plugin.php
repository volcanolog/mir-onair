<?php namespace Wadwettay\Settings;

use Backend;
use Backend\Facades\BackendMenu;
use System\Classes\PluginBase;
use System\Classes\SettingsManager;

/**
 * settings Plugin Information File
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
            'name'        => 'Пользовательские настройки',
            'description' => '',
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
        return []; // Remove this line to activate

        return [
            'Wadwettay\Settings\Components\MyComponent' => 'myComponent',
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
            'wadwettay.settings.some_permission' => [
                'tab' => 'settings',
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
        return []; // Remove this line to activate

        return [
            'settings' => [
                'label'       => 'settings',
                'url'         => Backend::url('wadwettay/settings/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['wadwettay.settings.*'],
                'order'       => 500,
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'banners' => [
                'label'       => 'Банеры',
                'description' => 'Управление банерами',
                'category'    => 'Пользовательские настройки',
                'icon'        => 'icon-globe',
                'class'       => 'Wadwettay\Settings\Models\Banner',
//                'url'         => Backend::url('wadwettay/settings/banners'),
                'order'       => 500
            ]
        ];
    }
}
