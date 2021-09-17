<?php

namespace App\Http\Controllers\Ordering;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\M_Barang;

class Utama extends Controller
{
    public function index(){
        return view ('utama');
    }

    public function store (Request $request){
        $this->validate($request, [
            'file' => 'required|max:2048'
        ]);
        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'data_file';
        if($file->move($tujuan_upload, $nama_file)){
            $data = M_Barang::create([
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'gambar' => $nama_file
            ]);
            return response()->json([
               'message' => 'Success',
               'data' => $data
            ]);
        }

        return response()->json([
            'message' => 'Failed'
        ]);

    }

}
