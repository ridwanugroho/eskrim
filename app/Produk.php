<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{

    use SoftDeletes;

    protected $table = "produk";
    public $timestamps = true;
    protected $fillable = ['type', 'name', 'code', 'stock', ' sold', 'po_status', 'po_duration'];
    protected $dates = ['deleted_at'];
}
