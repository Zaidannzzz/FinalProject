<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Exists;
use App\Models\kategori;

class KategoriController extends Controller
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
    public function index()
    {
        $data['dataKategori'] = Kategori::orderBy('created_at', 'ASC')->get();
        return view('kategori.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = Kategori::create($request->all());
        if (!$store) {
            return redirect()->route('indexKategori')->with('error', 'Data Added Failed.');
        }
        return redirect()->route('indexKategori')->with('success', 'Data Added Success.');
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
        $data['ubah'] = Kategori::find($id);
        if (!$data['ubah']) {
            return redirect()->route('indexKategori')->with('error', 'Data Kategori Not Found.');
        }

        return view('kategori.ubah', $data);
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
        $update = Kategori::updateOrCreate(['id' => $id], $request->all());
        if (!$update) {
            return redirect()->back()->with('error', 'Data Not Found!.');
        }
        return redirect()->route('indexKategori')->with('success', 'Data Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Kategori::find($id);
        if (!$destroy) {
            return redirect()->route('indexKategori')->with('error', 'Data Not Found.');
        }

        $destroy->delete();
        if (!$destroy) {
            return redirect()->route('indexKategori')->with('error', 'Data Cannot Be Deleted.');
        }

        return redirect()->route('indexKategori')->with('success', 'Data Has Been Deleted.');
    }
}
