<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerawatanBarang extends Model
{
    protected $table = 'perawatan_barang';
    protected $guarded = [];
    public $timestamps = false;

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'brg_id', 'id');
    }
}
