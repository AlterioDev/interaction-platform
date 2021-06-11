<?php

namespace App\Models;

use App\Models\Device;
use Illuminate\Database\Eloquent\Model;

class DeviceMeta extends Model
{
    protected $guarded = [];
    protected $table = 'device_meta';
    public $timestamps = false;

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
