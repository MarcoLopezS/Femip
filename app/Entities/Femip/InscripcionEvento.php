<?php namespace Femip\Entities\Femip;

use Femip\Entities\BaseEntity;
use Illuminate\Database\Eloquent\SoftDeletes;

class InscripcionEvento extends BaseEntity {

	protected $fillable = ['nombres','apellidos','email','direccion','telefonos','primera_vez','pertenece_asociacion','nombre_asociacion'];

    protected $table = "inscripcion_evento";

}