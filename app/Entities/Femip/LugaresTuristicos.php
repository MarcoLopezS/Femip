<?php namespace Femip\Entities\Femip;

use Femip\Entities\BaseEntity;

class LugaresTuristicos extends BaseEntity{

    protected $fillable = ['evento_id','titulo','descripcion','imagen','imagen_carpeta','orden'];

    protected $table = "lugares_turisticos";

    /*
     * RELACIONES
     */

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    /*
     * GETTERS
     */

    public function getImagenSelectAttribute()
    {
        return "/upload/".$this->imagen_carpeta."".$this->imagen;
    }

    public function getImagenSelectThAttribute()
    {
        return "/upload/".$this->imagen_carpeta."300x300/".$this->imagen;
    }
}