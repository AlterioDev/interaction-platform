<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceMeta extends Model
{
    protected $guarded = [];

    protected $table = 'device_meta';

    public $timestamps = false;

    public function device()
    {
        return $this->belongsTo('App\Models\Device');
    }
}
