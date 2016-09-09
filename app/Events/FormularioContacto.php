<?php namespace Femip\Events;

use Femip\Entities\Admin\ContactoMensaje;

class FormularioContacto extends Event
{
    public $contactoMensaje;

    /**
     * Create a new event instance.
     *
     * @param ContactoMensaje $contactoMensaje
     */
    public function __construct(ContactoMensaje $contactoMensaje)
    {
        $this->contactoMensaje = $contactoMensaje;
    }

}
