<?php

namespace Femip\Console\Commands;

use Femip\Entities\Femip\Noticia;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importar datos';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Excel::load('public/noticias.csv', function($reader){

            foreach($reader->get() as $item)
            {
                $nota = Noticia::create([
                    'id' => $item->id,
                    'titulo' => $item->titulo,
                    'slug_url' => $item->slug_url,
                    'contenido' => $item->contenido,
                    'video' => $item->video,
                    'user_id' => $item->user_id,
                    'published_at' => $item->fecha_publicacion
                ]);

                $nota->imagenes()->create([
                    'imagen' => $item->imagen,
                    'imagen_carpeta' => $item->carpeta_imagen
                ]);
            }

        });

        $this->line('<info>Se importó</info> Noticias');
    }
}
