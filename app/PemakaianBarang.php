<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemakaianBarang extends Model
{
    protected $table = 'pemakaian_barang';
    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'brg_id', 'id');
    }
}
