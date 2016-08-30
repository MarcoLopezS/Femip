<?php namespace Femip\Http\Controllers\Admin;

use Femip\Entities\Femip\Imagen;
use Femip\Entities\Femip\Noticia;
use Femip\Repositories\Femip\ImagenRepo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Femip\Http\Controllers\Controller;

use Femip\Repositories\Femip\NoticiaRepo;

class NoticiasController extends Controller {

	protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required|min:10|max:255',
        'contenido' => 'required',
        'published_at' => 'required',
        'publicar' => 'required|in:1,0'
	];

	protected $noticiaRepo;
    protected $imagenRepo;

    /**
     * NoticiasController constructor.
     * @param NoticiaRepo $noticiaRepo
     * @param ImagenRepo $imagenRepo
     */
    public function __construct(NoticiaRepo $noticiaRepo,
                                ImagenRepo $imagenRepo)
	{
        $this->noticiaRepo = $noticiaRepo;
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
		$rows = $this->noticiaRepo->findAndPaginate($request);

        return view('admin.noticias.list', compact('rows'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.noticias.create');
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
		$slug_url = $this->noticiaRepo->SlugUrl($titulo);

		//GUARDAR DATOS
		$post = new Noticia($request->all());
		$post->slug_url = $slug_url;
		$post->user_id = auth()->user()->id;
        $this->noticiaRepo->create($post, $request->all());

        //BUSCAR REGISTRO POR TITULO
        $postCreate = $this->noticiaRepo->where('titulo', $titulo)->first();

		//MENSAJE
		flash()->success('El registro se agregó satisfactoriamente.');

		//REDIRECCIONAR A PAGINA PARA VER DATOS
		return redirect()->route('admin.noticias.img.create', $postCreate->id);
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
		$post = $this->noticiaRepo->findOrFail($id);

		return view('admin.noticias.edit', compact('post'));
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
		$post = $this->noticiaRepo->findOrFail($id);

		//VALIDACION DE DATOS
		$this->validate($request, $this->rules);

		//VARIABLES
		$titulo = $request->input('titulo');
		$slug_url = $this->noticiaRepo->SlugUrl($titulo);

		//GUARDAR DATOS
		$post->slug_url = $slug_url;
		$this->noticiaRepo->update($post, $request->all());

		//MENSAJE
		flash()->success('El registro se actualizó satisfactoriamente.');

		//REDIRECCIONAR A PAGINA PARA VER DATOS
		return redirect()->route('admin.noticias.index');
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
		$post = $this->noticiaRepo->findOrFail($id);
		$post->delete();

		$message = 'El registro se eliminó satisfactoriamente.';

		if($request->ajax())
		{
			return response()->json([
				'message' => $message
			]);
		}

		return redirect()->route('admin.noticias.index');
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
        $posts = $this->noticiaRepo->findOrFail($post);
        $photos = $posts->imagenes;

        return view('admin.noticias-imagenes.list', compact('posts', 'photos'));
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
        $posts = $this->noticiaRepo->findOrFail($post);

        return view('admin.noticias-imagenes.upload', compact('posts'));
    }

    public function photosStore($post, Request $request)
    {
        //CREAR CARPETA CON FECHA Y MOVER IMAGEN
        $this->noticiaRepo->CrearCarpeta();
        $ruta = "upload/".$this->noticiaRepo->FechaCarpeta();
        $archivo = $request->file('file');
        $imagen = $this->noticiaRepo->FileMove($archivo, $ruta);
        $imagen_carpeta = $this->noticiaRepo->FechaCarpeta();

        //BUSCAR ID DE POST
        $row = $this->noticiaRepo->findOrFail($post);

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

        return redirect()->route('admin.noticias.img.list', $post);
    }
	
}