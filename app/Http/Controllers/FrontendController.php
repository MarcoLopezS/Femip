<?php namespace Femip\Http\Controllers;

use Femip\Entities\Admin\ContactoMensaje;
use Femip\Entities\Femip\Inscripcion;
use Femip\Events\FormularioContacto;
use Femip\Repositories\Admin\SliderRepo;
use Femip\Repositories\Femip\NotaPrensaRepo;
use Illuminate\Http\Request;

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

    /*
     * HOME
     */
    public function index()
    {
        $noticias = $this->noticiaRepo->listaNoticias();

        $slider = $this->sliderRepo->where('id',1)->first();

        return view('frontend.index', compact('noticias', 'slider'));
    }

    /*
     * NOSOTROS
     */
    public function nosotros()
    {
        return view('frontend.nosotros');
    }

    public function nosotrosMensaje()
    {
        return view('frontend.nosotros-mensaje');
    }

    /*
     * NOTICIAS
     */
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

    /*
     * NOTAS DE PRENSA
     */
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

    /*
     * EVENTOS
     */
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

    /*
     * GALERIA DE FOTOS
     */
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

    /*
     * ENLACES
     */
    public function enlaces()
    {
        return view('frontend.enlaces');
    }

    /*
     * CONTACTO
     */
    public function contactoGet()
    {
        return view('frontend.contacto');
    }

    public function contactoPost(Request $request)
    {
        //REGLAS
        $rules = [
            'nombre'  => 'required',
            'apellidos' => 'required',
            'email'   => 'required|email',
            'mensaje' => 'required'
        ];

        //VALIDACION
        $this->validate($request, $rules);

//        //VALIDACION DE CAPTCHA
//        if($this->captchaCheck() == false)
//        {
//            return redirect()->back()
//                ->withErrors(['Error de captcha'])
//                ->withInput();
//        }

        //GUARDAR EN BD
        $contMensaje = new ContactoMensaje($request->all());
        $contMensaje->type = 'contacto';
        $contMensaje->save();

        $mensaje = 'Tu mensaje ha sido enviado.';

        return [
            'message' => $mensaje
        ];

    }

    /*
     * INSCRIPCION
     */

    public function inscripcionGet()
    {
        return view('frontend.inscripcion');
    }

    public function inscripcionPost(Request $request)
    {
        //REGLAS
        $rules = [
            'asoc_nombre'  => 'required',
            'asoc_pais' => 'required',
            'asoc_direccion' => 'required',
            'asoc_telefono' => 'required',
            'asoc_email' => 'required|email',
            'rep_cargo' => 'required',
            'rep_nombre' => 'required',
            'rep_direccion' => 'required',
            'rep_telefono' => 'required',
            'rep_email' => 'required|email'
        ];

        //VALIDACION
        $this->validate($request, $rules);

//        //VALIDACION DE CAPTCHA
//        if($this->captchaCheck() == false)
//        {
//            return redirect()->back()
//                ->withErrors(['Error de captcha'])
//                ->withInput();
//        }

        //GUARDAR EN BD
        $contMensaje = new Inscripcion($request->all());
        $contMensaje->save();

        $mensaje = 'El envío de tus datos se ha realizado con éxito.';

        return [
            'message' => $mensaje
        ];
    }
}