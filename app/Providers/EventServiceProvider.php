<?php

namespace Femip\Providers;

use Femip\Events\FormularioContacto;
use Femip\Events\FormularioInscripcion;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Femip\Events\FormularioContacto' => [
            'Femip\Listeners\EnvioMensajeContacto'
        ],
        'Femip\Events\FormularioInscripcion' => [
            'Femip\Listeners\EnvioMensajeInscripcion'
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        $events->listen('eloquent.created: Femip\Entities\Admin\ContactoMensaje', function ($model) {
            event(new FormularioContacto($model));
        });

        $events->listen('eloquent.created: Femip\Entities\Femip\Inscripcion', function ($model) {
            event(new FormularioInscripcion($model));
        });
    }
}
