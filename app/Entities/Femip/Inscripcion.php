<?php namespace Femip\Entities\Femip;

use Femip\Entities\BaseEntity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscripcion extends BaseEntity {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

	protected $fillable = ['asoc_nombre','asoc_pais','asoc_zip','asoc_direccion','asoc_telefono','asoc_email','asoc_numero','rep_cargo','rep_nombre','rep_direccion','rep_telefono','rep_email'];

    protected $table = "inscripcion";

}