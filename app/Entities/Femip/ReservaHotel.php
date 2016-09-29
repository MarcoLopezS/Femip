<?php namespace Femip\Entities\Femip;

use Femip\Entities\BaseEntity;

class ReservaHotel extends BaseEntity {

	protected $fillable = ['nombres','apellidos','email','direccion','habitaciones'];

    protected $table = "reserva_hotel";

}