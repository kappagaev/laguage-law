<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $with = [
        'user'
    ];

    public function users()
    {
        return $this->morphMany('User', 'role');
    }

    protected $fillable = [
        'title',
        'can_approve_users',
        'can_create_requests'
    ];
}
