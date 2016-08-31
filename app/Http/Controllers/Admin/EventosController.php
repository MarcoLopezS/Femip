<?php namespace Femip\Http\Controllers\Admin;

use Femip\Entities\Femip\Evento;
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

    /**
     * NoticiasController constructor.
     * @param EventoRepo $eventoRepo
     * @param ImagenRepo $imagenRepo
     * @internal param eventoRepo $eventoRepo
     */
    public function __construct(EventoRepo $eventoRepo,
                                ImagenRepo $imagenRepo)
	{
        $this->eventoRepo = $eventoRepo;
        $this->imagenRepo = $imagenRepo;
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
            $sortedval = $_POST['listPhoto'];
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
	
}