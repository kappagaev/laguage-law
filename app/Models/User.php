<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id';

    use HasFactory;

    public function role()
    {
        return $this->morphTo('Role');
    }

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id',
        'status'
    ];
}
