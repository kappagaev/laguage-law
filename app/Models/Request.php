<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{

// requests
// id
// title
// user_id
    use HasFactory;

    public function requests()
    {
        return $this->belongsTo('App\Models\User');
    }
    protected $fillable = [
        'title',
    ];
}
