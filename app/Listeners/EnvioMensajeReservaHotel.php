<?php

namespace Femip\Listeners;

use Femip\Events\FormularioInscripcion;
use Femip\Events\FormularioInscripcionEvento;
use Femip\Events\FormularioReservaHotel;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvioMensajeReservaHotel
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
     * @param FormularioReservaHotel $event
     */
    public function handle(FormularioReservaHotel $event)
    {
        //ENVIAR A
        $aEmail = 'femip@femip.org';
        $aNombre = 'Femip';

        //ENVIAR DE
        $deEmail = $event->reservaHotel->email;
        $deNombre = $event->reservaHotel->nombres;

        $this->mailer->send('emails.mensaje-reserva-hotel', ['inscripcion' => $event->reservaHotel], function(Message $message) use ($deNombre, $deEmail, $aNombre, $aEmail){
            $message->to($aEmail, $aNombre);
            $message->from($deEmail, $deNombre);
            $message->subject('Femip - Reserva de Hotel');
        });
    }
}
