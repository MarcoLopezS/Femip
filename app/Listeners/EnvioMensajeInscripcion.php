<?php

namespace Femip\Listeners;

use Femip\Events\FormularioInscripcion;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvioMensajeInscripcion
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
     * @param  FormularioInscripcion  $event
     * @return void
     */
    public function handle(FormularioInscripcion $event)
    {
        //ENVIAR A
        $aEmail = 'femip@femip.org';
        $aNombre = 'Femip';

        //ENVIAR DE
        $deEmail = $event->inscripcion->asoc_email;
        $deNombre = $event->inscripcion->asoc_nombre;

        $this->mailer->send('emails.mensaje-inscripcion', ['inscripcion' => $event->inscripcion], function(Message $message) use ($deNombre, $deEmail, $aNombre, $aEmail){
            $message->to($aEmail, $aNombre);
            $message->from($deEmail, $deNombre);
            $message->subject('Femip - Inscripción');
        });
    }
}
