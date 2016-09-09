<?php namespace Femip\Events;

use Femip\Entities\Femip\Inscripcion;

class FormularioInscripcion extends Event
{
    public $inscripcion;

    /**
     * Create a new event instance.
     *
     * @param Inscripcion $inscripcion
     */
    public function __construct(Inscripcion $inscripcion)
    {
        $this->inscripcion = $inscripcion;
    }
}
