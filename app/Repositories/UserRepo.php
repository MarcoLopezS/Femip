<?php namespace Femip\Repositories;

use Femip\Entities\User;

class UserRepo extends BaseRepo{

    public function getModel()
    {
        return new User;
    }

    //BUSQUEDA DE REGISTROS
    public function findUsersAndPaginate()
    {
        return $this->getModel()
                    ->orderBy('id', 'asc')
                    ->paginate();
	}

}