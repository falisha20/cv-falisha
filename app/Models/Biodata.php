<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'Biodata_1062';
    protected $guarded = [];

    public function riwayat()
    {
        return $this->hasMany(Riwayat::class, 'biodata_id');
    }
}
