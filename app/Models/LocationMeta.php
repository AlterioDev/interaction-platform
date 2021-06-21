<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationMeta extends Model
{
    protected $guarded = [];
    protected $table = 'location_meta';
    public $timestamps = false;

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
