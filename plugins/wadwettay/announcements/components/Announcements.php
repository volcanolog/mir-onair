<?php namespace Wadwettay\Announcements\Components;

use Cms\Classes\ComponentBase;
use Wadwettay\Announcements\Models\Announcement;

class Announcements extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Announcements Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function getAnnounces()
    {
        return Announcement::all();
    }
}
