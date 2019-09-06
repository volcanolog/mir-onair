<?php namespace Wadwettay\Settings\Components;

use Cms\Classes\ComponentBase;
use Wadwettay\Settings\Models\Banner;

class Banners extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Банеры',
            'description' => 'Пользовательские настройки банеров'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function getBanners()
    {
        return Banner::instance();
    }
}
