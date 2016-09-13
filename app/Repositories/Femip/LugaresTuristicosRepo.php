<?php namespace Femip\Repositories\Femip;

use Femip\Repositories\BaseRepo;

use Femip\Entities\Femip\LugaresTuristicos;

class LugaresTuristicosRepo extends BaseRepo{

    public function getModel()
    {
        return new LugaresTuristicos();
    }

}