<?php namespace Femip\Http\Controllers\Admin;

use Femip\Entities\Femip\Evento;
use Femip\Entities\Femip\LugaresTuristicos;
use Femip\Repositories\Femip\LugaresTuristicosRepo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Femip\Http\Controllers\Controller;

use Femip\Entities\Femip\Imagen;
use Femip\Repositories\Femip\EventoRepo;
use Femip\Repositories\Femip\ImagenRepo;

class EventosController extends Controller {

	protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required|min:10|max:255',
        'contenido' => 'required',
        'published_at' => 'required',
        'publicar' => 'required|in:1,0'
	];

    protected $eventoRepo;
    protected $imagenRepo;
    protected $lugaresTuristicosRepo;

    /**
     * NoticiasController constructor.
     * @param EventoRepo $eventoRepo
     * @param ImagenRepo $imagenRepo
     * @param LugaresTuristicosRepo $lugaresTuristicosRepo
     * @internal param eventoRepo $eventoRepo
     */
    public function __construct(EventoRepo $eventoRepo,
                                ImagenRepo $imagenRepo,
                                LugaresTuristicosRepo $lugaresTuristicosRepo)
	{
        $this->eventoRepo = $eventoRepo;
        $this->imagenRepo = $imagenRepo;
        $this->lugaresTuristicosRepo = $lugaresTuristicosRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
	public function index(Request $request)
	{
		$rows = $this->eventoRepo->findAndPaginate($request);

        return view('admin.eventos.list', compact('rows'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.eventos.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
	public function store(Request $request)
	{
		$this->validate($request, $this->rules);

		//VARIABLES
		$titulo = $request->input('titulo');
		$slug_url = $this->eventoRepo->SlugUrl($titulo);

		//GUARDAR DATOS
		$post = new Evento($request->all());
		$post->slug_url = $slug_url;
		$post->user_id = auth()->user()->id;
        $save = $this->eventoRepo->create($post, $request->all());

		//MENSAJE
		flash()->success('El registro se agregó satisfactoriamente.');

		//REDIRECCIONAR A PAGINA PARA VER DATOS
		return redirect()->route('admin.eventos.img.create', $save->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = $this->eventoRepo->findOrFail($id);

		return view('admin.eventos.edit', compact('post'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
	public function update($id, Request $request)
	{
		//BUSCAR ID
		$post = $this->eventoRepo->findOrFail($id);

		//VALIDACION DE DATOS
		$this->validate($request, $this->rules);

		//VARIABLES
		$titulo = $request->input('titulo');
		$slug_url = $this->eventoRepo->SlugUrl($titulo);

		//GUARDAR DATOS
		$post->slug_url = $slug_url;
		$this->eventoRepo->update($post, $request->all());

		//MENSAJE
		flash()->success('El registro se actualizó satisfactoriamente.');

		//REDIRECCIONAR A PAGINA PARA VER DATOS
		return redirect()->route('admin.eventos.index');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
	public function destroy($id, Request $request)
	{
		//BUSCAR ID PARA ELIMINAR
		$post = $this->eventoRepo->findOrFail($id);
		$post->delete();

		$message = 'El registro se eliminó satisfactoriamente.';

		if($request->ajax())
		{
			return response()->json([
				'message' => $message
			]);
		}

		return redirect()->route('admin.eventos.index');
	}


    /**
     * Fotos de Post
     *
     * @param $post
     * @return Response
     * @internal param int $id
     */
    public function photosList($post)
    {
        $posts = $this->eventoRepo->findOrFail($post);
        $photos = $posts->imagenes;

        return view('admin.eventos-imagenes.list', compact('posts', 'photos'));
    }

    public function photosOrder($post, Request $request)
    {
        if($request->ajax())
        {
            $sortedval = $request->input('listPhoto');
            try{
                foreach ($sortedval as $key => $sort){
                    $sortPhoto = Imagen::find($sort);
                    $sortPhoto->orden = $key;
                    $sortPhoto->save();
                }
            }
            catch (Exception $e)
            {
                return 'false';
            }
        }
    }

    public function photosCreate($post)
    {
        $posts = $this->eventoRepo->findOrFail($post);

        return view('admin.eventos-imagenes.upload', compact('posts'));
    }

    public function photosStore($post, Request $request)
    {
        //CREAR CARPETA CON FECHA Y MOVER IMAGEN
        $this->eventoRepo->CrearCarpeta();
        $ruta = "upload/".$this->eventoRepo->FechaCarpeta();
        $archivo = $request->file('file');
        $imagen = $this->eventoRepo->FileMove($archivo, $ruta);
        $imagen_carpeta = $this->eventoRepo->FechaCarpeta();

        //BUSCAR ID DE POST
        $row = $this->eventoRepo->findOrFail($post);

        //GUARDAR IMAGEN
        $row->imagenes()->create([
            'imagen' => $imagen,
            'imagen_carpeta' => $imagen_carpeta
        ]);
    }

    public function photosEdit($post, $id)
    {
        $posts = $this->eventoRepo->findOrFail($post);
        $photo = $this->imagenRepo->findOrFail($id);

        return view('admin.eventos-imagenes.edit', compact('posts', 'photo'));
    }

    public function photosUpdate($post, $id, Request $request)
    {
        $postPhoto = $this->imagenRepo->findOrFail($id);

        $ruleImg = [
            'imagen' => 'mimes:jpg,jpeg,png'
        ];

        //VALIDACION DE DATOS
        $this->validate($request, $ruleImg);

        //VARIABLES
        $titulo = $request->input('titulo');

        //VERIFICAR SI SUBIO IMAGEN
        if($request->hasFile('imagen'))
        {
            $this->imagenRepo->CrearCarpeta();
            $ruta = "upload/".$this->imagenRepo->FechaCarpeta();
            $archivo = $request->file('imagen');
            $imagen = $this->imagenRepo->FileMove($archivo, $ruta);
            $imagen_carpeta = $this->imagenRepo->FechaCarpeta();
        }else{
            $imagen = $request->input('imagen_actual');
            $imagen_carpeta = $request->input('imagen_actual_carpeta');
        }

        //GUARDAR DATOS
        $postPhoto->titulo = $titulo;
        $postPhoto->imagen = $imagen;
        $postPhoto->imagen_carpeta = $imagen_carpeta;
        $this->imagenRepo->update($postPhoto, $request->all());

        //MENSAJE
        flash()->success('El registro se actualizó satisfactoriamente.');

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('admin.eventos.img.list', $post);
    }

    public function photosDelete($post, $id, Request $request)
    {
        $photo = $this->imagenRepo->findOrFail($id);
        $photo->delete();

        $message = 'El registro se eliminó satisfactoriamente.';

        if($request->ajax())
        {
            return response()->json([
                'message' => $message
            ]);
        }

        return redirect()->route('admin.eventos.img.list', $post);
    }


    /**
     * Fotos de Lugares Turisticos de Evento
     *
     * @param $post
     * @return Response
     * @internal param int $id
     */
    public function tourList($post)
    {
        $posts = $this->eventoRepo->findOrFail($post);
        $photos = $posts->tour;

        return view('admin.eventos-tour.list', compact('posts', 'photos'));
    }

    public function tourOrder($post, Request $request)
    {
        if($request->ajax())
        {
            $sortedval = $request->input('listPhoto');
            try{
                foreach ($sortedval as $key => $sort){
                    $sortPhoto = LugaresTuristicos::find($sort);
                    $sortPhoto->orden = $key;
                    $sortPhoto->save();
                }
            }
            catch (Exception $e)
            {
                return 'false';
            }
        }
    }

    public function tourCreate($post)
    {
        $posts = $this->eventoRepo->findOrFail($post);

        return view('admin.eventos-tour.upload', compact('posts'));
    }

    public function tourStore($post, Request $request)
    {
        //CREAR CARPETA CON FECHA Y MOVER IMAGEN
        $this->eventoRepo->CrearCarpeta();
        $ruta = "upload/".$this->eventoRepo->FechaCarpeta();
        $archivo = $request->file('file');
        $imagen = $this->eventoRepo->FileMove($archivo, $ruta);
        $imagen_carpeta = $this->eventoRepo->FechaCarpeta();

        //BUSCAR ID DE POST
        $row = $this->eventoRepo->findOrFail($post);

        //GUARDAR IMAGEN
        $row->tour()->create([
            'imagen' => $imagen,
            'imagen_carpeta' => $imagen_carpeta
        ]);
    }

    public function tourEdit($post, $id)
    {
        $posts = $this->eventoRepo->findOrFail($post);
        $photo = $this->lugaresTuristicosRepo->findOrFail($id);

        return view('admin.eventos-tour.edit', compact('posts', 'photo'));
    }

    public function tourUpdate($post, $id, Request $request)
    {
        $postPhoto = $this->lugaresTuristicosRepo->findOrFail($id);

        $ruleImg = [
            'imagen' => 'mimes:jpg,jpeg,png'
        ];

        //VALIDACION DE DATOS
        $this->validate($request, $ruleImg);

        //VARIABLES
        $titulo = $request->input('titulo');

        //VERIFICAR SI SUBIO IMAGEN
        if($request->hasFile('imagen'))
        {
            $this->lugaresTuristicosRepo->CrearCarpeta();
            $ruta = "upload/".$this->lugaresTuristicosRepo->FechaCarpeta();
            $archivo = $request->file('imagen');
            $imagen = $this->lugaresTuristicosRepo->FileMove($archivo, $ruta);
            $imagen_carpeta = $this->lugaresTuristicosRepo->FechaCarpeta();
        }else{
            $imagen = $request->input('imagen_actual');
            $imagen_carpeta = $request->input('imagen_actual_carpeta');
        }

        //GUARDAR DATOS
        $postPhoto->imagen = $imagen;
        $postPhoto->imagen_carpeta = $imagen_carpeta;
        $this->lugaresTuristicosRepo->update($postPhoto, $request->all());

        //MENSAJE
        flash()->success('El registro se actualizó satisfactoriamente.');

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('admin.eventos.tour.list', $post);
    }

    public function tourDelete($post, $id, Request $request)
    {
        $photo = $this->lugaresTuristicosRepo->findOrFail($id);
        $photo->delete();

        $message = 'El registro se eliminó satisfactoriamente.';

        if($request->ajax())
        {
            return response()->json([
                'message' => $message
            ]);
        }

        return redirect()->route('admin.eventos.tour.list', $post);
    }
	
}