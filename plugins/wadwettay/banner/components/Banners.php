<?php namespace Wadwettay\Banner\Components;

use Carbon\Carbon;
use Cms\Classes\CodeBase;
use Cms\Classes\ComponentBase;
use Wadwettay\Banner\Models\Banner;

class Banners extends ComponentBase
{

    private $now;

    public function __construct(CodeBase $cmsObject = null, $properties = [])
    {
        parent::__construct($cmsObject, $properties);
        $this->now = Carbon::now()->timezone('Europe/Moscow');
    }

    public function componentDetails()
    {
        return [
            'name'        => 'Banners Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function getFullBanner()
    {
        return Banner::where('date_start', '<', $this->now)->where('date_end', '>', $this->now)->where('location', 'full')->first();
    }

    public function getLeftBanner()
    {
        return Banner::where('date_start', '<', $this->now)->where('date_end', '>', $this->now)->where('location', 'left')->first();
    }

    public function getRightBanner()
    {
        return Banner::where('date_start', '<', $this->now)->where('date_end', '>', $this->now)->where('location', 'right')->first();
    }
}
