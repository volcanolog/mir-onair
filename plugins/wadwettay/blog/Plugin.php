<?php namespace Wadwettay\Blog;

use Backend;
use System\Classes\PluginBase;

/**
 * blog Plugin Information File
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
            'name'        => 'Blog',
            'description' => 'Blog module',
            'author'      => 'Aleksey Abramov',
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
            'Wadwettay\Blog\Components\Posts' => 'news',
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
            'wadwettay.blog.some_permission' => [
                'tab' => 'blog',
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
            'blog' => [
                'label'       => 'Блог',
                'url'         => Backend::url('wadwettay/blog/posts'),
                'icon'        => 'icon-leaf',
                'permissions' => ['wadwettay.blog.*'],
                'order'       => 500,
                'sideMenu' => [
                    'posts' => [
                        'label'       => 'Новости',
                        'icon'        => 'icon-list-alt',
                        'url'         => \Backend::url('wadwettay/blog/posts'),
                    ],
                ]
            ],
        ];
    }
}
