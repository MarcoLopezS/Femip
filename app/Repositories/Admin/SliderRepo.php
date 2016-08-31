<?php namespace Femip\Repositories\Admin;

use Femip\Repositories\BaseRepo;

use Femip\Entities\Admin\Slider;

class SliderRepo extends BaseRepo{

    public function getModel()
    {
        return new Slider;
    }

}