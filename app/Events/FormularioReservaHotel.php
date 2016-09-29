<?php namespace Femip\Events;

use Femip\Entities\Femip\ReservaHotel;

class FormularioReservaHotel extends Event
{
    public $reservaHotel;

    /**
     * Create a new event instance.
     *
     * @param ReservaHotel $reservaHotel
     */
    public function __construct(ReservaHotel $reservaHotel)
    {
        $this->reservaHotel = $reservaHotel;
    }
}
