<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_role',
        'email',
        'password',
        'nama',
        'no_hp',
    ];

    protected $hidden = [
            'password',
            'remember_token',
        ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }

}
