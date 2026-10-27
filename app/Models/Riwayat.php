<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $table = 'riwayat';
    protected $guarded = [];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class, 'biodata_id');
    }
}
