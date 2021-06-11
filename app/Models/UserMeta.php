<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    protected $guarded = [];

    protected $table = 'user_meta';

    public $timestamps = false;

    protected $casts = [
        'allowed_locations' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
