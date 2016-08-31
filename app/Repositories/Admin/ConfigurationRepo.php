<?php namespace Femip\Repositories\Admin;

use Femip\Repositories\BaseRepo;

use Femip\Entities\Configuration;

class ConfigurationRepo extends BaseRepo{

    public function getModel()
    {
        return new Configuration;
    }

}