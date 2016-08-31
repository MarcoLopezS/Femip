<?php namespace Femip\Repositories\Femip;

use Illuminate\Http\Request;
use Femip\Repositories\BaseRepo;

use Femip\Entities\Femip\Galeria;

class GaleriaRepo extends BaseRepo{

    public function getModel()
    {
        return new Galeria();
    }

    //PAGINAS NOTICIAS EN HOME
    public function listaGalerias()
    {
        return $this->getModel()
                    ->where('published_at','<=',fechaActual())
                    ->where('publicar', 1)
                    ->orderBy('published_at', 'desc')
                    ->paginate(4);
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