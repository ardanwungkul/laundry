<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function Pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
}
