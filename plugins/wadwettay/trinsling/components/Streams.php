<?php namespace Wadwettay\Trinsling\Components;

use Cms\Classes\ComponentBase;
use Wadwettay\Trinsling\Models\Stream;

class Streams extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Streams Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }


    public function getStreams()
    {
        return Stream::all();
    }
}
