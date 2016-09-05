<?php namespace Femip\Repositories\Femip;

use Illuminate\Http\Request;
use Femip\Repositories\BaseRepo;

use Femip\Entities\Femip\Evento;

class EventoRepo extends BaseRepo{

    public function getModel()
    {
        return new Evento();
    }

    //PAGINAS NOTICIAS EN HOME
    public function listaEventos()
    {
        return $this->getModel()
                    ->where('published_at','<=',fechaActual())
                    ->where('publicar', 1)
                    ->orderBy('published_at', 'desc')
                    ->paginate(6);
    }

    //BUSQUEDA DE REGISTROS
    public function findAndPaginate(Request $request)
    {
        return $this->getModel()
                    ->titulo($request->get('titulo'))
                    ->publicar($request->get('publicar'))
                    ->orderBy('published_at', 'desc')
                    ->paginate();
    }

}