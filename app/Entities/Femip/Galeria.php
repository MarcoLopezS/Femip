<?php namespace Femip\Entities\Femip;

use Femip\Entities\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Femip\Entities\BaseEntity;

class Galeria extends BaseEntity {

    use SoftDeletes;

    protected $dates = ['published_at','deleted_at'];

	protected $fillable = ['titulo','slug_url','descripcion','publicar','published_at','user_id'];

    protected $table = "galerias";

    /*
     * RELACIONES
     */

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function imagenes()
    {
        return $this->morphMany(Imagen::class, 'imagenable')->orderBy('orden','asc');
    }

    /*
     * GETTERS
     */
    public function getUrlAttribute()
    {
        return route('galerias.select', [$this->id, $this->slug_url]);
    }

    public function getFechaAttribute()
    {
        return fechaTexto($this->published_at);
    }

    public function getImagenGaleriaListAttribute()
    {
        $imagen = $this->imagenes()->where('orden',0)->first();
        return "/upload/".$imagen->imagen_carpeta."600x600/".$imagen->imagen;
    }

}