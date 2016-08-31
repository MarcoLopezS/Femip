<?php namespace Femip\Entities\Admin;

use Femip\Entities\BaseEntity;

class Configuration extends BaseEntity {

    protected $fillable = ['titulo','dominio','descripcion','keywords','email'];

}