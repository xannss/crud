<?php

namespace App\Http\Controllers;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class produkcontroler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $katakunci = $request->katakunci;
    $jumlahbaris = 4;

    if (strlen($katakunci)) {
        $data = produk::where('Kode', 'like', ("%$katakunci%"))
            ->orWhere('Nama', 'like', ("%$katakunci%"))
            ->orWhere('Harga', 'like', ("%$katakunci%"))
            ->paginate($jumlahbaris);
    } else {
        $data = produk::orderBy('Kode', 'desc')->paginate($jumlahbaris);
    }
        return view('barang.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('Kode',$request->Kode);
        Session::flash('Nama',$request->Nama);
        Session::flash('Harga',$request->Harga);
        
        $request->validate ([
            'Kode' => 'required|numeric|unique:produks,Kode',
            'Nama' => 'required',
            'Harga' => 'required',
        ],[
            'Kode.required'=> 'Kode wajib di isi',
            'Kode.numeric'=> 'Kode wajib dalam angka',
            'Kode.unique'=> 'Kode sudah ada ',
            'Nama.required'=> 'Nama wajib di isi',
            'Harga.required'=> 'Harga wajib di isi',
        ]);

        $data = [
            'Kode'=>$request->Kode,
            'Nama'=>$request->Nama,
            'Harga'=>$request->Harga,
        ];
        produk::create($data);
        return redirect()->to('produk')->with('success','Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'hi';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = produk::where('Kode',$id)->First();
        return view('barang.edit')->with ('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate ([
            
            'Nama' => 'required',
            'Harga' => 'required',
        ],[
            'Nama.required'=> 'Nama wajib di isi',
            'Harga.required'=> 'Harga wajib di isi',
        ]);

        $data = [
            'Nama'=>$request->Nama,
            'Harga'=>$request->Harga,
        ];
        produk::where('Kode', $id)->update($data);
        return redirect()->to('produk')->with('success','Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        produk::where('Kode', $id)->DELETE();
        return redirect()->to('produk')->with('success','mendelete data');
    }
}


