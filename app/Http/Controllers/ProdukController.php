<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Produk;
use Illuminate\Support\Carbon;

class ProdukController extends Controller
{

    public function index(){
        $produk = Produk::all();
        // error_log($produk);
        return $produk;
        // return view('produk', ['produk' => $produk]);
    }


    public function showItem($item){
        //
        return $item;
    }


    public function tambahKatalog(){
        return view('addProduct');
    }


    public function addProducts(Request $req){
        $errMsgs = [
            'required' => ':attribute Wajib diisi!',
            'numeric'  => ':attribute Hanya angka!'
        ];

        $this->validate($req, [
            'type'          => 'required|numeric',
            'name'          => 'required',
            'code'          => 'required',
            'stock'         => 'required|numeric',
            'po_status'     => 'required',
            'po_duration'   => 'numeric'
        ], $errMsgs);

        $po_duration = 0;
        if($req->po_duration != null)
            $po_duration = $req->po_duration;

        Produk::create([
            'type'          => $req->type,
            'name'          => $req->name,
            'code'          => $req->code,
            'stock'         => $req->stock,
            'sold'          => 0,
            'po_status'     => $req->po_status,
            'po_duration'   =>  $po_duration
        ]);

        return redirect('/produk');
    }


    public function updateProduct(Request $req){
        DB::table('produk')->where('id', 6)->update([
            'updated_at'    => Carbon::now()->toDateTimeString(),
            'type'          => 0,
            'name'          => 'mawar 10',
            'code'          => 'mw010',
            'stock'         => 3,
            'sold'          => 5,
            'po_status'     => 'none',
            'po_duration'   => 0
        ]);

        return redirect('/produk');
    }
}
