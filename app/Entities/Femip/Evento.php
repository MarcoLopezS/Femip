<?php namespace Femip\Entities\Femip;

use Femip\Entities\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Femip\Entities\BaseEntity;

class Evento extends BaseEntity {

    use SoftDeletes;

    protected $dates = ['published_at','deleted_at'];

	protected $fillable = ['titulo','slug_url','descripcion','contenido','lugar','fecha','publicar','published_at','user_id'];

    protected $table = "eventos";

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

    public function tour()
    {
        return $this->hasMany(LugaresTuristicos::class);
    }

    /*
     * GETTERS
     */
    public function getUrlAttribute()
    {
        return route('eventos.select', [$this->id, $this->slug_url]);
    }

    public function getFechaEventoAttribute()
    {
        return $this->fecha;
    }

    public function getFechaDiaAttribute()
    {
        return fechaDia($this->published_at);
    }

    public function getFechaMesAttribute()
    {
        return strtoupper(fechaMes($this->published_at));
    }

    public function getImagenEventoListAttribute()
    {
        $imagen = $this->imagenes()->where('orden',0)->first();
        return "/upload/".$imagen->imagen_carpeta."600x800/".$imagen->imagen;
    }

    public function getImagenEventoSelectAttribute()
    {
        $imagen = $this->imagenes()->where('orden',0)->first();
        return "/upload/".$imagen->imagen_carpeta."600x800/".$imagen->imagen;
    }

    public function getImagenEventoSelectTituloAttribute()
    {
        $imagen = $this->imagenes()->where('orden',0)->first();
        return $imagen->titulo;
    }

}