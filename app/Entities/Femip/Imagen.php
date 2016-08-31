<?php namespace Femip\Entities\Femip;

use Femip\Entities\BaseEntity;

class Imagen extends BaseEntity{

    protected $fillable = ['titulo','imagen','imagen_carpeta','orden'];

    protected $table = "imagenes";

    /*
     * RELACIONES
     */
    public function imagenable()
    {
        return $this->morphTo();
    }
    
    /*
     * GETTES
     */

    public function getImagenGaleriaAttribute()
    {
        return "/upload/".$this->imagen_carpeta."400/".$this->imagen;
    }

    public function getImagenFinalAttribute()
    {
        return "/upload/".$this->imagen_carpeta."".$this->imagen;
    }

}