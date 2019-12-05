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
        
        for($i=0; $i<count($produk); $i++){
            if($produk[$i]->type == 0)
                $produk[$i]->type = 'Buket bunga';
            
            elseif($produk[$i]->type == 1)
                $produk[$i]->type = 'Buket snack';

            elseif($produk[$i]->type == 2)
                $produk[$i]->type = 'Buket flanel';
        }

        // error_log($produk);
        return view('admin/produkView', ['produk' =>$produk]);
    }


    public function showItem($item){
        //
        return $item;
    }


    public function tambahKatalog(){
        return view('admin/addProduct');
    }


    public function addProducts($id = NULL, Request $req){
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

        Produk::create([
            'type'          => $req->type,
            'name'          => $req->name,
            'code'          => $req->code,
            'stock'         => $req->stock,
            'sold'          => 0,
            'po_status'     => $req->po_status,
            'po_duration'   =>  $req->po_duration
        ]);

        return redirect('/produk');
    }


    public function editProduct($id){
        $produk = Produk::find($id);
        // error_log($produk);
        return view('admin/editProduk', ['dataEdit' => $produk]);
    }

    public function editProduk_simpan($id, Request $req){
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

        $produk = Produk::find($id);
        $produk->type          = $req->type;
        $produk->name          = $req->name;
        $produk->code          = $req->code;
        $produk->stock         = $req->stock;
        $produk->sold          = $req->sold;
        $produk->po_status     = $req->po_status;
        $produk->po_duration   = $req->po_duration;
        $produk->save();

        return redirect('/produk');
    }


    public function hapusProduk($id){
        $produk = Produk::find($id);
        $produk->delete();

        return redirect('/produk');
    }


    public function produkTerhapus(){
        $produk = Produk::onlyTrashed()->get();

        for($i=0; $i<count($produk); $i++){
            if($produk[$i]->type == 0)
                $produk[$i]->type = 'Buket bunga';
            
            elseif($produk[$i]->type == 1)
                $produk[$i]->type = 'Buket snack';

            elseif($produk[$i]->type == 2)
                $produk[$i]->type = 'Buket flanel';
        }

        return view('admin/produkTerhapus', ['produk' => $produk]);
    }

    
    public function produkRestore($id){
        $produk = Produk::onlyTrashed()->where('ID', $id);
        $produk->restore();

        return redirect('produk/terhapus');
    }
}
