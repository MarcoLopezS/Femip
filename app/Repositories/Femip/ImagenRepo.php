<?php namespace Femip\Repositories\Femip;

use Femip\Repositories\BaseRepo;

use Femip\Entities\Femip\Imagen;

class ImagenRepo extends BaseRepo{

    public function getModel()
    {
        return new Imagen();
    }

}