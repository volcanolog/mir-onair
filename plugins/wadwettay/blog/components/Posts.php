<?php namespace Wadwettay\Blog\Components;

use Cms\Classes\ComponentBase;
use Wadwettay\Blog\Models\LatestNews;

class Posts extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Posts Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function getNews()
    {
        return LatestNews::all();
    }
}
