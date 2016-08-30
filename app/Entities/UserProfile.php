<?php namespace Femip\Entities;

class UserProfile extends BaseEntity {

	protected $fillable = ['nombres','apellidos','user_id'];

	public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}