<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\kategori;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Exports\ProdukExport;
use App\Imports\ProdukImport;
use App\Models\pembeli;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\Session\Session;


class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if (!request('search')) {
            $data['dataProduk'] = Produk::orderBy('created_at', 'ASC')->get();
            return view('produk.index', $data);
            // } else {
            //     $search = $request->search;
    
            //     $data['dataProduk'] = Produk::where('nama_produk', 'like', "%" . $search . "%")->paginate();
            //     return view('produk.index', $data);
            // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['produk'] = Kategori::get();
        return view('produk.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->foto_produk) {
            $foto_produk = $request->foto_produk;
            $str = Str::random(8);
            $getExt = $foto_produk->getClientOriginalExtension();
            $namafile = $str . '.' . $getExt;
            $foto_produk->move('gambar_produk', $namafile);
        }
        //masukan data
        $store = Produk::create(array_merge($request->all(), ['foto_produk' => $namafile]));
        if (!$store) {
            return redirect()->route('createProduk')->with('error', 'Data Added Failed.');
        } else {
            return redirect()->route('indexProduk')->with('success', 'Data Added Successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['edit'] = Produk::find($id);
        $datas['produk'] = Kategori::get();

        if (!$data['edit']) {
            return redirect()->route('indexProduk')->with('error', 'Data Not Found!.');
        }

        return view('produk.ubah', $data, $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Produk::find($id);

        if (!$update) {
            return redirect()->back()->with('error', 'Data Not Found!.');
        }

        if ($request->hasFile('foto_produk')) {
            $path = 'gambar_produk/' . $update->foto_produk;
            if (File::exists($path)) {
                File::delete($path);
            }
            $foto_produk = $request->foto_produk;
            $str = Str::random(8);
            $getExt = $foto_produk->getClientOriginalExtension();
            $namafile = $str . '.' . $getExt;
            $foto_produk->move('gambar_produk', $namafile);
        } else {
            $namafile = $update->foto_produk;
        }
        // dd($request->all());
        $dataInput = array_merge($request->all(), ['foto_produk' => $namafile]);

        $inputUpdate = Produk::updateOrCreate(['id' => $id], $dataInput);
        if (!$inputUpdate) {
            return redirect()->back()->with('error', 'Update Data Error');
        } else {
            return redirect()->route('indexProduk')->with('success', 'Data Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Produk::find($id);
        if (!$destroy) {
            return redirect()->route('indexProduk')->with('error', 'Data Not Found.');
        }

        if ($destroy->foto_produk) {
            $path = 'gambar_produk/' . $destroy->foto_produk;
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $destroy->delete();
        if (!$destroy) {
            return redirect()->route('indexProduk')->with('error', 'Data Cannot Be Deleted.');
        }

        return redirect()->route('indexProduk')->with('success', 'Data Has Been Deleted.');
    }

    public function download()
    {
        return Excel::download(new ProdukExport, 'Data Produk.csv');
    }

    public function import(Request $request)
    {
        $request->validate([
            'produk_csv' => 'required|mimes:csv,xls,xlsx,txt'
        ]);

        Excel::import(new ProdukImport, $request->file('produk_csv'));
        return redirect()->route('indexProduk')->with('success', 'Data berhasil di import');
    }
}
