<?php namespace Femip\Entities\Admin;

use Illuminate\Database\Eloquent\SoftDeletes;
use Femip\Entities\BaseEntity;

class ContactoMensaje extends BaseEntity{

	use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre','apellidos','email','telefono','telefono_whatsapp','mensaje','leido'];

}