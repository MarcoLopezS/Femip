<?php namespace Femip\Events;

use Femip\Entities\Femip\InscripcionEvento;

class FormularioInscripcionEvento extends Event
{
    public $inscripcionEvento;

    /**
     * Create a new event instance.
     *
     * @param InscripcionEvento $inscripcionEvento
     */
    public function __construct(InscripcionEvento $inscripcionEvento)
    {
        $this->inscripcionEvento = $inscripcionEvento;
    }
}
