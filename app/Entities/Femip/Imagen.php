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

}