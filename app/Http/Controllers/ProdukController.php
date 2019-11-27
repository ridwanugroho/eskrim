<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class ProdukController extends Controller
{

    public function index(){
        $produk = Produk::where('stock', '>', 5)->get();
        // error_log($produk);
        return $produk;
        // return view('produk', ['produk' => $produk]);
    }

    public function showItem($item){
        //
        return $item;
    }
}
