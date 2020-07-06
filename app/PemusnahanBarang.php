<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemusnahanBarang extends Model
{
    protected $table = 'pemusnahan_barang';
    protected $guarded = [];
    public $timestamps = false;

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'brg_id', 'id');
    }
}
