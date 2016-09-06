<?php namespace Femip\Http\Controllers\Admin;

use Femip\Entities\Femip\Imagen;
use Femip\Entities\Femip\NotaPrensa;
use Femip\Entities\Femip\Noticia;
use Femip\Repositories\Femip\ImagenRepo;
use Femip\Repositories\Femip\NotaPrensaRepo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Femip\Http\Controllers\Controller;


class NotaPrensaController extends Controller {

	protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'min:10|max:255',
        'contenido' => '',
        'published_at' => 'required',
        'publicar' => 'required|in:1,0'
	];

	protected $notaPrensaRepo;
    protected $imagenRepo;

    /**
     * NoticiasController constructor.
     * @param NotaPrensaRepo $notaPrensaRepo
     * @param ImagenRepo $imagenRepo
     * @internal param notaPrensaRepo $notaPrensaRepo
     */
    public function __construct(NotaPrensaRepo $notaPrensaRepo,
                                ImagenRepo $imagenRepo)
	{
        $this->notaPrensaRepo = $notaPrensaRepo;
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
		$rows = $this->notaPrensaRepo->findAndPaginate($request);

        return view('admin.nota-prensa.list', compact('rows'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.nota-prensa.create');
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
		$slug_url = $this->notaPrensaRepo->SlugUrl($titulo);

		//GUARDAR DATOS
		$post = new NotaPrensa($request->all());
		$post->slug_url = $slug_url;
		$post->user_id = auth()->user()->id;
        $this->notaPrensaRepo->create($post, $request->all());

        //BUSCAR REGISTRO POR TITULO
        $postCreate = $this->notaPrensaRepo->where('titulo', $titulo)->first();

		//MENSAJE
		flash()->success('El registro se agregó satisfactoriamente.');

		//REDIRECCIONAR A PAGINA PARA VER DATOS
		return redirect()->route('admin.nota-prensa.img.create', $postCreate->id);
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
		$post = $this->notaPrensaRepo->findOrFail($id);

		return view('admin.nota-prensa.edit', compact('post'));
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
		$post = $this->notaPrensaRepo->findOrFail($id);

		//VALIDACION DE DATOS
		$this->validate($request, $this->rules);

		//VARIABLES
		$titulo = $request->input('titulo');
		$slug_url = $this->notaPrensaRepo->SlugUrl($titulo);

		//GUARDAR DATOS
		$post->slug_url = $slug_url;
		$this->notaPrensaRepo->update($post, $request->all());

		//MENSAJE
		flash()->success('El registro se actualizó satisfactoriamente.');

		//REDIRECCIONAR A PAGINA PARA VER DATOS
		return redirect()->route('admin.nota-prensa.index');
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
		$post = $this->notaPrensaRepo->findOrFail($id);
		$post->delete();

		$message = 'El registro se eliminó satisfactoriamente.';

		if($request->ajax())
		{
			return response()->json([
				'message' => $message
			]);
		}

		return redirect()->route('admin.nota-prensa.index');
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
        $posts = $this->notaPrensaRepo->findOrFail($post);
        $photos = $posts->imagenes;

        return view('admin.nota-prensa-imagenes.list', compact('posts', 'photos'));
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
        $posts = $this->notaPrensaRepo->findOrFail($post);

        return view('admin.nota-prensa-imagenes.upload', compact('posts'));
    }

    public function photosStore($post, Request $request)
    {
        //CREAR CARPETA CON FECHA Y MOVER IMAGEN
        $this->notaPrensaRepo->CrearCarpeta();
        $ruta = "upload/".$this->notaPrensaRepo->FechaCarpeta();
        $archivo = $request->file('file');
        $imagen = $this->notaPrensaRepo->FileMove($archivo, $ruta);
        $imagen_carpeta = $this->notaPrensaRepo->FechaCarpeta();

        //BUSCAR ID DE POST
        $row = $this->notaPrensaRepo->findOrFail($post);

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

        return redirect()->route('admin.nota-prensa.img.list', $post);
    }
	
}