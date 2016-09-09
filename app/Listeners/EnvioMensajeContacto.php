<?php

namespace Femip\Listeners;

use Femip\Events\FormularioContacto;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;

class EnvioMensajeContacto
{
    private $mailer;

    /**
     * Create the event listener.
     *
     * @param Mailer $mailer
     * @internal param ContactoMensaje $contactoMensaje
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  FormularioContacto  $event
     * @return void
     */
    public function handle(FormularioContacto $event)
    {
        //ENVIAR A
        $aEmail = 'femip@femip.org';
        $aNombre = 'Femip';

        //ENVIAR DE
        $deEmail = $event->contactoMensaje->email;
        $deNombre = $event->contactoMensaje->nombre;

        $this->mailer->send('emails.mensaje-contacto', ['contacto' => $event->contactoMensaje], function(Message $message) use ($deNombre, $deEmail, $aNombre, $aEmail){
            $message->to($aEmail, $aNombre);
            $message->from($deEmail, $deNombre);
            $message->subject('Femip - Mensaje de Contacto');
        });
    }
}
