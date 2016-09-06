<?php namespace Femip\Entities\Femip;

use Femip\Entities\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Femip\Entities\BaseEntity;

class NotaPrensa extends BaseEntity {

    use SoftDeletes;

    protected $dates = ['published_at','deleted_at'];

	protected $fillable = ['titulo','slug_url','descripcion','contenido','video','publicar','published_at','user_id'];

    protected $table = "nota_prensa";

    /*
     * RELACIONES
     */

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function imagenes()
    {
        return $this->morphMany(Imagen::class, 'imagenable');
    }

    /*
     * GETTERS
     */
    public function getUrlAttribute()
    {
        return route('nota-prensa.select', [$this->id, $this->slug_url]);
    }

    public function getFechaAttribute()
    {
        return fechaTexto($this->published_at);
    }

    public function getFechaDiaAttribute()
    {
        return fechaDia($this->published_at);
    }

    public function getFechaMesAttribute()
    {
        return strtoupper(fechaMes($this->published_at));
    }

    public function getFechaAnioAttribute()
    {
        return strtoupper(fechaAnio($this->published_at));
    }

    public function getImagenNoticiaListAttribute()
    {
        $imagen = $this->imagenes()->where('orden',0)->first();
        if($imagen == ""){
            return "";
        }else{
            return "/upload/".$imagen->imagen_carpeta."460x250/".$imagen->imagen;
        }
    }

    public function getImagenNoticiaSelectAttribute()
    {
        $imagen = $this->imagenes()->where('orden',0)->first();
        if($imagen == ""){
            return "";
        }else{
            return "/upload/".$imagen->imagen_carpeta."900x600/".$imagen->imagen;
        }
    }

}