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

    public function getTopBanner()
    {
        return Banner::where('date_start', '<', $this->now)->where('date_end', '>', $this->now)->where('location', 'baner-top')->inRandomOrder()->first();
    }

    public function getFullBanner()
    {
        return Banner::where('date_start', '<', $this->now)->where('date_end', '>', $this->now)->where('location', 'full')->inRandomOrder()->first();
    }

    public function getDoubleBanner()
    {
        return Banner::where('date_start', '<', $this->now)->where('date_end', '>', $this->now)->where('location', 'double')->inRandomOrder()->first();
    }

    public function getCarouselBanner()
    {
        return Banner::where('date_start', '<', $this->now)->where('date_end', '>', $this->now)->where('location', 'carousel')->get();
    }

    public function getCenterBanner()
    {
        return Banner::where('date_start', '<', $this->now)->where('date_end', '>', $this->now)->where('location', 'baner-center')->inRandomOrder()->first();
    }

    public function getBottomBanner()
    {
        return Banner::where('date_start', '<', $this->now)->where('date_end', '>', $this->now)->where('location', 'baner-bottom')->inRandomOrder()->first();
    }
}
