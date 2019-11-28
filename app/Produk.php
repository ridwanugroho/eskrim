<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = "produk";
    public $timestamps = true;
    protected $fillable = ['type', 'name', 'code', 'stock', ' sold', 'po_status', 'po_duration'];
}
