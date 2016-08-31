<?php namespace Femip\Http\Controllers\Admin;

use Femip\Entities\Femip\Galeria;
use Femip\Entities\Femip\Imagen;
use Femip\Entities\Femip\Noticia;
use Femip\Repositories\Femip\GaleriaRepo;
use Femip\Repositories\Femip\ImagenRepo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Femip\Http\Controllers\Controller;


class GaleriasController extends Controller {

	protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'min:10|max:255',
        'published_at' => 'required',
        'publicar' => 'required|in:1,0'
	];

	protected $galeriaRepo;
    protected $imagenRepo;

    /**
     * NoticiasController constructor.
     * @param GaleriaRepo $galeriaRepo
     * @param ImagenRepo $imagenRepo
     * @internal param galeriaRepo $galeriaRepo
     */
    public function __construct(GaleriaRepo $galeriaRepo,
                                ImagenRepo $imagenRepo)
	{
        $this->galeriaRepo = $galeriaRepo;
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
		$rows = $this->galeriaRepo->findAndPaginate($request);

        return view('admin.galerias.list', compact('rows'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.galerias.create');
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
		$slug_url = $this->galeriaRepo->SlugUrl($titulo);

		//GUARDAR DATOS
		$post = new Galeria($request->all());
		$post->slug_url = $slug_url;
		$post->user_id = auth()->user()->id;
        $this->galeriaRepo->create($post, $request->all());

        //BUSCAR REGISTRO POR TITULO
        $postCreate = $this->galeriaRepo->where('titulo', $titulo)->first();

		//MENSAJE
		flash()->success('El registro se agregó satisfactoriamente.');

		//REDIRECCIONAR A PAGINA PARA VER DATOS
		return redirect()->route('admin.galerias.img.create', $postCreate->id);
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
		$post = $this->galeriaRepo->findOrFail($id);

		return view('admin.galerias.edit', compact('post'));
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
		$post = $this->galeriaRepo->findOrFail($id);

		//VALIDACION DE DATOS
		$this->validate($request, $this->rules);

		//VARIABLES
		$titulo = $request->input('titulo');
		$slug_url = $this->galeriaRepo->SlugUrl($titulo);

		//GUARDAR DATOS
		$post->slug_url = $slug_url;
		$this->galeriaRepo->update($post, $request->all());

		//MENSAJE
		flash()->success('El registro se actualizó satisfactoriamente.');

		//REDIRECCIONAR A PAGINA PARA VER DATOS
		return redirect()->route('admin.galerias.index');
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
		$post = $this->galeriaRepo->findOrFail($id);
		$post->delete();

		$message = 'El registro se eliminó satisfactoriamente.';

		if($request->ajax())
		{
			return response()->json([
				'message' => $message
			]);
		}

		return redirect()->route('admin.galerias.index');
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
        $posts = $this->galeriaRepo->findOrFail($post);
        $photos = $posts->imagenes;

        return view('admin.galerias-imagenes.list', compact('posts', 'photos'));
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
        $posts = $this->galeriaRepo->findOrFail($post);

        return view('admin.galerias-imagenes.upload', compact('posts'));
    }

    public function photosStore($post, Request $request)
    {
        //CREAR CARPETA CON FECHA Y MOVER IMAGEN
        $this->galeriaRepo->CrearCarpeta();
        $ruta = "upload/".$this->galeriaRepo->FechaCarpeta();
        $archivo = $request->file('file');
        $imagen = $this->galeriaRepo->FileMove($archivo, $ruta);
        $imagen_carpeta = $this->galeriaRepo->FechaCarpeta();

        //BUSCAR ID DE POST
        $row = $this->galeriaRepo->findOrFail($post);

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

        return redirect()->route('admin.galerias.img.list', $post);
    }
	
}