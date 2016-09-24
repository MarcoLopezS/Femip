<?php

namespace Femip\Listeners;

use Femip\Events\FormularioInscripcion;
use Femip\Events\FormularioInscripcionEvento;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvioMensajeInscripcionEvento
{
    private $mailer;

    /**
     * Create the event listener.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param FormularioInscripcionEvento $event
     */
    public function handle(FormularioInscripcionEvento $event)
    {
        //ENVIAR A
        $aEmail = 'femip@femip.org';
        $aNombre = 'Femip';

        //ENVIAR DE
        $deEmail = $event->inscripcionEvento->email;
        $deNombre = $event->inscripcionEvento->nombres;

        $this->mailer->send('emails.mensaje-inscripcion-evento', ['inscripcion' => $event->inscripcionEvento], function(Message $message) use ($deNombre, $deEmail, $aNombre, $aEmail){
            $message->to($aEmail, $aNombre);
            $message->from($deEmail, $deNombre);
            $message->subject('Femip - Ficha de Inscripción de Evento');
        });
    }
}
