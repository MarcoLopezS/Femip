<?php namespace Femip\Http\Controllers;

use Femip\Repositories\Admin\SliderRepo;
use Femip\Repositories\Femip\NotaPrensaRepo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Femip\Http\Controllers\Controller;

use Femip\Repositories\Femip\EventoRepo;
use Femip\Repositories\Femip\GaleriaRepo;
use Femip\Repositories\Femip\NoticiaRepo;

class FrontendController extends Controller
{
    protected $noticiaRepo;
    protected $notaPrensaRepo;
    protected $eventoRepo;
    protected $galeriaRepo;
    protected $sliderRepo;

    /**
     * FrontendController constructor.
     * @param EventoRepo $eventoRepo
     * @param GaleriaRepo $galeriaRepo
     * @param NoticiaRepo $noticiaRepo
     * @param NotaPrensaRepo $notaPrensaRepo
     * @param SliderRepo $sliderRepo
     */
    public function __construct(EventoRepo $eventoRepo,
                                GaleriaRepo $galeriaRepo,
                                NoticiaRepo $noticiaRepo,
                                NotaPrensaRepo $notaPrensaRepo,
                                SliderRepo $sliderRepo)
    {
        $this->eventoRepo = $eventoRepo;
        $this->galeriaRepo = $galeriaRepo;
        $this->noticiaRepo = $noticiaRepo;
        $this->notaPrensaRepo = $notaPrensaRepo;
        $this->sliderRepo = $sliderRepo;
    }

    public function index()
    {
        $noticias = $this->noticiaRepo->listaNoticias();

        $slider = $this->sliderRepo->where('id',1)->first();

        return view('frontend.index', compact('noticias', 'slider'));
    }

    public function nosotros()
    {
        return view('frontend.nosotros');
    }

    public function nosotrosMensaje()
    {
        return view('frontend.nosotros-mensaje');
    }

    public function noticias()
    {
        $rows = $this->noticiaRepo->listaNoticias();

        return view('frontend.noticias', compact('rows'));
    }

    public function noticiasSelect($id, $url)
    {
        $row = $this->noticiaRepo->findOrFail($id);

        return view('frontend.noticias-select', compact('row'));
    }

    public function prensa()
    {
        $rows = $this->notaPrensaRepo->listaNoticias();

        return view('frontend.nota-prensa', compact('rows'));
    }

    public function prensaSelect($id, $url)
    {
        $row = $this->notaPrensaRepo->findOrFail($id);

        return view('frontend.nota-prensa-select', compact('row'));
    }

    public function eventos()
    {
        $rows = $this->eventoRepo->listaEventos();

        return view('frontend.eventos', compact('rows'));
    }

    public function eventosSelect($id, $url)
    {
        $row = $this->eventoRepo->findOrFail($id);

        return view('frontend.eventos-select', compact('row'));
    }

    public function galerias()
    {
        $rows = $this->galeriaRepo->listaGalerias();

        return view('frontend.galerias', compact('rows'));
    }

    public function galeriasSelect($id, $url)
    {
        $row = $this->galeriaRepo->findOrFail($id);

        return view('frontend.galerias-select', compact('row'));
    }

    public function enlaces()
    {
        return view('frontend.enlaces');
    }
}